<?php

namespace App\Http\Controllers;

use App\Imports\TranslationImport;
use Maatwebsite\Excel\Facades\Excel;

class TranslationController extends Controller
{
    public function store($path){
        // import all the data from Excel sheet to TranslationImport
        Excel::import(new TranslationImport, $path);
    }

}
