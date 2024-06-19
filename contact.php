
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - Top Athlete</title>
    <link rel="stylesheet" type="text/css" href="contact.css">
    
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
    <main>
        <section class="contact-container">
            <section class="contact-form">
                <h2>Contactez-nous</h2>
                <form action="#" method="post">
                    
                    <label for="subject">Sujet</label>
                    <select id="subject" name="subject" required>
                      <option value="">Sélectionnez un sujet</option>
                      <option value="service-client">Service client</option>
                      <option value="autre">Autre</option>
                    </select>
                    <br>
                    <br>

                    <label for="attachment">Document Joint</label>
                    <input type="file" id="attachment" name="attachment">

                    <label for="message">Message</label>
                    <textarea id="message" name="message" rows="4" placeholder="Comment pouvons-nous vous aider ?" required></textarea>

                    <div class="form-check">
                        <input type="checkbox" id="terms" name="terms" required>
                        <label for="terms">J'accepte les conditions générales et la politique de confidentialité</label>
                    </div>

                    <button type="submit">Envoyer</button>
                </form>
            </section>
            <section class="contact-info">
                <h2>Nous contacter</h2>
                <p>Email: support@topathlete.com</p>
                <p>Téléphone: +123 456 7890</p>
                <p>Adresse: 123 Rue du Sport, Paris, France</p>
                <div>
                     <a href="https://www.instagram.com/bouba_126/"><img src="image/insta_img.jpg" class="imge"></a>
                     <a href="https://github.com/boubaXjr"><img src="image/github_img.png" class="imge"></a>
                     <a href="https://www.facebook.com/?locale=fr_FR"><img src="image/facebook_img.png" class="imge"></a>
                </div>
        
                </div>
            </section>
        </section>
    </main>

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
    </footer>

    <script src="contact.j"></script>


</body>
</html>