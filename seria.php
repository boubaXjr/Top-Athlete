<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Serie A Maillots</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<header class="bg-primary text-white">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center py-3">
            <a href="index.php"><img src="image/50.JPG" alt="TOP ATHLETE" class="logo" style="width: 200px;"></a>
            <div class="search-container">
                <form action="recherche.php" method="GET" class="form-inline">
                    <input type="text" name="query" placeholder="Recherche" class="form-control mr-2">
                    <button type="submit" class="btn btn-light">Recherche</button>
                </form>
            </div>
            <nav>
                <ul class="nav">
                    <li class="nav-item"><a href="contact.php" class="nav-link text-white">Contact</a></li>
                    <?php
                    session_start();
                    if (isset($_SESSION['email'])) {
                        echo '<li class="nav-item"><a href="logout.php" class="nav-link text-white">Déconnexion</a></li>';
                    } else {
                        echo '<li class="nav-item"><a href="pagecompte.php" class="nav-link text-white">Compte</a></li>';
                    }
                    ?>
                    <li class="nav-item"><a href="panier.php" class="nav-link text-white">Panier <span id="cart-count" class="badge badge-light">0</span></a></li>
                    <li class="nav-item"><a href="favoris.php" class="nav-link text-white">Favoris</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>

<div class="container my-4">
    <div class="list-group">
        <a href="premierleague.php" class="list-group-item list-group-item-action">Premier League</a>
        <a href="laliga.php" class="list-group-item list-group-item-action">LaLiga</a>
        <a href="ligue1.php" class="list-group-item list-group-item-action">Ligue 1</a>
        <a href="bundesliga.php" class="list-group-item list-group-item-action">Bundesliga</a>
        <a href="seria.php" class="list-group-item list-group-item-action active">Serie A</a>
    </div>
</div>

<div class="container my-4">
    <?php
    // Connexion à la base de données
    $servername = "localhost";
    $username = "root";
    $password = "mamadou";
    $dbname = "maillot_nouvelle";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Échec de la connexion : " . $conn->connect_error);
    }

    $teams = ['AC Milan', 'Juventus', 'Inter Milan', 'Napoli'];
    foreach ($teams as $team) {
        echo "<div class='row my-4'>";
        echo "<div class='col-md-12'>";
        echo "<h2>" . htmlspecialchars($team) . "</h2>";
        echo "</div>";

        $sql = "SELECT * FROM produit WHERE club = '$team'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $idProduit = isset($row["id_produit"]) ? $row["id_produit"] : '';
                $description = isset($row["description_"]) ? $row["description_"] : '';
                $prix = isset($row["prix"]) ? $row["prix"] : '';
                $image = isset($row["image"]) ? $row["image"] : '';
                echo "<div class='col-md-4 mb-4'>";
                echo "<div class='card product' data-id='" . htmlspecialchars($idProduit) . "' onclick='redirectToDetailPage(this)'>";
                echo "<img src='" . htmlspecialchars($image) . "' class='card-img-top' alt='" . htmlspecialchars($description) . "'>";
                echo "<div class='card-body'>";
                echo "<h5 class='card-title'>" . htmlspecialchars($description) . "</h5>";
                echo "<p class='card-text'>" . htmlspecialchars($prix) . "€</p>";
                echo "<button class='btn btn-primary ajoutpanier'>Ajouter au panier</button>";
                echo "<button class='btn btn-outline-danger favoris'><i class='fas fa-heart'></i></button>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
        } else {
            echo "<div class='col-md-12'><p>Aucun produit trouvé pour $team.</p></div>";
        }
        echo "</div>";
    }

    $conn->close();
    ?>
</div>

<footer class="bg-primary text-white text-center py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h4>A propos de nous</h4>
                <p>Votre boutique unique pour les maillots de football officiels. Qualité garantie.</p>
            </div>
            <div class="col-md-4">
                <h4>Contactez nous</h4>
                <p>Email: support@footballmezaour.com</p>
                <p>Phone: +123 456 7890</p>
            </div>
            <div class="col-md-4">
                <h4>suivez nous sur :</h4>
                <a href="#" class="text-white">Facebook</a>
                <a href="#" class="text-white">Twitter</a>
                <a href="#" class="text-white">Instagram</a>
            </div>
        </div>
        <div class="footer-bottom py-2">
            <p>&copy; 2024 Football Jersey Shop. tout droit réservés.</p>
        </div>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    function redirectToDetailPage(element) {
        const productId = element.getAttribute('data-id');
        window.location.href = `product_detail.php?id=${productId}`;
    }

    document.addEventListener('DOMContentLoaded', function() {
        const favorisButtons = document.querySelectorAll('.favoris');

        favorisButtons.forEach(button => {
            button.addEventListener('click', function(event) {
                event.stopPropagation();
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
