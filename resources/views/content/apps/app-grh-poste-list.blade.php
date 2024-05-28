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
<h4 class="py-3 mb-4">
  <span class="text-muted fw-light">Poste /</span> List
</h4>

<!-- Poste List Table -->
<div class="container">
    <div class="row">
        <!-- Poste Table -->
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Poste</h5>
                </div>
                <div class="table-responsive text-nowrap">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Titre Poste</th>
                                <th>Description</th>
                                <th>Salaire de Base</th>
                                <th>Département</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($postes as $poste)
                            <tr>
                                <td>{{ $poste->IDPoste }}</td>
                                <td>{{ $poste->TitrePoste }}</td>
                                <td>{{ $poste->Description }}</td>
                                <td>{{ $poste->SalaireDeBase }}</td>
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
