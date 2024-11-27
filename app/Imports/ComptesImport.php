<?php
namespace App\Imports;

use App\Models\CompteModel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Shared\Date;
class ComptesImport implements ToModel, WithHeadingRow
{

    
    public function model(array $row)
    {
        // Convertir le numéro de série Excel en une date
        $date_creation = Carbon::instance(Date::excelToDateTimeObject($row['date_creation']));
    
        return new CompteModel([
            'num_compt' => $row['num_compt'],
            'type_compt' => $row['type_compt'],
            'sold' => $row['sold'],
            'date_creation' => $date_creation,  
            'description' => $row['description'],
        ]);
    }
    
}
