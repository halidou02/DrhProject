@extends('layouts/layoutMaster')

@section('title', 'eCommerce Dashboard - Apps')

@section('vendor-style')
<link rel="stylesheet" href="{{asset('assets/vendor/libs/apex-charts/apex-charts.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css')}}" />
@endsection

@section('vendor-script')
<script src="{{asset('assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
<script src="{{asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>
@endsection

@section('page-script')
<script src="{{asset('assets/js/app-ecommerce-dashboard.js')}}"></script>
@endsection

@section('content')
<div class="row">
  <!-- View sales -->
  <div class="col-xl-4 mb-4 col-lg-5 col-12">
    <div class="card">
      <div class="d-flex align-items-end row">
        <div class="col-7">
          <div class="card-body text-nowrap">
            <h5 class="card-title mb-0">Effectif total de l&#39;entreprise.</h5>
            <p class="mb-2">Nom entreprise</p>
            <h4 class="text-primary mb-1">{{ $effectifTotal }} Employes</h4>
            <a href="{{ route('employe.index')}}" class="btn btn-primary">Liste des employes</a>
          </div>
        </div>
        <div class="col-5 text-center text-sm-left">
          <div class="card-body pb-0 px-0 px-md-4">
            <img src="{{ asset('assets/img/illustrations/card-advance-sale.png')}}" height="140" alt="view sales">
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- View sales -->

  <!-- Statistics -->
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
                <h5 class="mb-0">{{$TotalDepartement}}</h5>
                <small>Departement</small>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-6">
            <div class="d-flex align-items-center">
              <div class="badge rounded-pill bg-label-info me-3 p-2"><i class="ti ti-users ti-sm"></i></div>
              <div class="card-info">
                <h5 class="mb-0">8.549k</h5>
                <small>Customers</small>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-6">
            <div class="d-flex align-items-center">
              <div class="badge rounded-pill bg-label-danger me-3 p-2"><i class="ti ti-shopping-cart ti-sm"></i></div>
              <div class="card-info">
                <h5 class="mb-0">1.423k</h5>
                <small>Products</small>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-6">
            <div class="d-flex align-items-center">
              <div class="badge rounded-pill bg-label-success me-3 p-2"><i class="ti ti-currency-dollar ti-sm"></i></div>
              <div class="card-info">
                <h5 class="mb-0">{{$coutTotal}}DA</h5>
                <small>Main d'oeuvre</small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--/ Statistics -->
  <div class="row">
  <div class="col-xl-4 mb-4 col-lg-4 col-12">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between">
          <div class="d-flex flex-column">
            <div class="card-title mb-auto">
              <h5 class="mb-1 text-nowrap">Répartition par genre</h5>
            </div>
            <div class="chart-statistics">
              <canvas id="repartitionGenreChart"></canvas>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-4 mb-4 col-lg-4 col-12">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between">
          <div class="d-flex flex-column">
            <div class="card-title mb-auto">
              <h5 class="mb-1 text-nowrap">Répartition par Departement</h5>
            </div>
            <div class="chart-statistics">
              <canvas id="repartitionDepartementChart"></canvas>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-4 mb-4 col-lg-4 col-12">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between">
          <div class="d-flex flex-column">
            <div class="card-title mb-auto">
              <h5 class="mb-1 text-nowrap">Répartition par Age</h5>
            </div>
            <div class="chart-statistics">
              <canvas id="repartitionAgeChart"></canvas>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>







  <!-- Invoice table -->
  <div class="row">
    <div class="card">
      <div class="table-responsive card-datatable">
        <table class="table datatable-invoice border-top">
          <thead>
            <tr>
              <th></th>
              <th>ID</th>
              <th><i class='ti ti-trending-up text-secondary'></i></th>
              <th>Total</th>
              <th>Issued Date</th>
              <th>Invoice Status</th>
              <th>Actions</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>
  <!-- /Invoice table -->
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<style>
        .card {
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }
        .card-title h5 {
            font-weight: bold;
            color: #333;
        }
        .chart-statistics {
            text-align: center;
        }
    </style>
<script>
document.addEventListener("DOMContentLoaded", function() {
            var genreCtx = document.getElementById('repartitionGenreChart').getContext('2d');
            var repartitionGenreData = @json($repartitionGenre);

            var genreLabels = repartitionGenreData.map(function(item) {
                return item.Genre;
            });

            var genreData = repartitionGenreData.map(function(item) {
                return item.count;
            });

            new Chart(genreCtx, {
                type: 'bar',
                data: {
                    labels: genreLabels,
                    datasets: [{
                        label: 'Nombre d\'employés',
                        data: genreData,
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1,
                        borderRadius: 5
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            backgroundColor: 'rgba(0, 0, 0, 0.7)',
                            titleColor: '#fff',
                            bodyColor: '#fff'
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                color: '#333'
                            },
                            grid: {
                                color: 'rgba(0, 0, 0, 0.1)'
                            }
                        },
                        x: {
                            ticks: {
                                color: '#333'
                            },
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            });

            // Répartition par âge
            var ageCtx = document.getElementById('repartitionAgeChart').getContext('2d');
            var repartitionAgeData = @json($repartitionAge);

            var ageLabels = repartitionAgeData.map(function(item) {
                return item.age;
            });

            var ageData = repartitionAgeData.map(function(item) {
                return item.count;
            });

            new Chart(ageCtx, {
                type: 'bar',
                data: {
                    labels: ageLabels,
                    datasets: [{
                        label: 'Nombre d\'employés',
                        data: ageData,
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1,
                        borderRadius: 5
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            backgroundColor: 'rgba(0, 0, 0, 0.7)',
                            titleColor: '#fff',
                            bodyColor: '#fff'
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                color: '#333'
                            },
                            grid: {
                                color: 'rgba(0, 0, 0, 0.1)'
                            }
                        },
                        x: {
                            ticks: {
                                color: '#333'
                            },
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            });

            // Répartition par département
            var departementCtx = document.getElementById('repartitionDepartementChart').getContext('2d');
            var repartitionDepartementData = @json($repartitionDepartement);

            var departementLabels = repartitionDepartementData.map(function(item) {
                return item.NomDepartement;
            });

            var departementData = repartitionDepartementData.map(function(item) {
                return item.employes_count;
            });

            new Chart(departementCtx, {
                type: 'bar',
                data: {
                    labels: departementLabels,
                    datasets: [{
                        label: 'Nombre d\'employés',
                        data: departementData,
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1,
                        borderRadius: 5
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            backgroundColor: 'rgba(0, 0, 0, 0.7)',
                            titleColor: '#fff',
                            bodyColor: '#fff'
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                color: '#333'
                            },
                            grid: {
                                color: 'rgba(0, 0, 0, 0.1)'
                            }
                        },
                        x: {
                            ticks: {
                                color: '#333',
                                maxRotation: 0,
                                minRotation: 0
                            },
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            });
        });
</script>
@endsection
