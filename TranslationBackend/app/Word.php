<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Word extends Model
{
    protected $fillable = ['id', 'name', 'translation_id', 'language_id'];
    public function search($word) {

        // select the translation id of the words that contains the search key word
        $translation = DB::table('words')
            ->select('translation_id')
            ->where('words.name', 'like', '%'.$word.'%')
            ->distinct()
            ->get();

        $translationArray = $translation->pluck('translation_id');

        // selecting the words with the required translation id
        $data = DB::table('words')
            ->join('languages', 'words.language_id', '=', 'languages.id')
            ->select(['words.name', 'languages.id AS language_id', 'languages.name AS language_name', 'translation_id'])
            ->whereIn('translation_id', $translationArray)
            ->orderBy('translation_id', 'asc')
            ->orderBy('language_id', 'asc')
            ->get();

        // Return an JSON file
        return $data->toJson();
    }

    public function language() {
        return $this->belongsTo(Language::class, 'language_id');
    }

    public function translation() {
        return $this->belongsTo(Translation::class, 'translation_id');
    }
}
