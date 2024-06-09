@extends('layouts/layoutMaster')

@section('title', 'Edit Departement - Apps')

@section('content')
<h4 class="py-3 mb-4">
  <span class="text-muted fw-light">Departement /</span> Edit
</h4>

<div class="card">
  <div class="card-body">
    <form action="{{ route('departement.update', $departement->IDDepartement) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="mb-3">
        <label for="NomDepartement" class="form-label">Nom Departement</label>
        <input type="text" class="form-control" id="NomDepartement" name="NomDepartement" value="{{ $departement->NomDepartement }}" required>
      </div>
      <div class="mb-3">
                            <label for="ResponsableDepartement" class="form-label">Responsable du Département</label>
                            <select class="form-control select2" id="ResponsableDepartement" name="ResponsableDepartement">
                                <option value="">Sélectionner un employé</option>
                                @foreach ($employes as $employe)
                                <option value="{{ $employe->IDEmploye }}" @if($departement->ResponsableDepartement == $employe->IDEmploye) selected @endif>{{ $employe->Nom }}</option>
                                @endforeach
                            </select>
                        </div>
      <button type="submit" class="btn btn-primary">Update</button>
    </form>
  </div>
</div>
@endsection
