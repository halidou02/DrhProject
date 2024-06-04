@extends('layouts/layoutMaster')

@section('title', 'Modifier Employé - Apps')

@section('vendor-style')
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
@endsection

@section('vendor-script')
<script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
@endsection

@section('page-script')
<script>
    $(document).ready(function() {
        $('.select2').select2();

        $('#Photo').change(function() {
            let reader = new FileReader();
            reader.onload = (e) => {
                $('#photo-preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
    });
</script>
@endsection

@section('content')
<h4 class="py-3 mb-4">
    <span class="text-muted fw-light">Employe /</span> Modifier
</h4>

<div class="card mb-4">
    <div class="card-body">
        <form action="{{ route('employe.update', $employe->IDEmploye) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="Nom" class="form-label">Nom</label>
                <input type="text" class="form-control" id="Nom" name="Nom" value="{{ $employe->Nom }}" required>
            </div>

            <div class="mb-3">
                <label for="Prenom" class="form-label">Prenom</label>
                <input type="text" class="form-control" id="Prenom" name="Prenom" value="{{ $employe->Prenom }}" required>
            </div>

            <div class="mb-3">
                <label for="DateNaissance" class="form-label">Date de Naissance</label>
                <input type="date" class="form-control" id="DateNaissance" name="DateNaissance" value="{{ $employe->DateNaissance }}" required>
            </div>

            <div class="mb-3">
                <label for="Genre" class="form-label">Genre</label>
                <select class="form-control select2" id="Genre" name="Genre" required>
                    <option value="H" {{ $employe->Genre == 'H' ? 'selected' : '' }}>Homme</option>
                    <option value="F" {{ $employe->Genre == 'F' ? 'selected' : '' }}>Femme</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="Adresse" class="form-label">Adresse</label>
                <input type="text" class="form-control" id="Adresse" name="Adresse" value="{{ $employe->Adresse }}">
            </div>

            <div class="mb-3">
                <label for="NumeroTelephone" class="form-label">Numéro de Téléphone</label>
                <input type="text" class="form-control" id="NumeroTelephone" name="NumeroTelephone" value="{{ $employe->NumeroTelephone }}">
            </div>

            <div class="mb-3">
                <label for="Email" class="form-label">Email</label>
                <input type="email" class="form-control" id="Email" name="Email" value="{{ $employe->Email }}">
            </div>

            <div class="mb-3">
                <label for="DateIncorporation" class="form-label">Date d'Incorporation</label>
                <input type="date" class="form-control" id="DateIncorporation" name="DateIncorporation" value="{{ $employe->DateIncorporation }}" required>
            </div>

            <div class="mb-3">
                <label for="SalairedeBase" class="form-label">Salaire de Base</label>
                <input type="number" class="form-control" id="SalairedeBase" name="SalairedeBase" value="{{ $employe->SalairedeBase }}">
            </div>

            <div class="mb-3">
                <label for="Statut" class="form-label">Statut</label>
                <input type="text" class="form-control" id="Statut" name="Statut" value="{{ $employe->Statut }}">
            </div>

            <div class="mb-3">
                <label for="EtatCivil" class="form-label">État Civil</label>
                <input type="text" class="form-control" id="EtatCivil" name="EtatCivil" value="{{ $employe->EtatCivil }}">
            </div>

            <div class="mb-3">
                <label for="Photo" class="form-label">Photo</label>
                <input type="file" class="form-control" id="Photo" name="Photo">
                <img id="photo-preview" src="{{ $employe->Photo ? asset($employe->Photo) : '' }}" alt="Aperçu de la photo" style="max-width: 200px; margin-top: 10px;">
            </div>

            <div class="mb-3">
                <label for="IDDepartement" class="form-label">Département</label>
                <select class="form-control select2" id="IDDepartement" name="IDDepartement" required>
                    @foreach($departements as $departement)
                        <option value="{{ $departement->IDDepartement }}" {{ $employe->IDDepartement == $departement->IDDepartement ? 'selected' : '' }}>{{ $departement->NomDepartement }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="IDPoste" class="form-label">Poste</label>
                <select class="form-control select2" id="IDPoste" name="IDPoste" required>
                    @foreach($postes as $poste)
                        <option value="{{ $poste->IDPoste }}" {{ $employe->IDPoste == $poste->IDPoste ? 'selected' : '' }}>{{ $poste->TitrePoste }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Mettre à jour</button>
        </form>
    </div>
</div>

@endsection
