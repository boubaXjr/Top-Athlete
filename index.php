<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top Athlete</title>
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="monsiteweb.css">
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

<!-- Carrousel d'images -->
    <div class="carousel">
        <button class="prev" onclick="moveSlide(-1)">&#10094;</button>
        <div class="carousel-images">
            <img src="image/38.JPG" alt="Image 1" class="carousel-image">
            <img src="image/39.JPG" alt="Image 2" class="carousel-image">
            <img src="image/40.JPG" alt="Image 3" class="carousel-image">
            <img src="image/41.JPG" alt="Image 4" class="carousel-image">
            <img src="image/42.JPG" alt="Image 5" class="carousel-image">
            <img src="image/43.JPG" alt="Image 6" class="carousel-image">
        </div>
        <button class="next" onclick="moveSlide(1)">&#10095;</button>
    </div>

    <!---les images pour faire genre  ---> 
 </div>
        <div class="info-section">
            <h1> CE QUE NOUS FAISONS</h1>
            <div class="features">
                <div class="feature">
                    <img src="image/51.PNG" alt="Livraison en 24H">
                    <p>LIVRAISON GRATUITE</p>
                </div>
                <div class="feature">
                    <img src="image/52.PNG" alt="Satisfaction client">
                    <p>NOS SOMME LA POUR VOUS SATISFAIRE</p>
                </div>
                <div class="feature">
                    <img src="image/53.PNG" alt="Contact">
                    <p><a href="contact.php" class="les3">CONTACTER NOUS </a></p>
                </div>
            </div>
        </div>
    </div>

<!-- top ventes -->
 <main>
        <section class="top vente">
            <h2>NOS TOP VENTES</h2>
            <div class="products-container" id="bayern-section">
                <div class="product">
                    <img src="image/16.JPG" alt="Maillot Bayern Munich">
                    <div class="product-info">
                        <p>Maillot Bayern Munich 2024/25</p>
                        <p>Domicile</p>
                        <p>40€</p>
                        <button class="ajouter">Ajouter au panier</button>
                                                                         <button class="favoris"><i class="fas fa-heart"></i></button>

                    </div>
                </div>
                <div class="product">
            <img src="image/19.JPG" alt="Maillot Dortmund">
            <div class="product">
                <p>Maillot Dortmund 2024/25</p>
                <p>Domicile</p>
                <p>50€</p>
                 <button class="ajouter"> ajouter au panier  </button>
                                                                  <button class="favoris"><i class="fas fa-heart"></i></button>

            </div>
        </div>
                <div class="product">
                    <img src="image/28.JPG" alt="Maillot Barcelone">
                    <div class="product-info">
                        <p>Maillot Barcelone 2024/25</p>
                        <p>Domicile</p>
                        <p>40€</p>
                        <button class="ajouter">Ajouter au panier</button>
                                                                         <button class="favoris"><i class="fas fa-heart"></i></button>

                    </div>
                </div>
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
                    <img src="image/maillot_psg-bege.JPEG" alt="Maillot PSG">
                    <div class="product-info">
                        <p>Maillot PSG 2024/25</p>
                        <p>Domicile</p>
                        <p>40€</p>
                        <button class="ajouter">Ajouter au panier</button>
                                                                         <button class="favoris"><i class="fas fa-heart"></i></button>

                    </div>
                </div>
                     <div class="product">
            <img src="image/maillot_marseille_blanc1.JPEG" alt="Maillot Marseille">
            <div class="product-info">
                <p>Maillot Marseille 2024/25</p>
                <p>Extérieur</p>
                <p>50€</p>
                 <button class="ajouter"> ajouter au panier  </button>
                                                                  <button class="favoris"><i class="fas fa-heart"></i></button>

            </div>
        </div>
                <div class="product">
                    <img src="image/arsenal 3.JPG" alt="Maillot Arsenal">
                     <div class="product-info">
                        <p>Maillot Arsenal 2024/25</p>
                        <p>Third</p>
                        <p>50€</p>
                        <button class="ajouter">Ajouter au panier</button>
                                                                         <button class="favoris"><i class="fas fa-heart"></i></button>

                    </div>
                </div>
                <div class="product">
            <img src="image/2.JPG" alt="Maillot Manchester City">
            <div class="product-info">
                <p>Maillot Manchester City 2024/25</p>
                <p>Extérieur</p>
                <p>40€</p>
                 <button class="ajouter"> ajouter au panier  </button>
                                                                  <button class="favoris"><i class="fas fa-heart"></i></button>

            </div>
        </div>
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
            <img src="image/internoireblanc.JPEG" alt="Maillot Inter milan">
            <div class="product-info">
                <p>Maillot Inter milan 2024/25</p>
                <p>Domicile</p>
                <p>45€</p>
                 <button class="ajouter"> ajouter au panier  </button>
                                                                  <button class="favoris"><i class="fas fa-heart"></i></button>

            </div>
        </div>
            </div>

        </section>
    </main>

<main>
                <h1>TOP ATHLETE </h1>
    <section id="about-us"class="about-us">
        <div class="about-content">
            <div class="about-image">
                <img src="image/45.JPG" alt="Image 1">
            </div>
            <div class="about-text">
                <h3>HISTORIQUE</h3>
                <p>
                    <strong>Top Athlete</strong>, fondé en 2015, est le leader français de la vente en ligne de maillots de football. Avec plus de 15 000 références en stock, nous vous garantissons de trouver le maillot de votre équipe favorite, ainsi que des équipements comme chaussures, protège-tibias et survêtements, le tout aux meilleurs prix. Nous recevons quotidiennement des nouveaux produits, alors n'hésitez pas à revenir régulièrement pour découvrir les dernières nouveautés !
                </p>
            </div>
        </div>
        
        <div class="about-content">
            <div class="about-image">
                <img src="image/46.JPG" alt="Image 2">
            </div>
            <div class="about-text">
                <h3>NOTRE BOUTIQUE</h3>
                <p>
                    Nous offrons une large gamme de maillots officiels des plus grands clubs français comme le Paris Saint-Germain, l'Olympique de Marseille, l'Olympique Lyonnais, ainsi que des clubs internationaux tels que le FC Barcelone, le Real Madrid, Chelsea et Manchester United. Chaque maillot est sous licence officielle, assurant une qualité irréprochable.
                </p>
            </div>
        </div>
        
        <div class="about-content">
            <div class="about-image">
                <img src="image/49.JPG" alt="Image 4">
            </div>
            <div class="about-text">
                <h3>Livraison gratuite en 24h</h3>
                <p>
                    Pour toute commande de plus de 100€. Passez votre commande avant 15h et recevez-la le lendemain. Nous proposons également des options de livraison rapide avec Colissimo et Chronopost. Pour les commandes inférieures à 100€, les frais de port sont de seulement 5€.
                </p>
            </div>
        </div>
    </section>
</main>

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
    
<!-- JavaScript pour le carrousel -->
    <script>
       let slideIndex = 0;

function showSlides() {
    const slides = document.getElementsByClassName("carousel-image");
    for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}    
    slides[slideIndex-1].style.display = "block";  
    setTimeout(showSlides, 3000);
}

function moveSlide(n) {
    showSlides(slideIndex += n);
}

showSlides();

    </script>

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
