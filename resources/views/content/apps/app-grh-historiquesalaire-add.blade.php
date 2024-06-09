@extends('layouts/layoutMaster')

@section('title', 'Ajouter Historique Salaire - Apps')

@section('content')
<div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3">

    <div class="d-flex flex-column justify-content-center">
      <h4 class="mb-1 mt-3">Modifier un salaire</h4>

    </div>
    <div class="d-flex align-content-center flex-wrap gap-3">
        <a href="{{ route('historiquesalaire.index') }}" class="btn btn-primary">Historique des modifications</a>
    </div>

  </div>

<div class="card mb-4">
  <div class="card-header">
    <h5 class="card-title mb-0">Ajouter Historique Salaire</h5>
  </div>
  <div class="card-body">
    <form action="{{ route('historiquesalaire.store') }}" method="POST">
      @csrf
      <div class="mb-3">
        <label for="IDEmploye" class="form-label">Employé</label>
        <select class="form-select" id="IDEmploye" name="IDEmploye" required>
          @foreach($employes as $employe)
            <option value="{{ $employe->IDEmploye }}">{{ $employe->Nom }} {{ $employe->Prenom }}</option>
          @endforeach
        </select>
      </div>
      <div class="mb-3">
        <label for="DateChangementSalaire" class="form-label">Date de Changement de Salaire</label>
        <input type="date" class="form-control" id="DateChangementSalaire" name="DateChangementSalaire" required>
      </div>
      <div class="mb-3">
        <label for="NouveauSalaire" class="form-label">Nouveau Salaire</label>
        <input type="number" class="form-control" id="NouveauSalaire" name="NouveauSalaire" required>
      </div>
      <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
  </div>
</div>
@endsection
