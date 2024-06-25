<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - Top Athlete</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="contact.css">
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <a class="navbar-brand text-white" href="index.php">
            <img src="image/50.JPG" alt="TOP ATHLETE" class="logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <form class="form-inline my-2 my-lg-0 mx-auto" action="contact.php" method="GET">
                <input class="form-control mr-sm-2" type="search" placeholder="Recherche" name="query" aria-label="Search">
                <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Recherche</button>
            </form>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link text-white" href="contact.php">Contact</a>
                </li>
                <?php
                session_start();
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

<div class="container mt-4">
    <div class="leagues">
        <!-- Leagues content remains unchanged -->
    </div>
</div>

<?php
// PHP code for handling search queries and displaying results
?>

<main>
    <section class="contact-container container mt-4">
        <section class="contact-form">
            <h2>Contactez-nous</h2>
            <form action="contact.php" method="post" enctype="multipart/form-data">
                <label for="subject">Sujet</label>
                <select id="subject" name="subject" class="form-control" required>
                    <option value="">Sélectionnez un sujet</option>
                    <option value="service-client">Service client</option>
                    <option value="autre">Autre</option>
                </select>
                <br>

                <label for="attachment">Document Joint</label>
                <input type="file" id="attachment" name="attachment" class="form-control">

                <label for="message">Message</label>
                <textarea id="message" name="message" rows="4" class="form-control" placeholder="Comment pouvons-nous vous aider ?" required></textarea>

                <div class="form-check mt-2">
                    <input type="checkbox" id="terms" name="terms" class="form-check-input" required>
                    <label for="terms" class="form-check-label">J'accepte les conditions générales et la politique de confidentialité</label>
                </div>

                <button type="submit" class="btn btn-primary mt-2">Envoyer</button>
            </form>
        </section>
        <section class="contact-info mt-4">
            <h2>Nous contacter</h2>
            <p>Email: support@topathlete.com</p>
            <p>Téléphone: +123 456 7890</p>
            <p>Adresse: 123 Rue du Sport, Paris, France</p>
            <div>
                <a href="https://www.instagram.com/bouba_126/"><img src="image/insta_img.jpg" class="imge"></a>
                <a href="https://github.com/boubaXjr"><img src="image/github_img.png" class="imge"></a>
                <a href="https://www.facebook.com/?locale=fr_FR"><img src="image/facebook_img.png" class="imge"></a>
            </div>
        </section>
    </section>
</main>

<footer class="footerX bg-primary text-white mt-5">
    <div class="footer-container container py-4">
        <div class="row">
            <div class="col-md-4 footer-section">
                <h4>A propos de nous</h4>
                <p>Votre boutique unique pour les maillots de football officiels. Qualité garantie.</p>
            </div>
            <div class="col-md-4 footer-section">
                <h4>Contactez nous</h4>
                <p>Email: support@footballmezaour.com</p>
                <p>Phone: +123 456 7890</p>
            </div>
            <div class="col-md-4 footer-section">
                <h4>Suivez nous sur :</h4>
                <a href="#" class="text-white">Facebook</a><br>
                <a href="#" class="text-white">Twitter</a><br>
                <a href="#" class="text-white">Instagram</a>
            </div>
        </div>
    </div>
    <div class="footer-bottom text-center py-3">
        <p>&copy; 2024 Football Jersey Shop. Tous droits réservés.</p>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="contact.js"></script>
</body>
</html>
