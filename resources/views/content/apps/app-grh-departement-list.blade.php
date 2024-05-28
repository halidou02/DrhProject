@extends('layouts/layoutMaster')

@section('title', 'GRH Departement List - Apps')

@section('content')
<h4 class="py-3 mb-4">
  <span class="text-muted fw-light">Departement /</span> List
</h4>

<div class="card">
  <div class="table-responsive text-nowrap">
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nom Departement</th>
          <th>Responsable Departement</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($departements as $departement)
        <tr>
          <td>{{ $departement->IDDepartement }}</td>
          <td>{{ $departement->NomDepartement }}</td>
          <td>{{ $departement->ResponsableDepartement }}</td>
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
@endsection
