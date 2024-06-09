@extends('layouts/layoutMaster')

@section('title', 'Ajouter un Congé - Apps')

@section('content')
<div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3">

    <div class="d-flex flex-column justify-content-center">
      <h4 class="mb-1 mt-3">Nouveau Congé</h4>

    </div>
    <div class="d-flex align-content-center flex-wrap gap-3">
        <a href="{{ route('conge.index') }}" class="btn btn-primary">Liste des congé</a>
    </div>

  </div>

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Ajouter un Congé</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('conge.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="IDEmploye" class="form-label">Employé</label>
                            <select class="form-control" id="IDEmploye" name="IDEmploye" required>
                                @foreach($employes as $employe)
                                    <option value="{{ $employe->IDEmploye }}">{{ $employe->Nom }} {{ $employe->Prenom }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="Type" class="form-label">Type de Congé</label>
                            <input type="text" class="form-control" id="Type" name="Type" required>
                        </div>
                        <div class="mb-3">
                            <label for="dateDebutConge" class="form-label">Date de Début</label>
                            <input type="date" class="form-control" id="dateDebutConge" name="dateDebutConge" required>
                        </div>
                        <div class="mb-3">
                            <label for="dateFinConge" class="form-label">Date de Fin</label>
                            <input type="date" class="form-control" id="dateFinConge" name="dateFinConge">
                        </div>
                        <div class="mb-3">
                            <label for="StatutConge" class="form-label">Statut</label>
                            <input type="text" class="form-control" id="StatutConge" name="StatutConge" value="en attente" readonly>
                        </div>
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
