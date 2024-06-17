<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détail Produit</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="page_produitdétail.css"> <!-- Assurez-vous que ce fichier CSS est correct -->
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
                <li><a href="panier.php" class="cart les3">Panier <span id="cart-count">0</span></a></li>
                <li><a href="favoris.php" class="les3">Favoris</a></li>
            </ul>
        </nav>
    </div>
</header>


    <div class="product-detail-container">
        <?php
        // Connexion à la base de données
        $servername = "localhost";
        $username = "root"; // Remplacez par votre nom d'utilisateur
        $password = ""; // Remplacez par votre mot de passe
        $dbname = "nom_de_votre_base_de_donnees"; // Remplacez par le nom de votre base de données

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Échec de la connexion : " . $conn->connect_error);
        }

        if (isset($_GET['id'])) {
            $productId = intval($_GET['id']);
            $sql = "SELECT * FROM produits WHERE id = $productId";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='product-detail'>";
                    echo "<img src='" . $row["image"] . "' alt='" . $row["nom"] . "' class='product-image'>";
                    echo "<div class='product-info'>";
                    echo "<h1>" . $row["nom"] . "</h1>";
                    echo "<p>" . $row["description"] . "</p>";
                    echo "<p>Prix: " . $row["prix"] . "€</p>";
                    echo "<p>Club: " . $row["club"] . "</p>";
                    echo "<button class='ajouter'>Ajouter au panier</button>";
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

    <footer>
        <div class="footer-container">
            <div class="footer-section">
                <h4>À propos de nous</h4>
                <p>Votre boutique unique pour les maillots de football officiels. Qualité garantie.</p>
            </div>
            <div class="footer-section">
                <h4>Contactez-nous</h4>
                <p>Email: support@footballmezaour.com</p>
                <p>Phone: +123 456 7890</p>
            </div>
            <div class="footer-section">
                <h4>Suivez-nous sur :</h4>
                <a href="#">Facebook</a>
                <a href="#">Twitter</a>
                <a href="#">Instagram</a>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 Football Jersey Shop. Tous droits réservés.</p>
        </div>
    </footer>

    <script>
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
