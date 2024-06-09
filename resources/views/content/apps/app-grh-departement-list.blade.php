@extends('layouts/layoutMaster')

@section('title', 'GRH Departement List - Apps')

@section('content')

<div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3">

    <div class="d-flex flex-column justify-content-center">
      <h4 class="mb-1 mt-3">Liste des Departements</h4>

    </div>
    <div class="d-flex align-content-center flex-wrap gap-3">
        <a href="{{ route('departement.create') }}" class="btn btn-primary">Ajouter des Departements</a>
    </div>

  </div>
  <div class="container">
    <div class="row">
        <!-- Département Table -->
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Départements</h5>
                </div>
                <div class="table-responsive text-nowrap">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nom</th>
                                <th>Responsable</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($departements as $departement)
                            <tr>
                                <td>{{ $departement->IDDepartement }}</td>
                                <td>{{ $departement->NomDepartement }}</td>
                                <td>{{ $departement->responsable->Nom ?? 'N/A' }}</td>
                                <td>
                                    <a href="{{ route('departement.edit', $departement->IDDepartement) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('departement.destroy', $departement->IDDepartement) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
