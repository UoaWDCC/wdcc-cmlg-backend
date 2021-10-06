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
        Storage::disk('local')->putFileAs('',$file,'data.xlsx');
        (new ImportController)->store('data.xlsx');
        return response('',201);
    }
}
