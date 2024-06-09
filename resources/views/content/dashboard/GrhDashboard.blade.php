@extends('layouts.layoutMaster')

@section('title', 'Tableau de Bord RH')

@section('vendor-style')
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/flatpickr/flatpickr.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}" />
@endsection

@section('vendor-script')
<script src="{{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/moment/moment.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

@endsection

@section('page-script')
<script src="{{ asset('assets/js/tables-datatables-advanced.js') }}"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap5.min.js"></script>
<script src="{{ asset('assets/js/app-rh-dashboard.js') }}"></script> <!-- Inclusion du script externe -->
<script src="{{asset('assets/js/charts-chartjs.js')}}"></script>
<script>
    const laborCostData = @json($laborCostData);
    const laborRotationData = @json($laborRotationData);
    const absenteeismData = @json($absenteeismData);
</script>
<script>

const bestDepartments = @json($bestDepartments);
    document.addEventListener('DOMContentLoaded', function () {
        // Initialiser le graphique linéaire
        var options = {
            series: [{
                name: 'Score Moyen',
                data: bestDepartments.map(department => department.avg_score)
            }],
            chart: {
                height: 350,
                type: 'area',
                zoom: {
                    enabled: false
                },
                toolbar: {
                    show: true
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth'
            },
            fill: {
                type: 'gradient',
                gradient: {
                    shadeIntensity: 1,
                    inverseColors: false,
                    opacityFrom: 0.7,
                    opacityTo: 0.3,
                    stops: [0, 90, 100]
                },
            },
            colors: bestDepartments.map(department => {
                const score = department.avg_score;
                if (score >= 8) {
                    return '#00E396'; // Vert pour les notes élevées
                } else if (score >= 5) {
                    return '#FEB019'; // Jaune pour les notes moyennes
                } else {
                    return '#FF4560'; // Rouge pour les notes basses
                }
            }),
            title: {
                text: 'Départements ayant les meilleurs scores aux évaluations mensuelles',
                align: 'left',
                style: {
                    fontSize: '16px',
                    fontWeight: 'bold',
                    color: '#263238'
                }
            },
            grid: {
                borderColor: '#e7e7e7',
                row: {
                    colors: ['#f3f3f3', 'transparent'], // Alternating background color
                    opacity: 0.5
                },
            },
            markers: {
                size: 5
            },
            xaxis: {
                categories: bestDepartments.map(department => department.Departement),
                title: {
                    text: 'Département'
                }
            },
            yaxis: {
                title: {
                    text: 'Score Moyen'
                },
                min: 0,
                max: 10
            },
            legend: {
                position: 'top',
                horizontalAlign: 'right',
                floating: true,
                offsetY: -25,
                offsetX: -5
            }
        };

        var chart = new ApexCharts(document.querySelector("#bestDepartmentsLineChart"), options);
        chart.render();
    });

</script>

<script src="{{asset('assets/js/charts-apex.js')}}"></script>
@endsection

@section('content')
<div class="row">
  <div class="col-xl-4 mb-4 col-lg-5 col-12">
    <div class="card">
      <div class="d-flex align-items-end row">
        <div class="col-7">
          <div class="card-body text-nowrap">
            <h5 class="card-title mb-0">Effectif total de l'entreprise</h5>
            <p class="mb-2">Nom entreprise</p>
            <h4 class="text-primary mb-1">{{ $effectifTotal }} Employés</h4>
            <a href="{{ route('employe.index') }}" class="btn btn-primary">Liste des employés</a>
          </div>
        </div>
        <div class="col-5 text-center text-sm-left">
          <div class="card-body pb-0 px-0 px-md-4">
            <img src="{{ asset('assets/img/illustrations/card-advance-sale.png') }}" height="140" alt="view sales">
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-8 mb-4 col-lg-7 col-12">
    <div class="card h-100">
      <div class="card-header">
        <div class="d-flex justify-content-between mb-3">
          <h5 class="card-title mb-0">Statistique</h5>
          <small class="text-muted">Updated 1 month ago</small>
        </div>
      </div>
      <div class="card-body">
        <div class="row gy-3">
          <div class="col-md-3 col-6">
            <div class="d-flex align-items-center">
              <div class="badge rounded-pill bg-label-primary me-3 p-2"><i class="ti ti-chart-pie-2 ti-sm"></i></div>
              <div class="card-info">
                <h5 class="mb-0">{{ $TotalDepartement }}</h5>
                <small>Département</small>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-6">
            <div class="d-flex align-items-center">
              <div class="badge rounded-pill bg-label-info me-3 p-2"><i class="ti ti-users ti-sm"></i></div>
              <div class="card-info">
                <h5 class="mb-0">{{ $rotationPersonnel }}</h5>
                <small>Rotation</small>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-6">
            <div class="d-flex align-items-center">
              <div class="badge rounded-pill bg-label-danger me-3 p-2"><i class="ti ti-calendar ti-sm"></i></div>
              <div class="card-info">
                <h5 class="mb-0">{{ $tauxAbsenteisme }}</h5>
                <small>Absentéisme</small>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-6">
            <div class="d-flex align-items-center">
              <div class="badge rounded-pill bg-label-success me-3 p-2"><i class="ti ti-currency-dollar ti-sm"></i></div>
              <div class="card-info">
                <h5 class="mb-0">{{ $coutTotal }}</h5>
                <small>Main d'œuvre</small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Répartition des graphiques sur la même ligne 1er ligne -->
  <div class="row">

    <!-- Départements ayant les meilleurs scores aux évaluations mensuelles -->
    <div class="row">
  <div class="col-lg-6 col-12 mb-4">
    <div class="card">
      <div class="card-header d-flex justify-content-between">
        <div>
          <h5 class="card-title mb-0">Départements ayant les meilleurs scores aux évaluations mensuelles</h5>
          <small class="text-muted">Scores mensuels</small>
        </div>
        <form method="GET" action="{{ route('dashboard.index') }}">
          <div class="row">
            <div class="col-md-4">
              <input type="number" name="year" class="form-control" placeholder="Year" value="{{ $selectedYear }}">
            </div>
            <div class="col-md-4">
              <select name="month" class="form-control">
                @for ($i = 1; $i <= 12; $i++)
                  <option value="{{ $i }}" {{ $i == $selectedMonth ? 'selected' : '' }}>{{ $i }}</option>
                @endfor
              </select>
            </div>
            <div class="col-md-4">
              <button type="submit" class="btn btn-primary">Filtrer</button>
            </div>
          </div>
        </form>
      </div>
      <div class="card-body">
        <div id="bestDepartmentsLineChart"></div>
      </div>
    </div>
  </div>

  <div class="col-lg-6 col-12 mb-4">
    <div class="card">
      <div class="card-header header-elements">
        <h5 class="card-title mb-0">Rotation du personnel</h5>
        <div class="card-header-elements ms-auto py-0 dropdown">
          <button type="button" class="btn dropdown-toggle hide-arrow p-0" id="labor-rotation-chart-dd" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="ti ti-dots-vertical"></i>
          </button>
          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="labor-rotation-chart-dd">
            <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
            <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
            <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <canvas id="laborRotationPieChart" class="chartjs" data-height="337"></canvas>
      </div>
    </div>
  </div>
</div>




</div>


  <!-- Répartition des graphiques sur la même ligne -->
  <div class="row">
    <div class="col-lg-4 col-md-6 col-12 mb-4">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-md-center align-items-start">
          <h5 class="card-title mb-0">Répartition par genre</h5>
        </div>
        <div class="card-body">
          <div id="repartitionGenreChart"></div>
          <div id="repartitionGenreData" style="display: none;">@json($repartitionGenre)</div>
        </div>
      </div>
    </div>

    <div class="col-lg-4 col-md-6 col-12 mb-4">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-md-center align-items-start">
          <h5 class="card-title mb-0">Répartition par Département</h5>
        </div>
        <div class="card-body">
          <div id="repartitionDepartementChart"></div>
          <div id="repartitionDepartementData" style="display: none;">@json($repartitionDepartement)</div>
        </div>
      </div>
    </div>

    <div class="col-lg-4 col-md-6 col-12 mb-4">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-md-center align-items-start">
          <h5 class="card-title mb-0">Répartition par Age</h5>
        </div>
        <div class="card-body">
          <div id="repartitionAgeChart"></div>
          <div id="repartitionAgeData" style="display: none;">@json($repartitionAge)</div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Column Search -->
<div class="card">
  <h5 class="card-header">Recherche par employé</h5>
  <div class="card-datatable text-nowrap">
    <table class="dt-column-search table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nom</th>
          <th>Prénom</th>
          <th>Âge</th>
          <th>Genre</th>
          <th>Département</th>
          <th>Poste</th>
          <th>Statut</th>
        </tr>
        <tr>
          <th><input type="text" class="form-control" placeholder="Search ID" /></th>
          <th><input type="text" class="form-control" placeholder="Search Nom" /></th>
          <th><input type="text" class="form-control" placeholder="Search Prénom" /></th>
          <th><input type="text" class="form-control" placeholder="Search Âge" /></th>
          <th><input type="text" class="form-control" placeholder="Search Genre" /></th>
          <th><input type="text" class="form-control" placeholder="Search Département" /></th>
          <th><input type="text" class="form-control" placeholder="Search Poste" /></th>
          <th><input type="text" class="form-control" placeholder="Search Statut" /></th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @foreach($employes as $employe)
        <tr>
          <td>{{ $employe->IDEmploye }}</td>
          <td>{{ $employe->Nom }}</td>
          <td>{{ $employe->Prenom }}</td>
          <td>{{ \Carbon\Carbon::parse($employe->DateNaissance)->age }}</td>
          <td>{{ $employe->Genre }}</td>
          <td>{{ $employe->departement->NomDepartement }}</td>
          <td>{{ $employe->poste->TitrePoste }}</td>
          <td>
            @if ($employe->Statut == 'Actif')
              <span class="badge bg-label-primary me-1">{{ $employe->Statut }}</span>
            @elseif ($employe->Statut == 'En congé')
              <span class="badge bg-label-warning me-1">{{ $employe->Statut }}</span>
            @else
              <span class="badge bg-label-danger me-1">{{ $employe->Statut }}</span>
            @endif
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
<!--/ Column Search -->

<!-- Modale pour afficher les employés -->
<div class="modal fade" id="employesModal" tabindex="-1" aria-labelledby="employesModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="employesModalLabel">Employés concernés</h5>
        <div class="ms-auto" id="totalMainDoeuvreContainer" style="font-weight: bold;">
          Total main d'œuvre: <span id="totalMainDoeuvre"></span> DA
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Âge</th>
                <th>Genre</th>
                <th>Département</th>
                <th>Poste</th>
                <th>Main d'œuvre (Salaire de base)</th>
                <th>Statut</th>
              </tr>
            </thead>
            <tbody id="employesModalBody">
              <!-- Les employés seront chargés ici dynamiquement -->
            </tbody>
          </table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- /Modale -->
@endsection
