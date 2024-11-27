@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Créer un Nouveau Bénéficiaire</h2>

        <form action="{{ route('beneficiaire.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" name="nom" class="form-control" id="nom" required>
            </div>
            <div class="mb-3">
                <label for="prenom" class="form-label">Prénom</label>
                <input type="text" name="prenom" class="form-control" id="prenom" required>
            </div>
            <div class="mb-3">
                <label for="adresse" class="form-label">Adresse</label>
                <textarea name="adresse" class="form-control" id="adresse" required></textarea>
            </div>
            <div class="mb-3">
                <label for="telephone" class="form-label">Téléphone</label>
                <input type="text" name="telephone" class="form-control" id="telephone" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="email" required>
            </div>
            <div class="mb-3">
                <label for="type_beneficaire" class="form-label">Type de Bénéficiaire</label>
                <select name="type_beneficiaire" id="type_beneficiaire" class="form-control" required>
                    <option value="personne">Personne</option>
                    <option value="entreprise">Entreprise</option>
                </select>                
            </div>
            
            <button type="submit" class="btn btn-primary">Créer</button>
            <a href="{{ route('beneficiaire.index') }}" class="btn btn-secondary ml-2">Annuler</a>
        </form>
    </div>
@endsection
