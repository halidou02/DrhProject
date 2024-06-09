@extends('layouts/layoutMaster')

@section('title', 'Liste des Évaluations de Performance - Apps')

@section('vendor-style')
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
@endsection

@section('vendor-script')
<script src="{{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
@endsection

@section('page-script')
<script src="{{ asset('assets/js/app-ecommerce-product-list.js') }}"></script>
@endsection

@section('content')
<div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3">

    <div class="d-flex flex-column justify-content-center">
      <h4 class="mb-1 mt-3">Evaluation</h4>

    </div>
    <div class="d-flex align-content-center flex-wrap gap-3">
        <a href="{{ route('evaluation.create') }}" class="btn btn-primary">Faire une Evaluation</a>
    </div>

  </div>

<div class="card mb-4">
  <div class="table-responsive text-nowrap">
    <table class="table table-sm">
      <thead>
        <tr>
          <th>ID</th>
          <th>Employé</th>
          <th>Département</th>
          <th>Date d'Évaluation</th>
          <th>Résultat</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($evaluations as $evaluation)
        <tr>
          <td>{{ $evaluation->IDEvaPerform }}</td>
          <td>{{ $evaluation->employe->Nom }}</td>
          <td>{{ $evaluation->Departement}}</td>
          <td>{{ $evaluation->DateEvaluat }}</td>
          <td>{{ $evaluation->ResultEvaluat }}</td>
          <td>
            <a href="{{ route('evaluation.edit', $evaluation->IDEvaPerform) }}" class="btn btn-sm btn-primary">Modifier</a>
            <form action="{{ route('evaluation.destroy', $evaluation->IDEvaPerform) }}" method="POST" style="display:inline;">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
