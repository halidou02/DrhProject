@extends('layouts/layoutMaster')

@section('title', 'Ajouter un Poste - Apps')

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
<div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3">

    <div class="d-flex flex-column justify-content-center">
      <h4 class="mb-1 mt-3">Creer un poste</h4>

    </div>
    <div class="d-flex align-content-center flex-wrap gap-3">
        <a href="{{ route('poste.index') }}" class="btn btn-primary">Liste des postes</a>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Ajouter Poste</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('poste.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="TitrePoste" class="form-label">Titre du Poste</label>
                            <input type="text" class="form-control" id="TitrePoste" name="TitrePoste" required>
                        </div>
                        <div class="mb-3">
                            <label for="SalaireDeBase" class="form-label">Salaire de Base</label>
                            <input type="number" class="form-control" id="SalaireDeBase" name="SalaireDeBase" required>
                        </div>
                        <div class="mb-3">
                            <label for="Description" class="form-label">Description</label>
                            <textarea class="form-control" id="Description" name="Description" required></textarea>
                        </div>
                        <div class="mb-3">
                        <label for="IdDepartement" class="form-label">Département</label>
                            <select class="form-control select2" id="IdDepartement" name="IdDepartement" required>
                                <option value="">Sélectionner un département</option>
                                @foreach ($departements as $departement)
                                <option value="{{ $departement->IDDepartement }}">{{ $departement->NomDepartement }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
