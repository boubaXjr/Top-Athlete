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
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Sign Up</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="pagecompte.css">
</head>
<body>
    <div class="wrapper">
        <header>
           <nav class="navbar navbar-expand-lg navbar-light bg-primary">
                <a class="navbar-brand text-white" href="index.php">
                    <img src="image/50.JPG" alt="TOP ATHLETE" class="logo">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">

                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="contact.php">Contact</a>
                        </li>
                        <?php
                        if (isset($_SESSION['email'])) {
                            echo '<li class="nav-item"><a class="nav-link text-white" href="logout.php">Déconnexion</a></li>';
                        } else {
                            echo '<li class="nav-item"><a class="nav-link text-white" href="pagecompte.php">Compte</a></li>';
                        }
                        ?>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="panier.php">Panier <span id="cart-count" class="badge badge-light">0</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="favoris.php">Favoris</a>
                        </li>
                    </ul>
                </div>
            </nav>
            
        </header>
    </div>

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

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="pagecompte.js"></script>
</body>
</html>
