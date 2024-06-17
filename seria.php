
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>seria Jerseys</title>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link rel="stylesheet" type="text/css" href="seria.css">
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

    <!--  AC milan Section -->
    <div class="products-container" id="psg-section">
        <div class="product">
            <img src="image/milan 1.JPG" alt="Maillot AC milan">
            <div class="product-info">
                <p>Maillot AC milan 2024/25</p>
                <p>Domicile</p>
                <p>40€</p>
                 <button class="ajouter"> ajouter au panier  </button>
                                                                   <button class="favoris"><i class="fas fa-heart"></i></button>

            </div>
        </div>
        <div class="product">
            <img src="image/milan 2.JPG." alt="Maillot PSG">
            <div class="product-info">
                <p>Maillot PSG 2024/25</p>
                <p>Extérieur</p>
                <p>40€</p>
                 <button class="ajouter"> ajouter au panier  </button>
                                                                   <button class="favoris"><i class="fas fa-heart"></i></button>

            </div>
        </div>
        <div class="product">
            <img src="image/milan 3.JPG" alt="Maillot AC milan">
            <div class="product-info">
                <p>Maillot AC milan 2024/25</p>
                <p>Third</p>
                <p>40€</p>
                 <button class="ajouter"> ajouter au panier  </button>
                                                                   <button class="favoris"><i class="fas fa-heart"></i></button>

            </div>
        </div>
    </div>

    <!-- Juventus Section -->
    <div class="products-container" id="marseille-section" >
        <div class="product">
            <img src="image/Juventus_1.JPEG" alt="Maillot Juventus">
            <div class="product-info">
                <p>Maillot Juventus 2024/25</p>
                <p>Domicile</p>
                <p>50€</p>
                 <button class="ajouter"> ajouter au panier  </button>
                                                                   <button class="favoris"><i class="fas fa-heart"></i></button>

            </div>
        </div>
        <div class="product">
            <img src="image/Juventus_rose.JPEG" alt="Maillot Juventus">
            <div class="product-info">
                <p>Maillot Juventus 2024/25</p>
                <p>Extérieur</p>
                <p>50€</p>
                 <button class="ajouter"> ajouter au panier  </button>
                                                                   <button class="favoris"><i class="fas fa-heart"></i></button>

            </div>
        </div>
        <div class="product">
            <img src="image/Juventus_noire.JPEG" alt="Maillot Juventus">
            <div class="product-info">
                <p>Maillot Juventus 2024/25</p>
                <p>Third</p>
                <p>50€</p>
                 <button class="ajouter"> ajouter au panier  </button>
                                                                   <button class="favoris"><i class="fas fa-heart"></i></button>

            </div>
        </div>
    </div>

    <!-- Inter milan -->
    <div class="products-container" id="lyon-section">
        <div class="product">
            <img src="image/internoireblanc.JPEG" alt="Maillot Inter milan">
            <div class="product-info">
                <p>Maillot Inter milan 2024/25</p>
                <p>Domicile</p>
                <p>45€</p>
                 <button class="ajouter"> ajouter au panier  </button>
                                                                   <button class="favoris"><i class="fas fa-heart"></i></button>

            </div>
        </div>
        <div class="product">
            <img src="image/interblanc.JPEG" alt="Maillot Inter milan">
            <div class="product-info">
                <p>Maillot Inter milan 2024/25</p>
                <p>Extérieur</p>
                <p>45€</p>
                 <button class="ajouter"> ajouter au panier  </button>
                                                                   <button class="favoris"><i class="fas fa-heart"></i></button>

            </div>
        </div>
        <div class="product">
            <img src="image/interbleu.JPEG" alt="Maillot Inter milan">
            <div class="product-info">
                <p>Maillot Inter milan 2024/25</p>
                <p>Third</p>
                <p>45€</p>
                 <button class="ajouter"> ajouter au panier  </button>
                                                                   <button class="favoris"><i class="fas fa-heart"></i></button>

            </div>
        </div>
    </div>

    <!-- Napoli Section -->
    <div class="products-container" id="lile-section">
        <div class="product">
            <img src="image/napoli_blanc.JPEG" alt="Napoli">
            <div class="product-info">
                <p>Maillot Napoli 2024/25</p>
                <p>Domicile</p>
                <p>40€</p>
                 <button class="ajouter"> ajouter au panier  </button>
                                                                   <button class="favoris"><i class="fas fa-heart"></i></button>

            </div>
        </div>
        <div class="product">
            <img src="image/napoli_bleu.JPEG" alt="Maillot Napoli">
            <div class="product-info">
                <p>Maillot Napoli 2024/25</p>
                <p>Extérieur</p>
                <p>40€</p>
                 <button class="ajouter"> ajouter au panier  </button>
                                                                   <button class="favoris"><i class="fas fa-heart"></i></button>

            </div>
        </div>
        <div class="product">
            <img src="image/napoli_noire.JPEG" alt="Maillot Lille">
            <div class="product-info">
                <p>Maillot v 2024/25</p>
                <p>Third</p>
                <p>40€</p>
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