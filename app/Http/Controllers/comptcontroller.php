<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompteModel;
use App\Exports\ComptesExport;
use App\Imports\ComptesImport;
use Maatwebsite\Excel\Facades\Excel;
class comptcontroller extends Controller
{
    //
    public function index()
    {
        // Récupère tous les comptes
        $comptes = CompteModel::all();
        return view('compt.index', compact('comptes'));
    }

    // Afficher le formulaire pour créer un nouveau compte
    public function create()
    {
        return view('compt.create');
    }

    // Enregistrer un nouveau compte dans la base de données
    public function store(Request $request)
    {
        // Validation des données du formulaire
        $request->validate([
            'num_compt' => 'required|string|max:50',
            'type_compt' => 'required|string|max:255',
            'sold' => 'required|numeric',
            'date_creation' => 'required|date',
            'description' => 'nullable|string|max:500',
        ]);

        // Créer un nouveau compte dans la base de données
        CompteModel::create($request->all());

        // Rediriger vers la page index avec un message de succès
        return redirect()->route('compte.index')
            ->with('success', 'Compte créé avec succès.');
    }

    // Afficher le formulaire pour éditer un compte existant
    public function edit(CompteModel $compte)
    {
        return view('compt.edit', compact('compte'));
    }

    // Mettre à jour un compte existant dans la base de données
    public function update(Request $request, CompteModel $compte)
    {
        // Validation des données du formulaire
        $request->validate([
            'num_compt' => 'required|string|max:50',
            'type_compt' => 'required|string|max:255',
            'sold' => 'required|numeric',
            'date_creation' => 'required|date',
            'description' => 'nullable|string|max:500',
        ]);
        $compte->update($request->all());
        return redirect()->route('compte.index')
            ->with('success', 'Compte mis à jour avec succès.');
    }

    // Supprimer un compte de la base de données
    public function destroy(CompteModel $compte)
    {
        // Supprimer le compte
        $compte->delete();

        // Rediriger vers la page index avec un message de succès
        return redirect()->route('compte.index')
            ->with('success', 'Compte supprimé avec succès.');
    }
    public function export()
    {
        return Excel::download(new ComptesExport, 'comptes.xlsx');
    }
    // 
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv|max:2048', // Valide le fichier
        ]);

        try {
            // Traite le fichier Excel ou CSV et l'importe
            Excel::import(new ComptesImport, $request->file('file'));

            return redirect()->route('compte.index')->with('success', 'Comptes importés avec succès!');
        } catch (\Exception $e) {
            return redirect()->route('compte.index')->with('error', 'Erreur lors de l\'importation : ' . $e->getMessage());
        }
    }
    
    
    
    
    
    
}
