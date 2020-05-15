<?php

namespace App\Imports;

use App\Translation;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TranslationImport implements ToModel, WithHeadingRow
{

    public function model(array $row){
        // store entity set in translations table
        return new Translation([
            'name' => $row['en_english'] ?? $row['zh_cn']
        ]);
    }
}
