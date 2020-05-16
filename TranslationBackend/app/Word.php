<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    protected $fillable = ['id', 'name', 'translation_id', 'language_id'];
    public function search($word) {

        //$data => Word::with('languages')->select()->where();

        // SELECT languages.name AS language,words.name AS word,translation_id
        // FROM words JOIN languages
        // WHERE words.name LIKE '%lo%'
        // ORDER BY languages.id, translation_id;
    }

    public function language() {
        return $this->belongsTo(Language::class, 'language_id');
    }

    public function translation() {
        return $this->belongsTo(Translation::class, 'translation_id');
    }
}
