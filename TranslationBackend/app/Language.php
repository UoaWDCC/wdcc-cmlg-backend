<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $fillable = ['id', 'name'];
    public function words() {
        return $this->hasMany(Word::class);
    }
    public function store($data){
        // store entity set in language table
        $id = 1;
        foreach($data as $languages){
            $language = new Language([
                'id' => $id,
                'name' => $languages
            ]);
            $language -> save();
            $id++;
        }
    }
}
