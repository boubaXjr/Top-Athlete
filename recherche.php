<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "toor";
$dbname = "maillot_nouvelle";

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion a échoué: " . $conn->connect_error);
}

$search_query = '';
$search_results = [];

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['query'])) {
    $search_query = $conn->real_escape_string($_GET['query']);
    $sql = "SELECT * FROM produit WHERE club LIKE '%$search_query%' OR description_ LIKE '%$search_query%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $search_results[] = $row;
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
    <title>Panier d'achat</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="panier.css">
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

<main class="container my-4">
    <h1>Résultats de la recherche pour "<?php echo htmlspecialchars($search_query); ?>"</h1>
    <?php if (count($search_results) > 0): ?>
        <div class="row">
            <?php foreach ($search_results as $product): ?>
                <div class="col-md-4 mb-4">
                    <div class="card product" data-id="<?php echo htmlspecialchars($product['id_produit']); ?>" onclick="redirectToDetailPage(this)">
                        <img src="<?php echo htmlspecialchars($product['image']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($product['club']); ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($product['description_']); ?></h5>
                            <p class="card-text"><?php echo htmlspecialchars($product['prix']); ?>€</p>
                            <button class="btn btn-primary ajouter">Ajouter au panier</button>
                            <button class="btn btn-outline-danger favoris"><i class="fas fa-heart"></i></button>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p>Aucun produit trouvé.</p>
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

<!-- JavaScript pour le carrousel -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $('.carousel').carousel({
        interval: 3000
    });
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const favorisButtons = document.querySelectorAll('.favoris');

    favorisButtons.forEach(button => {
        button.addEventListener('click', function(event) {
            event.stopPropagation(); // Empêche la propagation de l'événement pour éviter le clic sur le produit
            const productId = this.closest('.product').getAttribute('data-id');
            ajouterAuxFavoris(productId);
        });
    });
});

function ajouterAuxFavoris(productId) {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "ajouter_favoris.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log(xhr.responseText);
            window.location.href = "favoris.php";
        }
    };
    xhr.send("product_id=" + productId);
}
</script>

</body>
</html>
