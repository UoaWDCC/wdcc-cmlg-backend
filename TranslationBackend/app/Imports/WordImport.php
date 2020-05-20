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
        foreach ($rows as $rowId => $row) {
            if($rowId == 0) {
                // the first row is the header
                continue;
            }

            // check this row contains value
            $filteredRow = array_filter($row, function ($value) { return $value !== null; });

            if ($filteredRow) {

                foreach ($row as $columnId => $word) {

                    $word = new Word([
                        'id' => $wordIndex,
                        'name' => $word,
                        'language_id' => $columnId + 1,
                        'translation_id' => $rowId,
                    ]);

                    $word->save();

                    $wordIndex++;
                }
            }
        }
    }
}
