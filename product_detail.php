
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détail Produit</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<style>
       body {
    margin: 0;
    font-family: Arial, sans-serif;
}

.header-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #004AAD;
    padding: 10px 20px;
}


header {
    background-color: #004AAD;
    color: white;
    width: 100%;
}


.logo {
    width: 40px;
    margin-left: 10px;
    width: 200px;
    margin-left: 10%;
}

nav ul {
    list-style: none;
    padding: 0;
    display: flex;
}

nav ul li {
    margin-left: 20px;
}

nav ul li a {
    color: white;
    text-decoration: none;
    font-size: 18px;
}

.search-container {
    display: flex;
    justify-content: center;
    flex-grow: 1;
}

.search-bar {
    width: 50%;
    padding: 10px;
    font-size: 16px;
    border-radius: 20px;
    border: 1px solid #ccc;
}







.leagues {
    display: flex;
    justify-content: center;
}

.league {
    position: relative;
    width: 100%;
    padding: 20px 10px;
    text-align: center;
    cursor: pointer;
    color: #0d4a80;
    font-weight: bold;
    background-color: #dfe5e8;
    text-decoration: none;
}

.league:hover {
    background-color: white;
}

.teams {
    display: none;
    position: absolute;
    top: 100%;
    left: 0;
    width: 100%;
    background-color: white;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    z-index: 1;
}

.league:hover .teams {
    display: block;
}

.teams p {
    margin: 0;
    padding: 10px;
    text-align: left;
    border-bottom: 1px solid #ccc;
    cursor: pointer;
    transition: background-color 0.3s, color 0.3s; /* Ajout de la transition pour la couleur de fond et la couleur du texte */
}

.teams p:hover {
    background-color: #0d4a80; /* Changement de couleur de fond au survol */
    color: white; /* Changement de couleur du texte au survol */
}


.league-link {
    display: inline-block;
    position: relative;
    color: #0d4a80;
    text-decoration: none;
    transition: color 0.3s ease;
}

.league-link:hover {
    color: #1192e8; /* Changement de couleur au survol */
}

.league-link::before {
    content: "";
    position: absolute;
    bottom: -2px;
    left: 0;
    width: 100%;
    height: 2px;
    background-color: #1192e8; /* Ligne bleue sous le lien */
    transform: scaleX(0); /* Ligne initialement invisible */
    transition: transform 0.3s ease;
}

.league-link:hover::before {
    transform: scaleX(1); /* Affiche la ligne bleue au survol */
}




.product-detail-container {
    display: flex;
    justify-content: center;
    padding: 20px;
}

.product-detail {
    border: 1px solid #ddd;
    border-radius: 10px;
    overflow: hidden;
    width: 70%;
    background-color: #ffffff;
    color: #0d4a80;
    text-align: left;
    padding: 20px;
}

.product-detail img {
    width: 100%;
    height: auto;
    margin-bottom: 20px;
}

.product-info {
    text-align: left;
}

.product-info h1 {
    font-size: 24px;
    margin-bottom: 10px;
}

.product-info p {
    margin: 5px 0;
}

button.ajouter, button.favoris {
    margin-top: 10px;
    padding: 10px;
    font-size: 16px;
    color: white;
    background-color: #004AAD;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
    margin-left: 20px;
}

button.ajouter:hover, button.favoris:hover {
    background-color: #20ff2f;
}

.favoris i {
    color: white;
    transition: color 0.3s;
}

.favoris.active i {
    color: #e84545;
}

.favoris:hover i {
    color: #e84545;
}

footer {
    background-color: #004AAD;
    color: #fff;
    padding: 20px 0;
}

.footer-container {
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
    max-width: 100%;
    margin: auto;
    padding: 0 20px;
}

.footer-section {
    flex: 1;
    min-width: 200px;
    margin: 20px 0;
}

.footer-section h4 {
    margin-bottom: 10px;
}

.footer-section a {
    color: #fff;
    text-decoration: none;
    display: block;
    margin-bottom: 5px;
}

.footer-section a:hover {
    text-decoration: underline;
}

.footer-bottom {
    text-align: center;
    padding: 10px 0;
    border-top: 1px solid #1192e8;
}

.footer-bottom p {
    margin: 0;
}


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
</head>
<body>
<header>
    <div class="header-container">
        <a href="index.php"><img src="image/50.JPG" alt="TOP ATHLETE" class="logo"></a>
        <div class="search-container">
            <form action="recherche.php" method="GET">
                <input type="text" name="query" placeholder="Recherche" class="search-bar">
                <button type="submit">Recherche</button>
            </form>
        </div>
        <nav>
            <ul>
                <li><a href="contact.php" class="les3">Contact</a></li>
                <?php
                if (isset($_SESSION['email'])) {
                    echo '<li><a href="logout.php" class="les3">Déconnexion</a></li>';
                } else {
                    echo '<li><a href="pagecompte.php" class="les3">Compte</a></li>';
                }
                ?>
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
            <p><a href="club.php?club=Manchester%20City">Manchester City</a></p>
            <p><a href="club.php?club=Manchester%20United">Manchester United</a></p>
            <p><a href="club.php?club=Liverpool">Liverpool</a></p>
            <p><a href="club.php?club=Arsenal">Arsenal</a></p>
            <p><a href="club.php?club=Chelsea">Chelsea</a></p>
            <p><a href="club.php?club=Tottenham">Tottenham</a></p>
        </div>
    </div>
    <div class="league" id="laliga">
        <a href="laliga.php" class="league-link">LaLiga</a>
        <div class="teams">
            <p><a href="club.php?club=Barcelone">Barcelone</a></p>
            <p><a href="club.php?club=Real%20Madrid">Real Madrid</a></p>
            <p><a href="club.php?club=Atletico%20Madrid">Atletico Madrid</a></p>
        </div>
    </div>
    <div class="league" id="ligue1">
        <a href="ligue1.php" class="league-link">Ligue 1</a>
        <div class="teams">
            <p><a href="club.php?club=Paris%20Saint-Germain">Paris Saint-Germain</a></p>
            <p><a href="club.php?club=Marseille">Marseille</a></p>
            <p><a href="club.php?club=Monaco">Monaco</a></p>
            <p><a href="club.php?club=Lyon">Lyon</a></p>
            <p><a href="club.php?club=Lille">Lille</a></p>
        </div>
    </div>
    <div class="league" id="bundesliga">
        <a href="bundesliga.php" class="league-link">Bundesliga</a>
        <div class="teams">
            <p><a href="club.php?club=Bayern%20Munich">Bayern Munich</a></p>
            <p><a href="club.php?club=Dortmund">Dortmund</a></p>
            <p><a href="club.php?club=Bayer%20Leverkusen">Bayer Leverkusen</a></p>
            <p><a href="club.php?club=Leipzig">Leipzig</a></p>
        </div>
    </div>
    <div class="league" id="serie-a">
        <a href="seria.php" class="league-link">Serie A</a>
        <div class="teams">
            <p><a href="club.php?club=Juventus">Juventus</a></p>
            <p><a href="club.php?club=Inter%20Milan">Inter Milan</a></p>
            <p><a href="club.php?club=AC%20Milan">AC Milan</a></p>
            <p><a href="club.php?club=Napoli">Napoli</a></p>
        </div>
    </div>
</div>

<div class="product-detail-container">
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "toor";
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



</body>
</html>