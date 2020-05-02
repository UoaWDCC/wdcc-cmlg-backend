<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Word extends Model
{
    protected $fillable = ['id', 'name', 'translation_id', 'language_id'];
    public function search($word) {

        // selecting the words related to the search word from the database
        $data = DB::table('words')
            ->join('languages', 'words.language_id', '=', 'languages.id')
            ->select(['words.id', 'words.name', 'languages.name AS language_name', 'translation_id'])
            ->where('words.name', 'like', '%'.$word.'%')
            ->orderBy('languages.id', 'asc')
            ->orderBy('translation_id', 'asc')
            ->get();

        // group the data by language name and return an JSON file
        return $data->groupBy('language_name')->toJson();

    }

    public function language() {
        return $this->belongsTo(Language::class, 'language_id');
    }

    public function translation() {
        return $this->belongsTo(Translation::class, 'translation_id');
    }
}
