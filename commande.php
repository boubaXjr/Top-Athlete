<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commande</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="commande.css">
</head>
<body>
<header>
    <div class="header-container">
        <a href="index.php"><img src="image/50.JPG" alt="TOP ATHLETE" class="logo"></a>
        <div class="search-container">
            <input type="text" placeholder="Recherche" class="search-bar">
        </div>
        <nav>
            <ul class="nav-links">
                <li><a href="contact.php" class="nav-link">Contact</a></li>
                <li><a href="pagecompte.php" class="nav-link">Compte</a></li>
                <li><a href="panier.php" class="nav-link">Panier <span id="cart-count"><?php echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0; ?></span></a></li>
                <li><a href="favoris.php" class="nav-link">Favoris</a></li>
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

<div class="order-container">
    <h1>Votre Commande</h1>
    <table class="order-table">
        <thead>
            <tr>
                <th class="order-header">Produit</th>
                <th class="order-header">Prix</th>
                <th class="order-header">Quantité</th>
                <th class="order-header">Sous-total</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "Dusty126$";
            $dbname = "maillot_nouvelle";
            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Échec de la connexion : " . $conn->connect_error);
            }

            $total = 0;
            if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as $productId) {
                    $sql = "SELECT * FROM produit WHERE id_produit = $productId";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $description = $row["description_"];
                            $prix = $row["prix"];
                            $image = $row["image"];
                            $subtotal = $prix; // Assuming quantity is 1 for simplicity
                            $total += $subtotal;
                            echo "<tr class='order-row'>";
                            echo "<td class='order-product'><img src='" . htmlspecialchars($image) . "' alt='" . htmlspecialchars($description) . "' class='order-image'>" . htmlspecialchars($description) . "</td>";
                            echo "<td class='order-price'>" . htmlspecialchars($prix) . "€</td>";
                            echo "<td class='order-quantity'>1</td>"; // Assuming quantity is 1 for simplicity
                            echo "<td class='order-subtotal'>" . htmlspecialchars($subtotal) . "€</td>";
                            echo "</tr>";
                        }
                    }
                }
            } else {
                echo "<tr class='order-empty'><td colspan='4'>Votre panier est vide.</td></tr>";
            }

            $conn->close();
            ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3" class="order-total-label">Total</td>
                <td class="order-total-value"><?php echo htmlspecialchars($total); ?>€</td>
            </tr>
        </tfoot>
    </table>
    <button id="payer" class="order-pay-button">Payer</button>
</div>
<script>
document.getElementById('payer').addEventListener('click', function() {
    alert('Merci pour votre commande!');
    <?php
    // Vider le panier après commande
    unset($_SESSION['cart']);
    ?>
    window.location.href = 'index.php';
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

</body>
</html>
