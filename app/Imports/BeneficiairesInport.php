<?php


namespace App\Imports;

use App\Models\Bmodel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BeneficiairesInport implements ToCollection, WithHeadingRow
{
    /**
     * Gérer les données importées sous forme de collection.
     *
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        foreach ($collection as $row) {
            // Vérifier la validité des données avant l'insertion
            if (isset($row['nom'], $row['prenom'], $row['adresse'], $row['telephone'], $row['email'], $row['type_beneficiaire'])) {
                // Créer ou mettre à jour un bénéficiaire dans la base de données
                Bmodel::updateOrCreate(
                    ['email' => $row['email']], // Clé unique (par exemple, email)
                    [
                        'nom' => $row['nom'],
                        'prenom' => $row['prenom'],
                        'adresse' => $row['adresse'],
                        'telephone' => $row['telephone'],
                        'type_beneficiaire' => $row['type_beneficiaire'],
                    ]
                );
            }
        }
    }
    
}
