<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "mamadou";
$dbname = "maillot_nouvelle";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("La connexion a échoué: " . $conn->connect_error);
}

$favoris = [];

if (isset($_SESSION['id_client'])) {
    $id_client = $_SESSION['id_client'];
    $sql = "SELECT produit.* FROM produit
            INNER JOIN favoris ON produit.ID_Produit = favoris.ID_Produit
            WHERE favoris.id_client = $id_client";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $favoris[] = $row;
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Favoris </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="favoris.css">
</head>
<body>
    <div class="wrapper">
        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-primary">
                <a class="navbar-brand text-white" href="index.php">
                    <img src="image/50.JPG" alt="TOP ATHLETE" class="logo">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <form class="form-inline my-2 my-lg-0 mx-auto" action="recherche.php" method="GET">
                        <input class="form-control mr-sm-2" type="search" placeholder="Recherche" name="query" aria-label="Search">
                        <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Recherche</button>
                    </form>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="contact.php">Contact</a>
                        </li>
                        <?php
                        if (isset($_SESSION['email'])) {
                            echo '<li class="nav-item"><a class="nav-link text-white" href="logout.php">Déconnexion</a></li>';
                        } else {
                            echo '<li class="nav-item"><a class="nav-link text-white" href="pagecompte.php">Compte</a></li>';
                        }
                        ?>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="panier.php">Panier <span id="cart-count" class="badge badge-light">0</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="favoris.php">Favoris</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
    </div>

    <div class="container mt-4">
        <div class="row">
            <div class="col">
                <a href="premierleague.php" class="btn btn-secondary btn-block">Premier League</a>
            </div>
            <div class="col">
                <a href="laliga.php" class="btn btn-secondary btn-block">LaLiga</a>
            </div>
            <div class="col">
                <a href="ligue1.php" class="btn btn-secondary btn-block">Ligue 1</a>
            </div>
            <div class="col">
                <a href="bundesliga.php" class="btn btn-secondary btn-block">Bundesliga</a>
            </div>
            <div class="col">
                <a href="seria.php" class="btn btn-secondary btn-block">Serie A</a>
            </div>
        </div>
    </div>

<main>
    <h1>Mes Favoris</h1>
    <?php if (count($favoris) > 0): ?>
        <div class="products-container">
            <?php foreach ($favoris as $product): ?>
                <div class="product" data-id="<?php echo htmlspecialchars($product['ID_Produit']); ?>">
                    <img src="<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['description_']); ?>">
                    <div class="product-info">
                        <p><?php echo htmlspecialchars($product['description_']); ?></p>
                        <p><?php echo htmlspecialchars($product['prix']); ?>€</p>
                        <button class="ajouter">Ajouter au panier</button>
                        <button class="favoris"><i class="fas fa-heart"></i></button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p>Vous n'avez aucun produit dans vos favoris.</p>
    <?php endif; ?>
</main>

<footer class="bg-primary text-white text-center py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h4><a href="#about-us" class="text-white">A propos de nous</a></h4>
                <p>Votre boutique unique pour les maillots de football officiels. Qualité garantie.</p>
            </div>
            <div class="col-md-4">
                <h4>Contactez nous</h4>
                <p>Email: support@footballmezaour.com</p>
                <p>Phone: +123 456 7890</p>
            </div>
            <div class="col-md-4">
                <h4>Suivez nous sur :</h4>
                <a href="#" class="text-white">Facebook</a>
                <a href="#" class="text-white">Twitter</a>
                <a href="#" class="text-white">Instagram</a>
            </div>
        </div>
        <div class="footer-bottom py-2">
            <p>&copy; 2024 Football Jersey Shop. Tous droits réservés.</p>
        </div>
    </div>
</footer>
</body>
</html>
