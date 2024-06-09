@extends('layouts/layoutMaster')

@section('title', 'Historique Salaire List - Apps')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>
<script src="{{asset('assets/vendor/libs/select2/select2.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/app-ecommerce-product-list.js')}}"></script>
@endsection

@section('content')
<div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3">

    <div class="d-flex flex-column justify-content-center">
      <h4 class="mb-1 mt-3">Historique des modifications</h4>

    </div>
    <div class="d-flex align-content-center flex-wrap gap-3">
        <a href="{{ route('historiquesalaire.create') }}" class="btn btn-primary">Modifier un salaire</a>
    </div>

  </div>
<div class="card mb-4">
  <div class="card-header">
    <h5 class="card-title mb-0">Historique Salaire</h5>
  </div>
  <div class="table-responsive text-nowrap">
    <table class="table table-sm">
      <thead>
        <tr>
          <th>ID</th>
          <th>Employé</th>
          <th>Date de Changement</th>
          <th>Nouveau Salaire</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($historiques as $historique)
        <tr>
          <td>{{ $historique->IDHistoriqueSalaire }}</td>
          <td>{{ $historique->employe->Nom }} {{ $historique->employe->Prenom }}</td>
          <td>{{ $historique->DateChangementSalaire }}</td>
          <td>{{ $historique->NouveauSalaire }}</td>
          <td>
            <a href="{{ route('historiquesalaire.edit', $historique->IDHistoriqueSalaire) }}" class="btn btn-sm btn-primary">Edit</a>
            <form action="{{ route('historiquesalaire.destroy', $historique->IDHistoriqueSalaire) }}" method="POST" style="display:inline;">
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
