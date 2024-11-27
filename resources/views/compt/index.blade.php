@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Liste des Comptes</h2>

        <div class="d-flex justify-content-between mb-3">
            <a href="{{ route('compte.create') }}" class="btn btn-success">Créer un nouveau compte</a>
            
            <!-- Boutons pour exportation et importation -->
            <div>
                <a href="{{ route('compte.export') }}" class="btn btn-primary">Exporter</a>

                <!-- Formulaire d'importation avec un message d'alerte pour l'erreur -->
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#importModal">
                    Importer
                </button>
            </div>
        </div>

        <!-- Modal pour l'importation -->
        <div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="importModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="importModalLabel">Importer un fichier Excel (XLSX) ou CSV</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('compte.import') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="file">Sélectionner un fichier à importer</label>
                                <input type="file" name="file" id="file" class="form-control" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-success">Importer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>Numéro du Compte</th>
                    <th>Type de Compte</th>
                    <th>Solde</th>
                    <th>Date de Création</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($comptes as $compte)
                    <tr>
                        <td>{{ $compte->num_compt }}</td>
                        <td>{{ $compte->type_compt }}</td>
                        <td>{{ $compte->sold }}</td>
                        <td>{{ $compte->date_creation->format('d/m/Y') }}</td>
                        <td>{{ $compte->description }}</td>
                        <td>
                            <a href="{{ route('compte.edit', $compte) }}" class="btn btn-warning btn-sm">Modifier</a>
                            <form action="{{ route('compte.destroy', $compte) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            // Optionnel: Si vous voulez réinitialiser le formulaire de téléchargement après la fermeture du modal
            $('#importModal').on('hidden.bs.modal', function () {
                $('#file').val('');
            });
        });
    </script>
@endsection
