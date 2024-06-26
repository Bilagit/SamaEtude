@extends('layouts.sidebare')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .custom-card {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100px;
            margin-bottom: 1rem;
        }

        .custom-icon {
            font-size: 25px;
            background-color: #f0f0f0;
            border-radius: 50%;
            padding: 0.5rem;
            margin-bottom: 0.5rem;
        }

        .bg-purple {
            background-color: #e0b3ff !important;
        }

        .bg-light-green {
            background-color: #b3ffb3 !important;
        }

        .bg-light-yellow {
            background-color: #ffffb3 !important;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
            <main>
            <div class="row">
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif
                <!-- AdminHeader component content here -->
                <div class="pt-3 pb-2 mb-3 border-bottom">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card custom-card bg-purple shadow-sm">
                                <div class="card-body text-center">
                                    <h5 class="card-title">Nombre d'étudiants</h5>
                                    <p class="card-text">{{ $studentsCount }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card custom-card bg-light-green shadow-sm">
                                <div class="card-body text-center">
                                    <h5 class="card-title">Nombre de Professeurs</h5>
                                    <p class="card-text">{{ $professorsCount }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card custom-card bg-light-yellow shadow-sm">
                                <div class="card-body text-center">
                                    <h5 class="card-title">Nombre de visiteurs</h5>
                                    <p class="card-text">100</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <div class="card shadow-sm">
                                <div class="card-body">
                                    <canvas id="userChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-3">
                            <div class="card shadow-sm">
                                <div class="card-body text-center">
                                    <h5 class="card-title">Sessions</h5>
                                    <i class="fas fa-plug custom-icon"></i>
                                    <p class="card-text font-weight-bold">{{17}}</p>
                                    <p class="text-success">100%</p>
                                    <p class="small text-muted">par rapport au dernier mois</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card shadow-sm">
                                <div class="card-body text-center">
                                    <h5 class="card-title">Vues de la page</h5>
                                    <i class="fas fa-eye custom-icon"></i>
                                    <p class="card-text font-weight-bold">190</p>
                                    <p class="text-success">90%</p>
                                    <p class="small text-muted">par rapport au dernier mois</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card shadow-sm">
                                <div class="card-body text-center">
                                    <h5 class="card-title">Nouveaux vs retours visiteurs</h5>
                                    <canvas id="newVsReturningChart"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card shadow-sm">
                                <div class="card-body text-center">
                                    <h5 class="card-title">Taux d'acceptation</h5>
                                    <canvas id="acceptanceRateChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script>
        // Données pour le diagramme "Nombre d'utilisateurs"
        const userData = {
            labels: ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'],
            datasets: [{
                label: 'Nombre d\'utilisateurs',
                data: [12, 19, 3, 5, 2, 3, 9], // Remplacez par vos données réelles
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        };

        // Options pour le diagramme "Nombre d'utilisateurs"
        const userOptions = {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        };

        // Création du diagramme "Nombre d'utilisateurs"
        const userChartCanvas = document.getElementById('userChart').getContext('2d');
        const userChart = new Chart(userChartCanvas, {
            type: 'line',
            data: userData,
            options: userOptions
        });

        // Données pour le diagramme "Nouveaux vs retours visiteurs"
        const newVsReturningData = {
            labels: ['Nouveaux visiteurs', 'Retours visiteurs'],
            datasets: [{
                label: 'Nouveaux vs retours visiteurs',
                data: [70, 30], // Remplacez par vos données réelles
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)'
                ],
                borderWidth: 1
            }]
        };

        // Options pour le diagramme "Nouveaux vs retours visiteurs"
        const newVsReturningOptions = {
            plugins: {
                legend: {
                    position: 'bottom',
                }
            }
        };

        // Création du diagramme "Nouveaux vs retours visiteurs"
        const newVsReturningChartCanvas = document.getElementById('newVsReturningChart').getContext('2d');
        const newVsReturningChart = new Chart(newVsReturningChartCanvas, {
            type: 'doughnut',
            data: newVsReturningData,
            options: newVsReturningOptions
        });

        // Données pour le diagramme "Taux d'acceptation"
        const acceptanceRateData = {
            labels: ['Acceptés', 'Rejetés'],
            datasets: [{
                label: 'Taux d\'acceptation',
                data: [80, 20], // Remplacez par vos données réelles
                backgroundColor: [
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(255, 99, 132, 0.2)'
                ],
                borderColor: [
                    'rgba(75, 192, 192, 1)',
                    'rgba(255, 99, 132, 1)'
                ],
                borderWidth: 1
            }]
        };

        // Options pour le diagramme "Taux d'acceptation"
        const acceptanceRateOptions = {
            plugins: {
                legend: {
                    position: 'bottom',
                }
            }
        };

        // Création du diagramme "Taux d'acceptation"
        const acceptanceRateChartCanvas = document.getElementById('acceptanceRateChart').getContext('2d');
        const acceptanceRateChart = new Chart(acceptanceRateChartCanvas, {
            type: 'doughnut',
            data: acceptanceRateData,
            options: acceptanceRateOptions
        });
    </script>
</body>

</html>
@endsection
