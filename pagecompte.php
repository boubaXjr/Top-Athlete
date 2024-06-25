<?php
session_start();

// Connexion à la base de données
$conn = new mysqli('localhost', 'root', 'toor', 'maillot_nouvelle');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$error_message = ""; // Déclaration de la variable d'erreur pour éviter les erreurs d'initialisation

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Gestion de l'inscription
    if (isset($_POST['signUp'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];

        if ($password === $confirm_password) {
            $stmt = $conn->prepare("SELECT * FROM client WHERE mail = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows == 0) {
                $stmt = $conn->prepare("INSERT INTO client (mail, mot_de_passe, nom, prenom) VALUES (?, ?, ?, ?)");
                $stmt->bind_param("ssss", $email, $password, $nom, $prenom);
                if ($stmt->execute()) {
                    $_SESSION['user_id'] = $conn->insert_id; // Stocker l'ID utilisateur dans la session
                    $_SESSION['prenom'] = $prenom; // Stocker le prénom dans la session
                    header("Location: userpage.php");
                    exit();
                } else {
                    $error_message = "Error: " . $stmt->error;
                }
            } else {
                $error_message = "Email déjà utilisé";
            }
        } else {
            $error_message = "Les mots de passe ne correspondent pas";
        }
    }

    // Gestion de la connexion
    if (isset($_POST['signIn'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $stmt = $conn->prepare("SELECT * FROM client WHERE mail = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if ($password === $user['mot_de_passe']) {
                $_SESSION['user_id'] = $user['id_client'];
                $_SESSION['prenom'] = $user['prenom'];
                header("Location: userpage.php");
                exit();
            } else {
                $error_message = "Identifiants de connexion invalides";
            }
        } else {
            $error_message = "Identifiants de connexion invalides";
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
    <!-- Formulaire de connexion -->
    <div class="form-container sign-in-container">
        <form action="pagecompte.php" method="post">
            <h1>Se Connecter</h1>
            <input type="email" name="email" placeholder="Email" required />
            <input type="password" name="password" placeholder="Mot de passe" required />
            <button type="submit" name="signIn">Se Connecter</button>
        </form>
    </div>
    <!-- Formulaire d'inscription -->
    <div class="form-container sign-up-container">
        <form action="pagecompte.php" method="post">
            <h1>Créer un Compte!</h1>
            <input type="text" name="nom" placeholder="Nom" required />
            <input type="text" name="prenom" placeholder="Prénom" required />
            <input type="email" name="email" placeholder="Email" required />
            <input type="password" name="password" placeholder="Mot de passe" required />
            <input type="password" name="confirm_password" placeholder="Répétez le mot de passe" required />
            <button type="submit" name="signUp">S'inscrire</button>
        </form>
    </div>
    <!-- Conteneur pour l'effet d'overlay entre les formulaires -->
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
