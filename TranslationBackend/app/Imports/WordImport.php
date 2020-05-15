<?php

namespace App\Imports;
use App\Word;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class WordImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        // store entity set in words table
        // the index of row number is same as translation id
        // the index of column number is same as language id
        for($i = 1; $i <= count($rows) - 1; $i ++){
            for($j = 1; $j <= count($rows[$i]); $j ++){
                $word = new Word([
                    'name' =>$rows[$i][$j - 1],
                    'language_id' => $j,
                    'translation_id' => $i,
                ]);
                $word->save();
            }
        }
    }
}
