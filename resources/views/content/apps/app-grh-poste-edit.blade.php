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

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Éditer Poste</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('poste.update', $poste->IDPoste) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="TitrePoste" class="form-label">Titre du Poste</label>
                            <input type="text" class="form-control" id="TitrePoste" name="TitrePoste" value="{{ $poste->TitrePoste }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="SalaireDeBase" class="form-label">Salaire de Base</label>
                            <input type="number" class="form-control" id="SalaireDeBase" name="SalaireDeBase" value="{{ $poste->SalaireDeBase }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="Description" class="form-label">Description</label>
                            <textarea class="form-control" id="Description" name="Description" required>{{ $poste->Description }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="IdDepartement" class="form-label">Département</label>
                            <select class="form-control select2" id="IdDepartement" name="IdDepartement" required>
                                <option value="">Sélectionner un département</option>
                                @foreach ($departements as $departement)
                                <option value="{{ $departement->IDDepartement }}" @if($poste->IdDepartement == $departement->IDDepartement) selected @endif>{{ $departement->NomDepartement }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Éditer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
