@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mb-4">Modifier le Compte</h2>

        <!-- Affichage des messages de succès ou d'erreur -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('compte.update', $compte) }}" method="POST">
            @csrf
            @method('PUT') <!-- Indiquer que c'est une mise à jour -->

            <div class="row mb-3">
                <label for="num_compt" class="col-md-3 col-form-label">Numéro du Compte</label>
                <div class="col-md-9">
                    <input type="text" name="num_compt" id="num_compt" class="form-control" value="{{ $compte->num_compt }}" required>
                </div>
            </div>

            <div class="row mb-3">
                <label for="type_compt" class="col-md-3 col-form-label">Type de Compte</label>
                <div class="col-md-9">
                    <input type="text" name="type_compt" id="type_compt" class="form-control" value="{{ $compte->type_compt }}" required>
                </div>
            </div>

            <div class="row mb-3">
                <label for="sold" class="col-md-3 col-form-label">Solde</label>
                <div class="col-md-9">
                    <input type="number" name="sold" id="sold" class="form-control" value="{{ $compte->sold }}" required step="0.01">
                </div>
            </div>

            <div class="row mb-3">
                <label for="date_creation" class="col-md-3 col-form-label">Date de Création</label>
                <div class="col-md-9">
                    <input type="date" name="date_creation" id="date_creation" class="form-control" value="{{ $compte->date_creation->format('Y-m-d') }}" required>
                </div>
            </div>

            <div class="row mb-3">
                <label for="description" class="col-md-3 col-form-label">Description</label>
                <div class="col-md-9">
                    <textarea name="description" id="description" class="form-control" rows="3">{{ $compte->description }}</textarea>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-9 offset-md-3">
                    <button type="submit" class="btn btn-primary">Mettre à jour le compte</button>
                    <a href="{{ route('compte.index') }}" class="btn btn-secondary ml-2">Annuler</a>
                </div>
            </div>
        </form>
    </div>
@endsection
