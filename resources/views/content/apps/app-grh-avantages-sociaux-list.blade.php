@extends('layouts/layoutMaster')

@section('title', 'grh Avantages Sociaux List - Apps')

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
<h4 class="py-3 mb-4">
  <span class="text-muted fw-light">Avantages Sociaux /</span> Liste
</h4>

<!-- Avantages Sociaux List Table -->
<div class="container">
    <div class="row">
        <!-- Avantages Sociaux Table -->
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Avantages Sociaux</h5>
                </div>
                <div class="table-responsive text-nowrap">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nom</th>
                                <th>Description</th>
                                <th>Employé</th>
                                <th>Prime</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($avantages_sociaux as $avantage)
                            <tr>
                                <td>{{ $avantage->IDAvantageSocial }}</td>
                                <td>{{ $avantage->NomAvantageSocial }}</td>
                                <td>{{ $avantage->DescriptionAvantageSocial }}</td>
                                <td>{{ $avantage->employe->Nom }} {{ $avantage->employe->Prenom }}</td>
                                <td>{{ $avantage->prime }}</td>
                                <td>
                                    <a href="{{ route('avantages_sociaux.edit', $avantage->IDAvantageSocial) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('avantages_sociaux.destroy', $avantage->IDAvantageSocial) }}" method="POST" style="display:inline;">
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
