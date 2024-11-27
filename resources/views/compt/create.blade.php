@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Créer un Nouveau Compte</h2>

        <form action="{{ route('compte.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="num_compt" class="form-label">Numéro du Compte</label>
                <input type="text" name="num_compt" class="form-control" id="num_compt" required>
            </div>
            <div class="mb-3">
                <label for="type_compt" class="form-label">Type du Compte</label>
                <input type="text" name="type_compt" class="form-control" id="type_compt" required>
            </div>
            <div class="mb-3">
                <label for="sold" class="form-label">Solde</label>
                <input type="number" step="0.01" name="sold" class="form-control" id="sold" required>
            </div>
            <div class="mb-3">
                <label for="date_creation" class="form-label">Date de Création</label>
                <input type="date" name="date_creation" class="form-control" id="date_creation" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" class="form-control" id="description"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Créer</button>
            <a href="{{ route('compte.index') }}" class="btn btn-secondary ml-2">Annuler</a>
        </form>
    </div>
@endsection
{{-- mouna  --}}