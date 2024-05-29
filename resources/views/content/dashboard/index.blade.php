@extends('layouts.layoutMaster')

@section('title', 'HR Dashboard - Apps')

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
    <!-- Statistics Cards -->
    <div class="col-md-4 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Effectif Total</h5>
                <h3>{{ $effectifTotal }}</h3>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Rotation du Personnel</h5>
                <h3>{{ $rotationPersonnel }}%</h3>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Taux d'Absentéisme</h5>
                <h3>{{ $tauxAbsenteisme }}%</h3>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Coût Total de la Main-d'œuvre</h5>
                <h3>{{ $coutTotal }}</h3>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Durée Moyenne de Recrutement</h5>
                <h3>{{ $dureeRecrutement }} jours</h3>
            </div>
        </div>
    </div>

    <!-- Graphs -->
    <div class="col-md-6 mb-4">
        <div class="card">
            <div class="card-header">Répartition par Genre</div>
            <div class="card-body">
                <canvas id="repartitionGenre"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="card">
            <div class="card-header">Répartition par Âge</div>
            <div class="card-body">
                <canvas id="repartitionAge"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-12 mb-4">
        <div class="card">
            <div class="card-header">Répartition par Département</div>
            <div class="card-body">
                <canvas id="repartitionDepartement"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="card">
            <div class="card-header">Répartition des Coûts de Main-d'œuvre</div>
            <div class="card-body">
                <canvas id="repartitionCouts"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="card">
            <div class="card-header">Processus de Recrutement</div>
            <div class="card-body">
                <canvas id="recruitmentProcess"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-12 mb-4">
        <div class="card">
            <div class="card-header">Évolution des Indicateurs</div>
            <div class="card-body">
                <canvas id="evolutionIndicateurs"></canvas>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Répartition par Genre
    var ctxGenre = document.getElementById('repartitionGenre').getContext('2d');
    var repartitionGenre = @json($repartitionGenre);
    new Chart(ctxGenre, {
        type: 'bar',
        data: {
            labels: repartitionGenre.map(item => item.Genre),
            datasets: [{
                label: 'Genre',
                data: repartitionGenre.map(item => item.count),
                backgroundColor: ['#007bff', '#dc3545', '#ffc107']
            }]
        }
    });

    // Répartition par Âge
    var ctxAge = document.getElementById('repartitionAge').getContext('2d');
    var repartitionAge = @json($repartitionAge);
    new Chart(ctxAge, {
        type: 'bar',
        data: {
            labels: repartitionAge.map(item => item.age),
            datasets: [{
                label: 'Nombre d\'employés',
                data: repartitionAge.map(item => item.count),
                backgroundColor: '#28a745'
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Répartition par Département
    var ctxDepartement = document.getElementById('repartitionDepartement').getContext('2d');
    var repartitionDepartement = @json($repartitionDepartement);
    new Chart(ctxDepartement, {
        type: 'bar',
        data: {
            labels: repartitionDepartement.map(item => item.NomDepartement),
            datasets: [{
                label: 'Nombre d\'employés',
                data: repartitionDepartement.map(item => item.employes_count),
                backgroundColor: '#17a2b8'
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Répartition des Coûts de Main-d'œuvre
    var ctxCouts = document.getElementById('repartitionCouts').getContext('2d');
    var coutsData = {
        labels: ['Salaires Bruts', 'Cotisations Sociales', 'Avantages Sociaux', 'Autres Coûts'],
        datasets: [{
            data: [100000, 20000, 15000, 10000], // Exemple de données
            backgroundColor: ['#007bff', '#dc3545', '#ffc107', '#28a745']
        }]
    };
    new Chart(ctxCouts, {
        type: 'pie',
        data: coutsData
    });

    // Processus de Recrutement
    var ctxRecruitment = document.getElementById('recruitmentProcess').getContext('2d');
    var recruitmentProcess = @json($recruitmentProcess);
    new Chart(ctxRecruitment, {
        type: 'bar',
        data: {
            labels: Object.keys(recruitmentProcess),
            datasets: [{
                label: 'Nombre de Candidats',
                data: Object.values(recruitmentProcess),
                backgroundColor: '#17a2b8'
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Évolution des Indicateurs (exemple fictif)
    var ctxEvolution = document.getElementById('evolutionIndicateurs').getContext('2d');
    var evolutionData = {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
        datasets: [{
            label: 'Effectif Total',
            data: [150, 160, 170, 165, 180],
            borderColor: '#007bff',
            fill: false
        }, {
            label: 'Taux d\'Absentéisme',
            data: [5, 4, 6, 5, 7],
            borderColor: '#dc3545',
            fill: false
        }]
    };
    new Chart(ctxEvolution, {
        type: 'line',
        data: evolutionData,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });</script>

@endsection
