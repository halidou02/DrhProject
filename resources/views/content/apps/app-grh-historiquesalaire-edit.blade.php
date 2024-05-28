@extends('layouts/layoutMaster')

@section('title', 'Modifier Historique Salaire - Apps')

@section('content')
<h4 class="py-3 mb-4">
  <span class="text-muted fw-light">Historique Salaire /</span>Modifier
</h4>

<div class="card mb-4">
  <div class="card-header">
    <h5 class="card-title mb-0">Modifier Historique Salaire</h5>
  </div>
  <div class="card-body">
    <form action="{{ route('historiquesalaire.update', $historique->IDHistoriqueSalaire) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="mb-3">
        <label for="IDEmploye" class="form-label">Employé</label>
        <select class="form-select" id="IDEmploye" name="IDEmploye" required>
          @foreach($employes as $employe)
            <option value="{{ $employe->IDEmploye }}" {{ $historique->IDEmploye == $employe->IDEmploye ? 'selected' : '' }}>
              {{ $employe->Nom }} {{ $employe->Prenom }}
            </option>
          @endforeach
        </select>
      </div>
      <div class="mb-3">
        <label for="DateChangementSalaire" class="form-label">Date de Changement de Salaire</label>
        <input type="date" class="form-control" id="DateChangementSalaire" name="DateChangementSalaire" value="{{ $historique->DateChangementSalaire }}" required>
      </div>
      <div class="mb-3">
        <label for="NouveauSalaire" class="form-label">Nouveau Salaire</label>
        <input type="number" class="form-control" id="NouveauSalaire" name="NouveauSalaire" value="{{ $historique->NouveauSalaire }}" required>
      </div>
      <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
  </div>
</div>
@endsection
