@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mb-4">Modifier le Bénéficiaire</h2>

        <!-- Affichage des messages de succès ou d'erreur -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('beneficiaire.update', $beneficiaire) }}" method="POST">
            @csrf
            @method('PUT') <!-- Indiquer que c'est une mise à jour -->

            <!-- Champ Nom -->
            <div class="mb-3 row">
                <label for="nom" class="col-md-3 col-form-label">Nom</label>
                <div class="col-md-9">
                    <input type="text" name="nom" id="nom" class="form-control" value="{{ $beneficiaire->nom }}" required>
                </div>
            </div>

            <!-- Champ Prénom -->
            <div class="mb-3 row">
                <label for="prenom" class="col-md-3 col-form-label">Prénom</label>
                <div class="col-md-9">
                    <input type="text" name="prenom" id="prenom" class="form-control" value="{{ $beneficiaire->prenom }}" required>
                </div>
            </div>

            <!-- Champ Adresse -->
            <div class="mb-3 row">
                <label for="adresse" class="col-md-3 col-form-label">Adresse</label>
                <div class="col-md-9">
                    <textarea name="adresse" id="adresse" class="form-control" rows="3" required>{{ $beneficiaire->adresse }}</textarea>
                </div>
            </div>

            <!-- Champ Téléphone -->
            <div class="mb-3 row">
                <label for="telephone" class="col-md-3 col-form-label">Téléphone</label>
                <div class="col-md-9">
                    <input type="text" name="telephone" id="telephone" class="form-control" value="{{ $beneficiaire->telephone }}" required>
                </div>
            </div>

            <!-- Champ Email -->
            <div class="mb-3 row">
                <label for="email" class="col-md-3 col-form-label">Email</label>
                <div class="col-md-9">
                    <input type="email" name="email" id="email" class="form-control" value="{{ $beneficiaire->email }}" required>
                </div>
            </div>

            <!-- Champ Type de Bénéficiaire -->
            <div class="mb-3 row">
                <label for="type_beneficiaire" class="col-md-3 col-form-label">Type de Bénéficiaire</label>
                <div class="col-md-9">
                    <select name="type_beneficiaire" id="type_beneficiaire" class="form-control" required>
                        <option value="personne" {{ $beneficiaire->type_beneficiaire == 'personne' ? 'selected' : '' }}>Personne</option>
                        <option value="entreprise" {{ $beneficiaire->type_beneficiaire == 'entreprise' ? 'selected' : '' }}>Entreprise</option>
                    </select>
                </div>
            </div>

            <!-- Boutons -->
            <div class="mb-3 row">
                <div class="col-md-9 offset-md-3">
                    <button type="submit" class="btn btn-primary">Mettre à jour le bénéficiaire</button>
                    <a href="{{ route('beneficiaire.index') }}" class="btn btn-secondary ml-2">Annuler</a>
                </div>
            </div>
        </form>
    </div>
@endsection
