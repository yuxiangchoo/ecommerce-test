<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ __('parceldaily::app.tracking.title') }} - {{ $consignNo }}</title>
    <style>
        body { font-family: ui-sans-serif, system-ui, -apple-system, Segoe UI, Roboto, Helvetica, Arial, "Apple Color Emoji", "Segoe UI Emoji"; margin: 1.5rem; }
        .toolbar { display:flex; justify-content:space-between; align-items:center; margin-bottom:1rem; }
        table { width:100%; border-collapse:collapse; }
        th, td { padding:.75rem; border-top:1px solid #e5e7eb; text-align:left; }
        thead th { background:#f3f4f6; border-top:0; }
        .btn { padding:.375rem .75rem; border:1px solid #d1d5db; border-radius:.375rem; background:#fff; cursor:pointer; }
    </style>
</head>
<body>
    <div class="toolbar">
        <h2>{{ __('parceldaily::app.tracking.title') }} / {{ $consignNo }}</h2>
        <button class="btn" onclick="window.close()">{{ __('parceldaily::app.tracking.close') }}</button>
    </div>

    <p><b>{{ __('parceldaily::app.tracking.provider') }}:</b> {{ $tracking['serviceProvider'] ?? '-' }}</p>
    <p><b>{{ __('parceldaily::app.tracking.status') }}:</b> {{ $tracking['status'] ?? '-' }}</p>

    <table>
        <thead>
            <tr>
                <th>{{ __('parceldaily::app.tracking.date') }}</th>
                <th>{{ __('parceldaily::app.tracking.place') }}</th>
                <th>{{ __('parceldaily::app.tracking.status') }}</th>
            </tr>
        </thead>
        <tbody>
            @forelse(($tracking['orderTracking'] ?? []) as $row)
                <tr>
                    <td>{{ $row['date'] ?? '' }}</td>
                    <td>{{ $row['place'] ?? '' }}</td>
                    <td>{{ $row['status'] ?? '' }}</td>
                </tr>
            @empty
                <tr><td colspan="3">—</td></tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
