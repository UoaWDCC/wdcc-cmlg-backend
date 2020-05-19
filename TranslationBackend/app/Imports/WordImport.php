<?php

namespace App\Imports;
use App\Language;
use App\Translation;
use App\Word;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class WordImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        $wordIndex = 1;
        $rows = $rows->toArray();

        // store entity set in words table
        // the index of row number is same as translation id
        // the index of column number is same as language id
        for($i = 1; $i <= count($rows) - 1; $i++){

            // check this row contains values
            $row = $rows[$i];
            $filteredRow = array_filter($row, function ($value) { return $value !== null; });

            if($filteredRow) {

                for($j = 0; $j < count($row); $j++){

                    $word = new Word([
                        'id' => $wordIndex,
                        'name' =>$row[$j],
                        'language_id' => $j + 1,
                        'translation_id' => $i,
                    ]);

                    $word->save();

                    $wordIndex++;
                }
            }
        }
    }
}
