@extends('layouts/layoutMaster')

@section('title', 'Add Departement - Apps')

@section('content')

<div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3">

    <div class="d-flex flex-column justify-content-center">
      <h4 class="mb-1 mt-3">Nouveau Departement</h4>

    </div>
    <div class="d-flex align-content-center flex-wrap gap-3">
        <a href="{{ route('departement.index') }}" class="btn btn-primary">Liste des Departements</a>
    </div>

  </div>
<div class="card">
  <div class="card-body">
    <form action="{{ route('departement.store') }}" method="POST">
      @csrf
      <div class="mb-3">
        <label for="NomDepartement" class="form-label">Nom Departement</label>
        <input type="text" class="form-control" id="NomDepartement" name="NomDepartement" required>
      </div>
      <div class="mb-3">
                            <label for="ResponsableDepartement" class="form-label">Responsable du Département</label>
                            <select class="form-control select2" id="ResponsableDepartement" name="ResponsableDepartement">
                                <option value="">Sélectionner un employé</option>
                                @foreach ($employes as $employe)
                                <option value="{{ $employe->IDEmploye }}">{{ $employe->Nom }}</option>
                                @endforeach
                            </select>
                        </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>
@endsection
