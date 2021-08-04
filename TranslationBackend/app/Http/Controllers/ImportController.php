<?php

namespace App\Http\Controllers;
use App\Language;
use App\Translation;
use App\Word;

class ImportController extends Controller
{
    public function store($path = 'data.xlsx'){
        Word::where('id', 'like', '%%')->delete();
        Translation::where('id', 'like', '%%')->delete();
        Language::where('id', 'like', '%%')->delete();
        // insert all the data to database
        app(LanguageController::class) -> store($path);
        app(TranslationController::class) -> store($path);
        app(WordController::class) -> store($path);
    }
}
