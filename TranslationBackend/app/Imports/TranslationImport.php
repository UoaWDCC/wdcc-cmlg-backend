<?php

namespace App\Imports;

use App\Translation;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Row;

class TranslationImport implements OnEachRow, WithHeadingRow
{
    public function onRow(Row $row)
    {
        // rowIndex starts from 2, -1 to make it starts from 1
        $rowIndex = $row->getIndex() - 1;
        $row = $row->toArray();

        // check this row contains values
        $row = array_filter($row, function ($value) { return $value !== null; });

        if ($row) {
            $translation = new Translation([
                'id' => $rowIndex,
                'name' => $row['en_english'] ?? $row['zh_cn']
            ]);
            $translation->save();
        }

    }
}
