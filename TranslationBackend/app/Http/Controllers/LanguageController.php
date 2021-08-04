<?php


namespace App\Http\Controllers;
use App\Language;
use Maatwebsite\Excel\HeadingRowImport;

class LanguageController extends Controller
{
    public function store($path){
        // import the heading row of Excel sheet to the languages table
        // listing all the available languages
        $data = (new HeadingRowImport)->toCollection($path)->collapse()->collapse();
        $language = new Language();
        $language->store($data);
    }


}
