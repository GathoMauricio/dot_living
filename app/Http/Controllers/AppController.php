<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppController extends Controller
{
    public function apiUltimaVersionAndroid()
    {
        return response()->json([
            'estatus' => 1,
            'ultima_version' => '0_0_1',
            //'última_version' => env('ANDROID_VERSION'),
        ]);
    }

    public function descargarAndroidApp(Request $request)
    {
        return response()->download(storage_path('app/public/android_app/dot_living_0_0_1.apk'));
    }
}
