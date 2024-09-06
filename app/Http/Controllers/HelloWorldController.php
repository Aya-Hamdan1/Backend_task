<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloWorldController extends Controller
{
    public function hello(Request $request)
    {
        $name = $request->query('name', 'World');
        return response()->json([
            'greeting' => "Hello, $name"
        ]);
    }

    public function info(Request $request)
    {
        $clientIp = $request->ip();
        $hostName = gethostname();
        $headers = $request->headers->all();
        $time = now()->toIso8601String();

        return response()->json([
            'time' => $time,
            'client_address' => $clientIp,
            'host_name' => $hostName,
            'headers' => $headers,
        ]);
    }
}
