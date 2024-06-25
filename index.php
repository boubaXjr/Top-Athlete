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
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top Athlete</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="monsiteweb.css">
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
    <div class="row">
        <div class="col-md-4 mb-3">
            <a href="premierleague.php" class="btn btn-secondary btn-block">Premier League</a>
            <div class="teams">
                <p>Manchester City</p>
                <p>Manchester United</p>
                <p>Liverpool</p>
                <p>Arsenal</p>
                <p>Chelsea</p>
                <p>Tottenham</p>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <a href="laliga.php" class="btn btn-secondary btn-block">LaLiga</a>
            <div class="teams">
                <p>Barcelone</p>
                <p>Real Madrid</p>
                <p>Atletico Madrid</p>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <a href="ligue1.php" class="btn btn-secondary btn-block">Ligue 1</a>
            <div class="teams">
                <p>Paris Saint-Germain</p>
                <p>Marseille</p>
                <p>Monaco</p>
                <p>Lyon</p>
                <p>Lille</p>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <a href="bundesliga.php" class="btn btn-secondary btn-block">Bundesliga</a>
            <div class="teams">
                <p>Bayern Munich</p>
                <p>Dortmund</p>
                <p>Bayer Leverkusen</p>
                <p>Leipzig</p>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <a href="seria.php" class="btn btn-secondary btn-block">Serie A</a>
            <div class="teams">
                <p>Juventus</p>
                <p>Inter Milan</p>
                <p>AC Milan</p>
                <p>Napoli</p>
            </div>
        </div>
    </div>
</div>

<!-- Carrousel d'images -->
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="image/38.JPG" class="d-block w-100" alt="Image 1">
        </div>
        <div class="carousel-item">
            <img src="image/39.JPG" class="d-block w-100" alt="Image 2">
        </div>
        <div class="carousel-item">
            <img src="image/40.JPG" class="d-block w-100" alt="Image 3">
        </div>
        <div class="carousel-item">
            <img src="image/41.JPG" class="d-block w-100" alt="Image 4">
        </div>
        <div class="carousel-item">
            <img src="image/42.JPG" class="d-block w-100" alt="Image 5">
        </div>
        <div class="carousel-item">
            <img src="image/43.JPG" class="d-block w-100" alt="Image 6">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<!---les images pour faire genre  --->
<div class="info-section container my-4">
    <h1>CE QUE NOUS FAISONS</h1>
    <div class="row">
        <div class="col-md-4">
            <div class="feature text-center">
                <img src="image/51.PNG" alt="Livraison en 24H" class="img-fluid">
                <p>LIVRAISON GRATUITE</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="feature text-center">
                <img src="image/52.PNG" alt="Satisfaction client" class="img-fluid">
                <p>NOS SOMMES LA POUR VOUS SATISFAIRE</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="feature text-center">
                <img src="image/53.PNG" alt="Contact" class="img-fluid">
                <p><a href="contact.php" class="btn btn-primary">CONTACTER NOUS</a></p>
            </div>
        </div>
    </div>
</div>

<!-- top ventes -->
<main class="container my-4">
    <section class="top vente">
        <h2>NOS TOP VENTES</h2>
        <div class="row">
            <div class="col-md-4 mb-4" data-id="1">
                <div class="card product">
                    <img src="image/16.JPG" class="card-img-top" alt="Maillot Bayern Munich">
                    <div class="card-body">
                        <h5 class="card-title">Maillot Bayern Munich 2024/25</h5>
                        <p class="card-text">Domicile</p>
                        <p class="card-text">40€</p>
                        <button class="btn btn-primary ajouter">Ajouter au panier</button>
                        <button class="btn btn-outline-danger favoris"><i class="fas fa-heart"></i></button>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4" data-id="2">
                <div class="card product">
                    <img src="image/19.JPG" class="card-img-top" alt="Maillot Dortmund">
                    <div class="card-body">
                        <h5 class="card-title">Maillot Dortmund 2024/25</h5>
                        <p class="card-text">Domicile</p>
                        <p class="card-text">50€</p>
                        <button class="btn btn-primary ajouter">Ajouter au panier</button>
                        <button class="btn btn-outline-danger favoris"><i class="fas fa-heart"></i></button>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4" data-id="3">
                <div class="card product">
                    <img src="image/28.JPG" class="card-img-top" alt="Maillot Barcelone">
                    <div class="card-body">
                        <h5 class="card-title">Maillot Barcelone 2024/25</h5>
                        <p class="card-text">Domicile</p>
                        <p class="card-text">40€</p>
                        <button class="btn btn-primary ajouter">Ajouter au panier</button>
                        <button class="btn btn-outline-danger favoris"><i class="fas fa-heart"></i></button>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4" data-id="4">
                <div class="card product">
                    <img src="image/31.JPG" class="card-img-top" alt="Maillot Real Madrid">
                    <div class="card-body">
                        <h5 class="card-title">Maillot Real Madrid 2024/25</h5>
                        <p class="card-text">Domicile</p>
                        <p class="card-text">50€</p>
                        <button class="btn btn-primary ajouter">Ajouter au panier</button>
                        <button class="btn btn-outline-danger favoris"><i class="fas fa-heart"></i></button>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4" data-id="5">
                <div class="card product">
                    <img src="image/maillot_psg-bege.JPEG" class="card-img-top" alt="Maillot PSG">
                    <div class="card-body">
                        <h5 class="card-title">Maillot PSG 2024/25</h5>
                        <p class="card-text">Domicile</p>
                        <p class="card-text">40€</p>
                        <button class="btn btn-primary ajouter">Ajouter au panier</button>
                        <button class="btn btn-outline-danger favoris"><i class="fas fa-heart"></i></button>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4" data-id="6">
                <div class="card product">
                    <img src="image/maillot_marseille_blanc1.JPEG" class="card-img-top" alt="Maillot Marseille">
                    <div class="card-body">
                        <h5 class="card-title">Maillot Marseille 2024/25</h5>
                        <p class="card-text">Extérieur</p>
                        <p class="card-text">50€</p>
                        <button class="btn btn-primary ajouter">Ajouter au panier</button>
                        <button class="btn btn-outline-danger favoris"><i class="fas fa-heart"></i></button>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4" data-id="7">
                <div class="card product">
                    <img src="image/arsenal 3.JPG" class="card-img-top" alt="Maillot Arsenal">
                    <div class="card-body">
                        <h5 class="card-title">Maillot Arsenal 2024/25</h5>
                        <p class="card-text">Third</p>
                        <p class="card-text">50€</p>
                        <button class="btn btn-primary ajouter">Ajouter au panier</button>
                        <button class="btn btn-outline-danger favoris"><i class="fas fa-heart"></i></button>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4" data-id="8">
                <div class="card product">
                    <img src="image/2.JPG" class="card-img-top" alt="Maillot Manchester City">
                    <div class="card-body">
                        <h5 class="card-title">Maillot Manchester City 2024/25</h5>
                        <p class="card-text">Extérieur</p>
                        <p class="card-text">40€</p>
                        <button class="btn btn-primary ajouter">Ajouter au panier</button>
                        <button class="btn btn-outline-danger favoris"><i class="fas fa-heart"></i></button>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4" data-id="9">
                <div class="card product">
                    <img src="image/napoli_blanc.JPEG" class="card-img-top" alt="Napoli">
                    <div class="card-body">
                        <h5 class="card-title">Maillot Napoli 2024/25</h5>
                        <p class="card-text">Domicile</p>
                        <p class="card-text">40€</p>
                        <button class="btn btn-primary ajouter">Ajouter au panier</button>
                        <button class="btn btn-outline-danger favoris"><i class="fas fa-heart"></i></button>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4" data-id="10">
                <div class="card product">
                    <img src="image/milan 1.JPG" class="card-img-top" alt="Maillot AC milan">
                    <div class="card-body">
                        <h5 class="card-title">Maillot AC milan 2024/25</h5>
                        <p class="card-text">Domicile</p>
                        <p class="card-text">40€</p>
                        <button class="btn btn-primary ajouter">Ajouter au panier</button>
                        <button class="btn btn-outline-danger favoris"><i class="fas fa-heart"></i></button>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4" data-id="11">
                <div class="card product">
                    <img src="image/internoireblanc.JPEG" class="card-img-top" alt="Maillot Inter milan">
                    <div class="card-body">
                        <h5 class="card-title">Maillot Inter milan 2024/25</h5>
                        <p class="card-text">Domicile</p>
                        <p class="card-text">45€</p>
                        <button class="btn btn-primary ajouter">Ajouter au panier</button>
                        <button class="btn btn-outline-danger favoris"><i class="fas fa-heart"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<main class="container my-4">
    <h1>TOP ATHLETE</h1>
    <section id="about-us" class="about-us">
        <div class="row about-content">
            <div class="col-md-6 about-image">
                <img src="image/45.JPG" alt="Image 1" class="img-fluid">
            </div>
            <div class="col-md-6 about-text">
                <h3>HISTORIQUE</h3>
                <p>
                    <strong>Top Athlete</strong>, fondé en 2015, est le leader français de la vente en ligne de maillots de football. Avec plus de 15 000 références en stock, nous vous garantissons de trouver le maillot de votre équipe favorite, ainsi que des équipements comme chaussures, protège-tibias et survêtements, le tout aux meilleurs prix. Nous recevons quotidiennement des nouveaux produits, alors n'hésitez pas à revenir régulièrement pour découvrir les dernières nouveautés !
                </p>
            </div>
        </div>

        <div class="row about-content">
            <div class="col-md-6 about-image">
                <img src="image/46.JPG" alt="Image 2" class="img-fluid">
            </div>
            <div class="col-md-6 about-text">
                <h3>NOTRE BOUTIQUE</h3>
                <p>
                    Nous offrons une large gamme de maillots officiels des plus grands clubs français comme le Paris Saint-Germain, l'Olympique de Marseille, l'Olympique Lyonnais, ainsi que des clubs internationaux tels que le FC Barcelone, le Real Madrid, Chelsea et Manchester United. Chaque maillot est sous licence officielle, assurant une qualité irréprochable.
                </p>
            </div>
        </div>

        <div class="row about-content">
            <div class="col-md-6 about-image">
                <img src="image/49.JPG" alt="Image 4" class="img-fluid">
            </div>
            <div class="col-md-6 about-text">
                <h3>Livraison gratuite en 24h</h3>
                <p>
                    Pour toute commande de plus de 100€. Passez votre commande avant 15h et recevez-la le lendemain. Nous proposons également des options de livraison rapide avec Colissimo et Chronopost. Pour les commandes inférieures à 100€, les frais de port sont de seulement 5€.
                </p>
            </div>
        </div>
    </section>
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
