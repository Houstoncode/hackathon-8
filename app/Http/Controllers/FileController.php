<?php

namespace App\Http\Controllers;

use App\File;
use App\Http\Resources\FileResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FileController extends Controller
{
    public function index() {
        $files = File::query()->where('user_id', '=', Auth::user()->id)->get();

        return response()->json(['data' => ['items' => FileResource::collection($files)]]);
    }

    public function show(Request $request) {
        $file = File::query()->where('code', '=', $request->get('code'))->first();

        return response()->json(['data' => $file]);
    }
}
