<?php
include('include/function.php');
include('include/db_connect.php');

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

check_login();

// Récupération des statistiques
$query_clients = "SELECT COUNT(*) as total_clients FROM client";
$query_commandes = "SELECT COUNT(*) as total_commandes FROM commande";
$query_produits = "SELECT COUNT(*) as total_produits FROM produit";

$result_clients = mysqli_query($conn, $query_clients);
$result_commandes = mysqli_query($conn, $query_commandes);
$result_produits = mysqli_query($conn, $query_produits);

$total_clients = mysqli_fetch_assoc($result_clients)['total_clients'];
$total_commandes = mysqli_fetch_assoc($result_commandes)['total_commandes'];
$total_produits = mysqli_fetch_assoc($result_produits)['total_produits'];

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord</title>
    <!-- Intégration de Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Intégration de Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .navbar-nav .nav-item .nav-link {
            color: white;
        }
        .bg-primary {
            background-color: #0033cc !important;
        }
        .navbar-nav .nav-item .nav-link {
            color: white;
            font-size: 1.2em; /* Augmente la taille de la police */
        }
        .navbar {
            justify-content: center; /* Centrer les éléments de navigation */
        }
        .bg-primary {
            background-color: #0033cc !important;
        }
        .container {
            flex: 1;
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #0056b3;
            text-align: center;
            margin-bottom: 40px;
        }
        .stats {
            display: flex;
            justify-content: space-around;
            margin: 20px 0;
        }
        .stat-card {
            background-color: #f5f5f5;
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            flex: 1;
            margin: 0 10px;
        }
        .stat-card h3 {
            color: #0056b3;
            font-size: 2em;
            margin-bottom: 10px;
        }
        .stat-card p {
            color: #666;
        }
        .card {
            margin: 20px 0;
        }
        .card img {
            max-height: 200px;
            object-fit: cover;
        }
        footer {
            background-color: #0056b3;
            color: white;
            text-align: center;
            padding: 10px 0;
            position: relative;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
<header class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="dashboard.php"><img src="../image/50.JPG" alt="Logo" height="40"></a>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a class="nav-link" href="product.php">Produits</a></li>
            <li class="nav-item"><a class="nav-link" href="admin.php">Admin</a></li>
            <li class="nav-item"><a class="nav-link" href="order.php">Commandes</a></li>
            <li class="nav-item"><a class="nav-link" href="user.php">Utilisateurs</a></li>
            <li class="nav-item"><a class="nav-link" href="logout.php">Déconnexion</a></li>
        </ul>
    </div>
</header>

<div class="container">
    <h1>Bienvenue sur le tableau de bord</h1>
    <p class="text-center">Ici vous pouvez gérer les produits, les commandes, les utilisateurs, etc.</p>

    <div class="stats">
        <div class="stat-card">
            <h3><?= $total_produits ?></h3>
            <p>Produits</p>
        </div>
        <div class="stat-card">
            <h3><?= $total_commandes ?></h3>
            <p>Commandes</p>
        </div>
        <div class="stat-card">
            <h3><?= $total_clients ?></h3>
            <p>Utilisateurs</p>
        </div>
    </div>

    <canvas id="myChart" width="400" height="200"></canvas>

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <img src="../image/54.JPG" class="card-img-top section-img" alt="Produits">
                <div class="card-body">
                    <h5 class="card-title">Gestion des produits</h5>
                    <p class="card-text">Ajouter, modifier ou supprimer des produits.</p>
                    <a href="product.php" class="btn btn-primary">Gérer les produits</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="../image/55.PNG" class="card-img-top section-img" alt="Commandes">
                <div class="card-body">
                    <h5 class="card-title">Gestion des commandes</h5>
                    <p class="card-text">Voir et gérer les commandes des clients.</p>
                    <a href="order.php" class="btn btn-primary">Gérer les commandes</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="../image/56.JPG" class="card-img-top section-img" alt="Utilisateurs">
                <div class="card-body">
                    <h5 class="card-title">Gestion des utilisateurs</h5>
                    <p class="card-text">Ajouter, modifier ou supprimer des utilisateurs.</p>
                    <a href="user.php" class="btn btn-primary">Gérer les utilisateurs</a>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="bg-primary text-white text-center py-3">
    &copy; 2024 Mon Site Web. Tous droits réservés.
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        $('.card').hover(function() {
            $(this).addClass('shadow-lg').css('cursor', 'pointer');
        }, function() {
            $(this).removeClass('shadow-lg');
        });

        // Configuration du graphique Chart.js
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Produits', 'Commandes', 'Utilisateurs'],
                datasets: [{
                    label: 'Statistiques',
                    data: [<?= $total_produits ?>, <?= $total_commandes ?>, <?= $total_clients ?>],
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)'
                    ],
                    borderWidth: 1
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
    });
</script>
</body>
</html>
