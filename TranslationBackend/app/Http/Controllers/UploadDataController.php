<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Storage;

class UploadDataController extends Controller
{
    public function index() {
        return view('uploadfile');
    }
    public function storeUploadFile(Request $request) {
        $file = $request->file('spreadsheet');
        $filename = $file->getClientOriginalName();
        $extension = $file->extension();
        Storage::disk('local')->putFileAs('',$file,$filename);
        (new ImportController)->store($filename);
        return response('',201);
    }
}
