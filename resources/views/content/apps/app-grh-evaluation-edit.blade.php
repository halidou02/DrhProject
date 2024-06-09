@extends('layouts/layoutMaster')

@section('title', 'Modifier Évaluation Performance - Apps')

@section('vendor-style')
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
@endsection

@section('vendor-script')
<script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
@endsection

@section('content')
<h4 class="py-3 mb-4">
  <span class="text-muted fw-light">Evaluation Performance /</span> Modifier
</h4>

<div class="card mb-4">
  <div class="card-body">
    <form action="{{ route('evaluation.update', $evaluation->IDEvaPerform) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="mb-3">
        <label for="IDEmploye" class="form-label">Employé</label>
        <select class="form-select" id="IDEmploye" name="IDEmploye" required onchange="updateDepartement()">
          <option value="" disabled>Choisir un employé</option>
          @foreach ($employes as $employe)
          <option value="{{ $employe->IDEmploye }}" data-departement="{{ $employe->departement->NomDepartement }}" {{ $employe->IDEmploye == $evaluation->IDEmploye ? 'selected' : '' }}>{{ $employe->Nom }}</option>
          @endforeach
        </select>
      </div>
      <div class="mb-3">
        <label for="Departement" class="form-label">Département</label>
        <input type="text" class="form-control" id="Departement" name="Departement" value="{{ $evaluation->departement->NomDepartement }}" readonly>
      </div>
      <div class="mb-3">
        <label for="DateEvaluat" class="form-label">Date d'Évaluation</label>
        <input type="date" class="form-control" id="DateEvaluat" name="DateEvaluat" value="{{ $evaluation->DateEvaluat }}" required>
      </div>
      <div class="mb-3">
        <label for="ResultEvaluat" class="form-label">Résultat d'Évaluation</label>
        <input type="number" class="form-control" id="ResultEvaluat" name="ResultEvaluat" value="{{ $evaluation->ResultEvaluat }}" min="1" max="10" required>
      </div>
      <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
  </div>
</div>

<script>
  function updateDepartement() {
    const employeSelect = document.getElementById('IDEmploye');
    const departementInput = document.getElementById('Departement');
    const selectedOption = employeSelect.options[employeSelect.selectedIndex];
    const departement = selectedOption.getAttribute('data-departement');
    departementInput.value = departement;
  }

  // Initialiser le département au chargement
  document.addEventListener('DOMContentLoaded', function() {
    updateDepartement();
  });
</script>

@endsection
