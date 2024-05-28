@extends('layouts/layoutMaster')

@section('title', 'Add Departement - Apps')

@section('content')
<h4 class="py-3 mb-4">
  <span class="text-muted fw-light">Departement /</span> Add
</h4>

<div class="card">
  <div class="card-body">
    <form action="{{ route('departement.store') }}" method="POST">
      @csrf
      <div class="mb-3">
        <label for="NomDepartement" class="form-label">Nom Departement</label>
        <input type="text" class="form-control" id="NomDepartement" name="NomDepartement" required>
      </div>
      <div class="mb-3">
        <label for="ResponsableDepartement" class="form-label">Responsable Departement</label>
        <input type="text" class="form-control" id="ResponsableDepartement" name="ResponsableDepartement">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>
@endsection
