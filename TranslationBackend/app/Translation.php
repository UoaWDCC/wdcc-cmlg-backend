<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    public function words() {
        return $this->hasMany(Word::class);
    }
}
