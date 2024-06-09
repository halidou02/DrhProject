@extends('layouts/layoutMaster')

@section('title', 'Ajouter Évaluation Performance - Apps')

@section('vendor-style')
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
@endsection

@section('vendor-script')
<script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
@endsection

@section('content')
<div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3">

    <div class="d-flex flex-column justify-content-center">
      <h4 class="mb-1 mt-3">Evaluation</h4>

    </div>
    <div class="d-flex align-content-center flex-wrap gap-3">
        <a href="{{ route('evaluation.index') }}" class="btn btn-primary">Resultat Evaluation</a>
    </div>

  </div>

<div class="card mb-4">
  <div class="card-body">
    <form action="{{ route('evaluation.store') }}" method="POST">
      @csrf
      <div class="mb-3">
        <label for="IDEmploye" class="form-label">Employé</label>
        <select class="form-select" id="IDEmploye" name="IDEmploye" required onchange="updateDepartement()">
          <option value="" disabled selected>Choisir un employé</option>
          @foreach ($employes as $employe)
          <option value="{{ $employe->IDEmploye }}" data-departement="{{ $employe->departement->NomDepartement }}">{{ $employe->Nom }}</option>
          @endforeach
        </select>
      </div>
      <div class="mb-3">
        <label for="Departement" class="form-label">Département</label>
        <input type="text" class="form-control" id="Departement" name="Departement" readonly>
      </div>
      <div class="mb-3">
        <label for="DateEvaluat" class="form-label">Date d'Évaluation</label>
        <input type="date" class="form-control" id="DateEvaluat" name="DateEvaluat" required>
      </div>
      <div class="mb-3">
        <label for="ResultEvaluat" class="form-label">Résultat d'Évaluation</label>
        <input type="number" class="form-control" id="ResultEvaluat" name="ResultEvaluat" min="1" max="10" required>
      </div>
      <button type="submit" class="btn btn-primary">Ajouter</button>
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
</script>

@endsection
