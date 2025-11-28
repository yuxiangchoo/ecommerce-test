<?php

namespace Webkul\MpDataTransfer\Http\Controllers\Admin;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Storage;
use Webkul\DataTransfer\Helpers\Import;
use Webkul\DataTransfer\Repositories\ImportRepository;
use Webkul\Admin\Http\Controllers\Settings\DataTransfer\ImportController as BaseImportController;
use ZipArchive;

class ImportController extends BaseImportController
{
    const PREFIX_DIR = 'import/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        protected ImportRepository $importRepository,
        protected Import $importHelper
    ) {
        parent::__construct($importRepository, $importHelper);
        $this->supportedFormats = ['csv', 'xls', 'xlsx',];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $import = $this->importRepository->findOrFail($id);

        try {
            Storage::disk('private')->delete($import->file_path);

            Storage::disk('private')->delete($import->error_file_path ?? '');

            Storage::disk('local')->deleteDirectory(self::PREFIX_DIR . $import->images_directory_path);

            $this->importRepository->delete($id);

            return new JsonResponse([
                'message' => trans('admin::app.settings.data-transfer.imports.delete-success'),
            ]);
        } catch (\Exception $e) {
        }

        return response()->json([
            'message' => trans('admin::app.settings.data-transfer.imports.delete-failed'),
        ], 500);
    }

    /**
     * Update a resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(int $id)
    {
        $importers = array_keys(config('importers'));

        $import = $this->importRepository->findOrFail($id);

        $this->validate(request(), [
            'type'                => 'required|in:'.implode(',', $importers),
            'action'              => 'required:in:append,delete',
            'validation_strategy' => 'required:in:stop-on-errors,skip-errors',
            'allowed_errors'      => 'required|integer|min:0',
            'field_separator'     => 'required',
            'file'                => 'mimes:csv,xls,xlsx,txt',
            'upload_images'       => 'mimes:zip',
        ]);

        Event::dispatch('data_transfer.imports.update.before');

        $data = array_merge(
            request()->only([
                'type',
                'action',
                'process_in_queue',
                'validation_strategy',
                'validation_strategy',
                'allowed_errors',
                'field_separator',
                'images_directory_path',
            ]), [
                'state'                => 'pending',
                'processed_rows_count' => 0,
                'invalid_rows_count'   => 0,
                'errors_count'         => 0,
                'errors'               => null,
                'error_file_path'      => null,
                'started_at'           => null,
                'completed_at'         => null,
                'summary'              => null,
            ]
        );

        Storage::disk('private')->delete($import->error_file_path ?? '');

        if (
            request()->file('upload_images') 
            && request()->file('upload_images')->isValid()
        ) {
            $data['images_directory_path'] = $this->storeZipFile(request()->file('upload_images'), $data['images_directory_path'] ?? null);
        }

        if (
            request()->file('file') 
            && request()->file('file')->isValid()
        ) {
            Storage::disk('private')->delete($import->file_path);

            $data['file_path'] = request()->file('file')->storeAs(
                'imports',
                time().'-'.request()->file('file')->getClientOriginalName(),
                'private'
            );
        }

        if (! isset($data['process_in_queue'])) {
            $data['process_in_queue'] = false;
        }

        $import = $this->importRepository->update($data, $import->id);

        Event::dispatch('data_transfer.imports.update.after', $import);

        session()->flash('success', trans('admin::app.settings.data-transfer.imports.update-success'));

        return redirect()->route('admin.settings.data_transfer.imports.import', $import->id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $importers = array_keys(config('importers'));

        $this->validate(request(), [
            'type'                => 'required|in:'.implode(',', $importers),
            'action'              => 'required:in:append,delete',
            'validation_strategy' => 'required:in:stop-on-errors,skip-errors',
            'allowed_errors'      => 'required|integer|min:0',
            'field_separator'     => 'required',
            'file'                => 'required|mimes:csv,xls,xlsx,txt',
            'upload_images'       => 'mimes:zip',
        ]);

        Event::dispatch('data_transfer.imports.create.before');

        $data = request()->only([
            'type',
            'action',
            'process_in_queue',
            'validation_strategy',
            'validation_strategy',
            'allowed_errors',
            'field_separator',
            'images_directory_path',
        ]);

        if (! isset($data['process_in_queue'])) {
            $data['process_in_queue'] = false;
        } else {
            $data['process_in_queue'] = true;
        }

        if (
            request()->file('upload_images') 
            && request()->file('upload_images')->isValid()
        ) {
           $data['images_directory_path'] = $this->storeZipFile(request()->file('upload_images'),  $data['images_directory_path'] ?? null);
        }
        
        $import = $this->importRepository->create(
            array_merge(
                [
                    'file_path' => request()->file('file')->storeAs(
                        'imports',
                        time().'-'.request()->file('file')->getClientOriginalName(),
                        'private'
                    ),
                ],
                $data
            )
        );

        Event::dispatch('data_transfer.imports.create.after', $import);

        session()->flash('success', trans('admin::app.settings.data-transfer.imports.create-success'));

        return redirect()->route('admin.settings.data_transfer.imports.import', $import->id);
    }

    /**
     * Store the zip in the storage and extract.
     */
    public function storeZipFile(UploadedFile $file, ?string $imageDirectoryPath = null)
    {
        $imageDirectoryPath  = ! empty($imageDirectoryPath) ? $imageDirectoryPath : 'import-images' . '/'. time(); 

        $originalImageDirPath = self::PREFIX_DIR . $imageDirectoryPath;

        $filePath = $file->storeAs(
            $originalImageDirPath,
            $file->getClientOriginalName(),
            'local'
        );
 
        $zip = new ZipArchive();
        
        $zipFileName = Storage::disk('local')->path($filePath);

        $zipFile = $zip->open($zipFileName);

        if ( $zipFile !== true ) {
            die("cannot open {$zipFileName} for writing.");
        }

        $extractPath = Storage::disk('local')->path($originalImageDirPath);
        
        $zip->extractTo($extractPath);
        $zip->deleteName($file->getClientOriginalName());
        $zip->close();
        
        Storage::disk('local')->delete($filePath);

        return $imageDirectoryPath;
    }

    /**
     * Download import sample images zip
     */
    public function downloadSampleImagesZip(string $type = 'seller_products')
    {
        $importer = config('importers.'.$type);

        return Storage::download($importer['sample_images_zip_path']);
    }
}
