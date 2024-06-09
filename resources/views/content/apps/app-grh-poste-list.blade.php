@extends('layouts/layoutMaster')

@section('title', 'GRH Poste List - Apps')

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
      <h4 class="mb-1 mt-3">Liste des postes</h4>

    </div>
    <div class="d-flex align-content-center flex-wrap gap-3">
        <a href="{{ route('poste.create') }}" class="btn btn-primary">Créer un poste</a>
    </div>
</div>

<!-- Poste List Table -->
<div class="container">
    <div class="row">
        <!-- Poste Table -->
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Postes</h5>
                </div>
                <div class="table-responsive text-nowrap">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Titre</th>
                                <th>Salaire de Base</th>
                                <th>Description</th>
                                <th>Département</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($postes as $poste)
                            <tr>
                                <td>{{ $poste->IDPoste }}</td>
                                <td>{{ $poste->TitrePoste }}</td>
                                <td>{{ $poste->SalaireDeBase }}</td>
                                <td>{{ $poste->Description }}</td>
                                <td>{{ $poste->departement->NomDepartement ?? 'N/A' }}</td>
                                <td>
                                    <a href="{{ route('poste.edit', $poste->IDPoste) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('poste.destroy', $poste->IDPoste) }}" method="POST" style="display:inline;">
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
