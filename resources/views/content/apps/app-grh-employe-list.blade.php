@extends('layouts/layoutMaster')

@section('title', 'grh Employe List - Apps')

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


<!-- Product List Widget

<div class="card mb-4">
  <div class="card-widget-separator-wrapper">
    <div class="card-body card-widget-separator">
      <div class="row gy-4 gy-sm-1">
        <div class="col-sm-6 col-lg-3">
          <div class="d-flex justify-content-between align-items-start card-widget-1 border-end pb-3 pb-sm-0">
            <div>
              <h6 class="mb-2">In-store Sales</h6>
              <h4 class="mb-2">$5,345.43</h4>
              <p class="mb-0"><span class="text-muted me-2">5k orders</span><span class="badge bg-label-success">+5.7%</span></p>
            </div>
            <span class="avatar me-sm-4">
              <span class="avatar-initial bg-label-secondary rounded"><i class="ti-md ti ti-smart-home text-body"></i></span>
            </span>
          </div>
          <hr class="d-none d-sm-block d-lg-none me-4">
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="d-flex justify-content-between align-items-start card-widget-2 border-end pb-3 pb-sm-0">
            <div>
              <h6 class="mb-2">Website Sales</h6>
              <h4 class="mb-2">$674,347.12</h4>
              <p class="mb-0"><span class="text-muted me-2">21k orders</span><span class="badge bg-label-success">+12.4%</span></p>
            </div>
            <span class="avatar p-2 me-lg-4">
              <span class="avatar-initial bg-label-secondary rounded"><i class="ti-md ti ti-device-laptop text-body"></i></span>
            </span>
          </div>
          <hr class="d-none d-sm-block d-lg-none">
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="d-flex justify-content-between align-items-start border-end pb-3 pb-sm-0 card-widget-3">
            <div>
              <h6 class="mb-2">Discount</h6>
              <h4 class="mb-2">$14,235.12</h4>
              <p class="mb-0 text-muted">6k orders</p>
            </div>
            <span class="avatar p-2 me-sm-4">
              <span class="avatar-initial bg-label-secondary rounded"><i class="ti-md ti ti-gift text-body"></i></span>
            </span>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3">
          <div class="d-flex justify-content-between align-items-start">
            <div>
              <h6 class="mb-2">Affiliate</h6>
              <h4 class="mb-2">$8,345.23</h4>
              <p class="mb-0"><span class="text-muted me-2">150 orders</span><span class="badge bg-label-danger">-3.5%</span></p>
            </div>
            <span class="avatar p-2">
              <span class="avatar-initial bg-label-secondary rounded"><i class="ti-md ti ti-wallet text-body"></i></span>
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> -->
<div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-3">

    <div class="d-flex flex-column justify-content-center">
      <h4 class="mb-1 mt-3">Liste des Employes</h4>

    </div>
    <div class="d-flex align-content-center flex-wrap gap-3">
        <a href="{{ route('employe.create') }}" class="btn btn-primary">Ajouter un employé</a>
    </div>

  </div>
<!-- Product List Table -->

    <div class="row">
        <!-- Employe Table -->
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Employe</h5>
                </div>
                <div class="table-responsive text-nowrap">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th>Date de Naissance</th>
                                <th>Genre</th>
                                <th>Adresse</th>
                                <th>Numéro de Téléphone</th>
                                <th>Email</th>
                                <th>Date d'Incorporation</th>
                                <th>Salaire de Base</th>
                                <th>Statut</th>
                                <th>État Civil</th>
                                <th>Photo</th>
                                <th>Département</th>
                                <th>Poste</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employes as $employe)
                            <tr>
                                <td>{{ $employe->IDEmploye }}</td>
                                <td>{{ $employe->Nom }}</td>
                                <td>{{ $employe->Prenom }}</td>
                                <td>{{ $employe->DateNaissance }}</td>
                                <td>{{ $employe->Genre }}</td>
                                <td>{{ $employe->Adresse }}</td>
                                <td>{{ $employe->NumeroTelephone }}</td>
                                <td>{{ $employe->Email }}</td>
                                <td>{{ $employe->DateIncorporation }}</td>
                                <td>{{ $employe->SalairedeBase }}</td>
                                <td>{{ $employe->Statut }}</td>
                                <td>{{ $employe->EtatCivil }}</td>
                                <td>
                                    @if ($employe->Photo)
                                        <img src="{{ asset($employe->Photo) }}" alt="Photo" width="50">
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td>{{ $employe->departement->NomDepartement ?? 'N/A' }}</td>
                                <td>{{ $employe->poste->TitrePoste ?? 'N/A' }}</td>
                                <td>
                                <a href="{{ route('employe.edit', $employe->IDEmploye) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('employe.destroy', $employe->IDEmploye) }}" method="POST" style="display:inline;">
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


@endsection
