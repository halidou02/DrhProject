@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Tableau de Bord des Ressources Humaines</h1>
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">Effectif Total</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $effectifTotal }}</h5>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">Rotation du Personnel</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $rotationPersonnel }}%</h5>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-danger mb-3">
                <div class="card-header">Taux d'Absentéisme</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $tauxAbsenteisme }}%</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card text-white bg-info mb-3">
                <div class="card-header">Coût Total de la Main-d'œuvre</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $coutTotal }}</h5>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-secondary mb-3">
                <div class="card-header">Durée Moyenne de Recrutement</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $dureeRecrutement }} jours</h5>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Répartition par Genre</div>
                <div class="card-body">
                    <canvas id="repartitionGenre"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Répartition par Âge</div>
                <div class="card-body">
                    <canvas id="repartitionAge"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Répartition par Département</div>
                <div class="card-body">
                    <canvas id="repartitionDepartement"></canvas>
                </div>
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
        type: 'pie',
        data: {
            labels: repartitionGenre.map(item => item.Genre),
            datasets: [{
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
</script>
@endsection
