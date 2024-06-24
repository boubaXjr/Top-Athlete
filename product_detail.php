<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détail Produit</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="page_produitdétail.css">
</head>
<body>
<header>
    <div class="header-container">
        <a href="index.php"><img src="image/50.JPG" alt="TOP ATHLETE" class="logo"></a>
        <div class="search-container">
            <input type="text" placeholder="Recherche" class="search-bar">
        </div>
        <nav>
            <ul>
                <li><a href="contact.php" class="les3">Contact</a></li>
                <li><a href="pagecompte.php" class="les3">Compte</a></li>
                <li><a href="panier.php" class="cart les3">Panier <span id="cart-count"><?php echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0; ?></span></a></li>
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


<div class="product-detail-container">
    <?php
    $servername = "localhost";
    $username = "root";
 $password = "mamadou";
     $dbname = "maillot_nouvelle";
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Échec de la connexion : " . $conn->connect_error);
    }

    if (isset($_GET['id'])) {
        $productId = intval($_GET['id']);
        $sql = "SELECT * FROM produit WHERE id_produit = $productId";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $description = $row["description_"];
                $prix = $row["prix"];
                $club = $row["club"];
                $image = $row["image"];
                echo "<div class='product-detail'>";
                echo "<img src='" . htmlspecialchars($image) . "' alt='" . htmlspecialchars($description) . "' class='product-image'>";
                echo "<div class='product-info'>";
                echo "<h1>" . htmlspecialchars($description) . "</h1>";
                echo "<p>Prix: " . htmlspecialchars($prix) . "€</p>";
                echo "<p>Club: " . htmlspecialchars($club) . "</p>";
                echo "<button class='ajouter' data-id='$productId'>Ajouter au panier</button>";
                echo "<button class='favoris'><i class='fas fa-heart'></i></button>";
                echo "</div>";
                echo "</div>";
            }
        } else {
            echo "<p>Produit introuvable.</p>";
        }
    } else {
        echo "<p>Produit non spécifié.</p>";
    }

    $conn->close();
    ?>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const ajouterButtons = document.querySelectorAll('.ajouter');

    ajouterButtons.forEach(button => {
        button.addEventListener('click', function() {
            const productId = this.getAttribute('data-id');

            fetch('ajouter_au_panier.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ productId: productId })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Produit ajouté au panier avec succès!');
                    document.getElementById('cart-count').innerText = data.cartCount;
                } else {
                    alert('Erreur lors de l\'ajout au panier.');
                }
            })
            .catch(error => console.error('Error:', error));
        });
    });
});
</script>

<footer>
        <div class="footer-container">
            <div class="footer-section">
               <h4><a href="#about-us">A propos de nous</a></h4>
    <p>Votre boutique unique pour les maillots de football officiels. Qualité garantie..</p>
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

<style>
.product-detail-container {
    display: flex;
    justify-content: center;
    padding: 20px;
}

.product-detail {
    border: 1px solid #ccc;
    border-radius: 10px;
    padding: 20px;
    max-width: 300px;
    text-align: center;
    background-color: #fff;
}

.product-image {
    max-width: 80%;
    height: auto;
    margin-bottom: 15px;
}

.product-info {
    text-align: center;
}

.product-info h1 {
    font-size: 18px;
    margin-left: 0 0 10px 0;
}

.product-info p {
    margin: 5px 0;
}
</style>

</body>
</html>