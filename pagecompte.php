<?php
$servername = "localhost";
$username = "root";
$password = "mamadou";
$dbname = "maillot_nouvelle";

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion a échoué: " . $conn->connect_error);
}

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM client WHERE mail = '$email' AND mot_de_passe = '$password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $_SESSION['email'] = $email;
            header("Location: index.php");
            exit();
        } else {
            echo "Email ou mot de passe incorrect.";
        }
    }

    if (isset($_POST['signup'])) {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "INSERT INTO client (nom, prenom, mail, mot_de_passe) VALUES ('$nom', '$prenom', '$email', '$password')";

        if ($conn->query($sql) === TRUE) {
            echo "Inscription réussie. Vous pouvez maintenant vous connecter.";
            header("Location: index.php");
            exit();
        } else {
            echo "Erreur: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Sign Up</title>
    <link rel="stylesheet" href="pagecompte.css">
</head>
<body>

<!-- Affichage des messages d'erreur -->
<?php if (isset($error_message)): ?>
    <p class="error-message"><?php echo $error_message; ?></p>
<?php endif; ?>

<header>
    <div class="header-container">
        <a href="index.php"><img src="image/50.JPG" alt="TOP ATHLETE" class="logo"></a>
        <div class="search-container">
            <input type="text" placeholder="Recherche" class="search-bar">
        </div>
        <nav>
            <ul>
                <li><a href="contact.php" class="les3">Contact</a></li>
                <li class="user-menu">
                    <a href="userpage.php" class="les3">Compte</a>
                        <div class="dropdown-menu">
                            <?php if (isset($_SESSION['user_id'])): ?>
                                <p>Bonjour, <?php echo $_SESSION['prenom']; ?></p>
                                <a href="mon_compte.php">Mon Compte</a>
                                <a href="suivre_commande.php">Suivre ma commande</a>
                                <a href="liste_envies.php">Liste d’envies</a>
                                <form action="deconnexion.php" method="post">
                                    <button type="submit" name="logout">Se Déconnecter</button>
                                </form>
                            <?php else: ?>
                                <p>SE CONNECTER / S’INSCRIRE</p>
                                <a href="pagecompte.php">Se Connecter</a>
                                <a href="pagecompte.php">S’inscrire</a>
                            <?php endif; ?>
                        </div>                  
                </li>
                <li><a href="panier.php" class="cart les3">Panier <span id="cart-count">0</span></a></li>
                <li><a href="favoris.php" class="les3">Favoris</a></li>
            </ul>
        </nav>
    </div>
</header>

<div class="container">
    <div class="form-container sign-in-container">
        <form method="POST" action="#">
            <h1>Se Connecter</h1>
            <input type="email" name="email" placeholder="Email" required />
            <input type="password" name="password" placeholder="Mot de passe" required />
            <button type="submit" name="login">Se Connecter</button>
        </form>
    </div>
    <div class="form-container sign-up-container">
        <form method="POST" action="#">
            <h1>Créez un Compte!</h1>
            <input type="text" name="nom" placeholder="Nom" required />
            <input type="text" name="prenom" placeholder="Prénom" required />
            <input type="email" name="email" placeholder="Email" required />
            <input type="password" name="password" placeholder="Mot de passe" required />
            <input type="password" placeholder="Répétez le mot de passe" required />
            <button type="submit" name="signup">S'inscrire</button>
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
