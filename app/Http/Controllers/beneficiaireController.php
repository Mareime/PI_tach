<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bmodel;
use App\Exports\BeneficiairesExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\BeneficiairesInport;
class beneficiaireController extends Controller
{
    //
    public function index(){
        $beneficiaires=Bmodel::all();
        return view('beneficiaire.index',compact('beneficiaires'));
    }
    public function create()
    {
        return view('beneficiaire.create');
    }
    public function edit(Bmodel $beneficiaire)
    {
        return view('beneficiaire.edit', compact('beneficiaire'));
    }

    public function update(Request $request, Bmodel $beneficiaire)
    {
        // Validation des données du formulaire
        $request->validate([
            'nom' => 'required|string|max:50',
            'prenom' => 'required|string|max:255',
            'adresse' => 'required|string',
            'telephone' => 'required|numeric',
            'email' => 'nullable|email',
            'type_beneficiaire' => 'nullable|in:personne,entreprise',
        ]);
    
        // Récupérer toutes les données du formulaire
        $data = $request->all();
    
        // Mettre à jour le bénéficiaire avec les nouvelles données
        $beneficiaire->update($data);
    
        return redirect()->route('beneficiaire.index')
            ->with('success', 'Bénéficiaire mis à jour avec succès.');
    }
    
    
    public function store(Request $request)
    {
        // Validation des données du formulaire
        $request->validate([
            'nom' => 'required|string|max:50',
            'prenom' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'telephone' => 'required|numeric',
            'email' => 'required|email',
            'type_beneficiaire' => 'required|in:personne,entreprise',
        ]);
        
        // Créer un nouveau compte dans la base de données
        Bmodel::create($request->all());

        // Rediriger vers la page index avec un message de succès
        return redirect()->route('beneficiaire.index')
            ->with('success', 'beneficiaire créé avec succès.');
    }
    public function destroy(Bmodel $beneficiaire)
    {
        // Supprimer le compte
        $beneficiaire->delete();

        // Rediriger vers la page index avec un message de succès
        return redirect()->route('beneficiaire.index')
            ->with('success', 'beneficiaire supprimé avec succès.');
    }
    public function import(Request $request)
{
    // Valider le fichier téléchargé
    $request->validate([
        'file' => 'required|mimes:xlsx,csv|max:2048', // Max 2MB
    ]);

    try {
        // Traite le fichier Excel ou CSV et l'importe dans la base de données
        Excel::import(new BeneficiairesInport, $request->file('file'));

        // Retourne vers la page index avec un message de succès
        return redirect()->route('beneficiaire.index')->with('success', 'Bénéficiaires importés avec succès!');
    } catch (\Exception $e) {
        // Si une erreur se produit, redirige avec un message d'erreur
        return redirect()->route('beneficiaire.index')->with('error', 'Erreur lors de l\'importation : ' . $e->getMessage());
    }
}

    
    public function export()
{
    // Utiliser la classe d'export pour exporter les données des bénéficiaires
    return Excel::download(new BeneficiairesExport, 'beneficiaires.xlsx');
}

}
