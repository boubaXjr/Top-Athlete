
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LaLiga Maillots</title>
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link rel="stylesheet" type="text/css" href="laliga.css">
</head>
<body>
   <header>
    <div class="header-container">
        <a href="index.php"><img src="image/50.JPG" alt="TOP ATHLETE" class="logo"></a>
        <div class="search-container">
<form action="recherche.php" method="get" class="search-form">
                <input type="text" name="query" class="search-bar" placeholder="Rechercher un produit..." required>
                <button type="submit" class="search-button">Rechercher</button>
            </form>        </div>
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

    <div class="products-container" id="barca-section">
        <div class="product">
            <img src="image/28.JPG" alt="Maillot Barcelone">
            <div class="product-info">
                <p>Maillot Barcelone 2024/25</p>
                <p>Domicile</p>
                <p>40€</p>
                 <button class="ajouter"> ajouter au panier  </button>
                                                                   <button class="favoris"><i class="fas fa-heart"></i></button>

            </div>
        </div>
        <div class="product">
            <img src="image/29.JPG" alt="Maillot Barcelone">
            <div class="product-info">
                <p>Maillot Barcelone 2024/25</p>
                <p>Extérieur</p>
                <p>40€</p>
                 <button class="ajouter"> ajouter au panier  </button>
                                                                   <button class="favoris"><i class="fas fa-heart"></i></button>

            </div>
        </div>
        <div class="product">
            <img src="image/30.JPG" alt="Maillot Barcelone">
            <div class="product-info">
                <p>Maillot Barcelone 2024/25</p>
                <p>Third</p>
                <p>40€</p>
                 <button class="ajouter"> ajouter au panier  </button>
                                                                   <button class="favoris"><i class="fas fa-heart"></i></button>

            </div>
        </div>
    </div>    

    <div class="products-container" id="real-section">
        <div class="product">
            <img src="image/31.JPG" alt="Maillot Real Madrid">
            <div class="product-info">
                <p>Maillot Real Madrid 2024/25</p>
                <p>Domicile</p>
                <p>50€</p>
                 <button class="ajouter"> ajouter au panier  </button>
                                                                   <button class="favoris"><i class="fas fa-heart"></i></button>

            </div>
        </div>
        <div class="product">
            <img src="image/32.JPG" alt="Maillot Real Madrid">
            <div class="product-info">
                <p>Maillot Real Madrid 2024/25</p>
                <p>Extérieur</p>
                <p>50€</p>
                 <button class="ajouter"> ajouter au panier  </button>
                                                                   <button class="favoris"><i class="fas fa-heart"></i></button>

            </div>
        </div>
        <div class="product">
            <img src="image/33.JPG" alt="Maillot Real Madrid">
            <div class="product-info">
                <p>Maillot Real Madrid 2024/25</p>
                <p>Third</p>
                <p>50€</p>
                 <button class="ajouter"> ajouter au panier  </button>
                                                                   <button class="favoris"><i class="fas fa-heart"></i></button>

            </div>
        </div>
    </div>

    <div class="products-container" id="atletico-section">
        <div class="product">
            <img src="image/34.JPG" alt="Maillot Atletico Madrid">
            <div class="product-info">
                <p>Maillot Atletico Madrid 2024/25</p>
                <p>Domicile</p>
                <p>45€</p>
                 <button class="ajouter"> ajouter au panier  </button>
                                                                   <button class="favoris"><i class="fas fa-heart"></i></button>

            </div>
         </div>
        <div class="product">
            <img src="image/35.JPG" alt="Maillot Atletico Madrid">
            <div class="product-info">
                <p>Maillot Atletico Madrid 2024/25</p>
                <p>Extérieur</p>
                <p>45€</p>
                 <button class="ajouter"> ajouter au panier  </button>
                                                                   <button class="favoris"><i class="fas fa-heart"></i></button>

            </div>
        </div>
        <div class="product">
            <img src="image/36.JPG" alt="Maillot Atletico Madrid">
            <div class="product-info">
                <p>Maillot Atletico Madrid 2024/25</p>
                <p>Third</p>
                <p>45€</p>
                 <button class="ajouter"> ajouter au panier  </button>
                                                                   <button class="favoris"><i class="fas fa-heart"></i></button>

            </div>
        </div>
    </div>

    <footer>
        <div class="footer-container">
            <div class="footer-section">
                <h4>A propos de nous </h4>
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

    <!-- JavaScript pour les favoris  -->

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
