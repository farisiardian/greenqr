<?php

namespace App\Exports;

use App\Models\AssessmentCategory;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class MultipleSheetExport implements WithMultipleSheets
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        //
    }

    public function sheets(): array
    {
        return [
            new SalesExport,
            //new ExportQuestionnaireManangement,

        ];
    }
}
