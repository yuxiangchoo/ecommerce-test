<?php

namespace Webkul\Sms\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Webkul\Sms\Facades\Sms;

class TestController extends Controller
{
    public function index()
    {
        return view('sms::admin.test');
    }

    public function send(Request $request)
    {
        $request->validate(['to' => 'required|string']);
        $res = Sms::send($request->string('to'), 'Test message from Bagisto SMS');
        return back()->with('success', 'Sent: ' . json_encode($res));
    }
}