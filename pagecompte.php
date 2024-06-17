<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Sign Up</title>
    <link rel="stylesheet" href="pagecompte.css">
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

    </header>

    <div class="container">
        <div class="form-container sign-in-container">
            <form action="#">
                <h1>Se Connecter</h1>
                <input type="email" placeholder="Email" required />
                <input type="password" placeholder="Mot de passe" required />
                <button>Se Connecter</button>
            </form>
        </div>
        <div class="form-container sign-up-container">
            <form action="#">
                <h1>Créez un Compte!</h1>
                <input type="text" placeholder="Nom" required />
                <input type="text" placeholder="Prénom" required />
                <input type="email" placeholder="Email" required />
                <input type="password" placeholder="Mot de passe" required />
                <input type="password" placeholder="Répétez le mot de passe" required />
                <button>S'inscrire</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Content de vous revoir!</h1>
                    <p>Pour rester connecté, veuillez entrer vos informations personnelles</p>
                    <button class="ghost" id="signIn">Se Connecter</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Bienvenue!</h1>
                    <p>Entrez vos informations personnelles et commencez votre voyage avec nous</p>
                    <button class="ghost" id="signUp">S'inscrire</button>
                </div>
            </div>
        </div>
    </div>

    <footer class="footerX">
        <div class="footer-container">
            <div class="footer-section">
                <h4>About Us</h4>
                <p>Votre boutique unique pour les maillots de football officiels. Qualité garantie.</p>
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
            <p>&copy; 2024 Football Jersey Shop. tout droit reservés .</p>
        </div>
    </footer>

    <script src="pagecompte.js"></script>
</body>
</html>