@extends('layouts/layoutMaster')

@section('title', 'grh Congé List - Apps')

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
  <span class="text-muted fw-light">Congé /</span>Liste
</h4>

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Congés</h5>
                </div>
                <div class="table-responsive text-nowrap">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Employé</th>
                                <th>Type</th>
                                <th>Date de Début</th>
                                <th>Date de Fin</th>
                                <th>Statut</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($conges as $conge)
                            <tr>
                                <td>{{ $conge->IDConge }}</td>
                                <td>{{ $conge->employe->Nom }} {{ $conge->employe->Prenom }}</td>
                                <td>{{ $conge->Type }}</td>
                                <td>{{ $conge->dateDebutConge }}</td>
                                <td>{{ $conge->dateFinConge }}</td>
                                <td>{{ $conge->StatutConge }}</td>
                                <td>
                                    @if($conge->StatutConge == 'en attente')
                                        <form action="{{ route('conge.approve', $conge->IDConge) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-sm btn-success">Approuver</button>
                                        </form>
                                        <form action="{{ route('conge.reject', $conge->IDConge) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-sm btn-warning">Rejeter</button>
                                        </form>
                                    @endif
                                    @if($conge->StatutConge != 'annulé')
                                        <form action="{{ route('conge.cancel', $conge->IDConge) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-sm btn-danger">Annuler</button>
                                        </form>
                                    @endif
                                    <a href="{{ route('conge.edit', $conge->IDConge) }}" class="btn btn-sm btn-primary">Éditer</a>
                                    <form action="{{ route('conge.destroy', $conge->IDConge) }}" method="POST" style="display:inline;">
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
        </div>
    </div>
</div>
@endsection
