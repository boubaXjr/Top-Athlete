<?php
session_start();

// Vérifie si l'utilisateur est connecté, sinon redirige vers la page de connexion
if (!isset($_SESSION['user_id'])) {
    header("Location: pagecompte.php");
    exit();
}

// Connexion à la base de données
$conn = new mysqli('localhost', 'root', 'toor', 'maillot_nouvelle');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Récupère les informations de l'utilisateur connecté
$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT * FROM client WHERE id_client = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Compte</title>
    <link rel="stylesheet" href="userpage.css">
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
                    <li class="user-menu">
                        <a href="userpage.php" class="les3">Compte</a>
                        <div class="dropdown-menu">
                            <p>Bonjour, <?php echo $user['prenom']; ?></p>
                            <a href="mon_compte.php">Mon Compte</a>
                            <a href="suivre_commande.php">Suivre ma commande</a>
                            <a href="liste_envies.php">Liste d’envies</a>
                            <form action="deconnexion.php" method="post">
                                <button type="submit" name="logout">Se Déconnecter</button>
                            </form>
                        </div>
                    </li>
                    <li><a href="panier.php" class="cart les3">Panier <span id="cart-count">0</span></a></li>
                    <li><a href="favoris.php" class="les3">Favoris</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="user-container">
        <aside class="user-sidebar">
            <h2>Bonjour, <?php echo $user['prenom']; ?> <?php echo $user['nom']; ?></h2>
            <ul>
                <li><a href="#">Informations</a></li>
                <li><a href="#">Ajouter une première adresse</a></li>
                <li><a href="#">Mes commandes</a></li>
                <li><a href="#">Retours produit</a></li>
                <li><a href="#">Avoirs</a></li>
                <li><a href="#">Bons de réduction</a></li>
                <li><a href="#">Données personnelles</a></li>
                <li><a href="#">Cartes sauvegardées</a></li>
                <li>
                    <form action="deconnexion.php" method="post">
                        <button type="submit" name="logout">Déconnexion</button>
                    </form>
                </li>
            </ul>
        </aside>
        <main class="user-main">
            <h1>Mon Compte</h1>
            <p>Bienvenue sur votre page de compte. Ici, vous pouvez gérer toutes vos informations et commandes.</p>
            <!-- Ajoutez ici le contenu de votre page de compte -->
        </main>
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
</body>
</html>
