<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ligue 1 Maillots</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="ligue1.css">
</head>
<body>
<header>
    <div class="header-container">
        <a href="index.php"><img src="image/50.JPG" alt="TOP ATHLETE" class="logo"></a>
        <div class="search-container">
            <form action="recherche.php" method="get" class="search-form">
                <input type="text" name="query" class="search-bar" placeholder="Rechercher un produit..." required>
                <button type="submit" class="search-button">Rechercher</button>
            </form>
        </div>
        <nav>
            <ul>
                <li><a href="contact.php" class="les3">Contact</a></li>
                <li><a href="pagecompte.php" class="les3">Compte</a></li>
                <li><a href="panier.php" class="cart les3">Panier <span id="cart-count">0</span></a></li>
                <li><a href="favoris.php" class="les3">Favoris</a></li>
            </ul>
        </nav>
    </div>
</header>

<div class="leagues">
    <div class="league" id="premier-league">
        <a href="premierleague.php" class="league-link">Premier League</a>
        <div class="teams">
            <p>Manchester City</p>
            <p>Manchester United</p>
            <p>Liverpool</p>
            <p>Arsenal</p>
            <p>Chelsea</p>
            <p>Tottenham</p>
        </div>
    </div>
    <div class="league" id="laliga">
        <a href="laliga.php" class="league-link">LaLiga</a>
        <div class="teams">
            <p>Barcelone</p>
            <p>Real Madrid</p>
            <p>Atletico Madrid</p>
        </div>
    </div>
    <div class="league" id="ligue1">
        <a href="ligue1.php" class="league-link">Ligue 1</a>
        <div class="teams">
            <p>Paris Saint-Germain</p>
            <p>Marseille</p>
            <p>Monaco</p>
            <p>Lyon</p>
            <p>Lille</p>
        </div>
    </div>
    <div class="league" id="bundesliga">
        <a href="bundesliga.php" class="league-link">Bundesliga</a>
        <div class="teams">
            <p>Bayern Munich</p>
            <p>Dortmund</p>
            <p>Bayer Leverkusen</p>
            <p>Leipzig</p>
        </div>
    </div>
    <div class="league" id="serie-a">
        <a href="seria.php" class="league-link">Serie A</a>
        <div class="teams">
            <p>Juventus</p>
            <p>Inter Milan</p>
            <p>AC Milan</p>
            <p>Napoli</p>
        </div>
    </div>
</div>

<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "Dusty126$";
$dbname = "maillot_nouvelle";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

$teams = ['Paris Saint-Germain', 'Marseille', 'Monaco', 'Lyon', 'Lille'];
foreach ($teams as $team) {
    echo "<div class='products-container' id='" . strtolower(str_replace(' ', '-', $team)) . "-section'>";
    $sql = "SELECT * FROM produit WHERE club = '$team'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $idProduit = isset($row["id_produit"]) ? $row["id_produit"] : '';
            $description = isset($row["description_"]) ? $row["description_"] : '';
            $prix = isset($row["prix"]) ? $row["prix"] : '';
            $image = isset($row["image"]) ? $row["image"] : '';
            echo "<div class='product' data-id='" . htmlspecialchars($idProduit) . "' onclick='redirectToDetailPage(this)'>";
            echo "<img src='" . htmlspecialchars($image) . "' alt='" . htmlspecialchars($description) . "'>";
            echo "<div class='product-info'>";
            echo "<p>" . htmlspecialchars($description) . "</p>";
            echo "<p>" . htmlspecialchars($prix) . "€</p>";
            echo "<button class='ajouter'>Ajouter au panier</button>";
            echo "<button class='favoris'><i class='fas fa-heart'></i></button>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "<p>Aucun produit trouvé pour $team.</p>";
    }
    echo "</div>";
}

$conn->close();
?>

<footer>
    <div class="footer-container">
        <div class="footer-section">
            <h4>A propos de nous </h4>
            <p>Votre boutique unique pour les maillots de football officiels. Qualité garantie.</p>
        </div>
        <div class="footer-section">
            <h4>Contactez nous </h4>
            <p>Email: support@footballmezaour.com</p>
            <p>Phone: +123 456 7890</p>
        </div>
        <div class="footer-section">
            <h4>suivez nous sur : </h4>
            <a href="#">Facebook</a>
            <a href="#">Twitter</a>
            <a href="#">Instagram</a>
        </div>
    </div>
    <div class="footer-bottom">
        <p>&copy; 2024 Football Jersey Shop. tout droit reservés.</p>
    </div>
</footer>

<script>
    function redirectToDetailPage(element) {
        const productId = element.getAttribute('data-id');
        window.location.href = `product_detail.php?id=${productId}`;
    }

    document.addEventListener('DOMContentLoaded', function() {
        const favorisButtons = document.querySelectorAll('.favoris');

        favorisButtons.forEach(button => {
            button.addEventListener('click', function() {
                this.classList.toggle('active');
                this.querySelector('i').style.color = this.classList.contains('active') ? '#e84545' : '#000000';
            });
        });
    });
</script>
</body>
</html>
