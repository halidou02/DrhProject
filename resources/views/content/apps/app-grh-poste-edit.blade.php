@extends('layouts/layoutMaster')

@section('title', 'Modifier un Poste - Apps')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/forms-selects.js')}}"></script>
@endsection

@section('content')
<h4 class="py-3 mb-4">
  <span class="text-muted fw-light">Poste /</span> Modifier
</h4>

<div class="card mb-4">
    <div class="card-header">
        <h5 class="card-title mb-0">Modifier un Poste</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('poste.update', $poste->IDPoste) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="TitrePoste" class="form-label">Titre Poste</label>
                <input type="text" class="form-control" id="TitrePoste" name="TitrePoste" value="{{ $poste->TitrePoste }}" required>
            </div>
            <div class="mb-3">
                <label for="Description" class="form-label">Description</label>
                <textarea class="form-control" id="Description" name="Description">{{ $poste->Description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="SalaireBase" class="form-label">Salaire de Base</label>
                <input type="number" class="form-control" id="SalaireBase" name="SalaireBase" value="{{ $poste->SalaireBase }}" required>
            </div>
            <div class="mb-3">
                <label for="IDDepartement" class="form-label">Département</label>
                <select class="form-select select2" id="IDDepartement" name="IDDepartement" required>
                    @foreach ($departements as $departement)
                        <option value="{{ $departement->IDDepartement }}" {{ $poste->IDDepartement == $departement->IDDepartement ? 'selected' : '' }}>{{ $departement->NomDepartement }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Modifier</button>
        </form>
    </div>
</div>

@endsection
