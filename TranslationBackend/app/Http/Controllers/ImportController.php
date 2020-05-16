<?php

namespace App\Http\Controllers;

class ImportController extends Controller
{
    public function store(){
        // insert all the data to database
        app(LanguageController::class) -> store();
        app(TranslationController::class) -> store();
        app(WordController::class) -> store();
    }
}
