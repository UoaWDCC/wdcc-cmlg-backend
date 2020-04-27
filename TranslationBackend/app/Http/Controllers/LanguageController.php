<?php

namespace App\Http\Controllers;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\LanguagesImport;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function store() {
        return ('Hello World!');
        //Excel::import(new LanguagesImport, 'data.xlsx');
    }

    
}
