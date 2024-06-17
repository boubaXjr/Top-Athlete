<?php
include 'include/db_connect.php'; // Incluez votre fichier de connexion à la base de données
session_start();

// Vérifie si l'utilisateur est déjà connecté, redirigez-le vers le tableau de bord
if (isset($_SESSION['admin'])) {
    header("Location: dashboard.php");
    exit();
}

// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Préparez la requête SQL pour vérifier les informations de connexion
    $sql = "SELECT _ID_Administrateur, NomUtilisateur, _Email, Nom, Prénom FROM Administrateur_ WHERE _Email = ? AND _Mot_De_Passe = ?";
    $stmt = $con->prepare($sql);

    if ($stmt) {
        // Liaison des paramètres et exécution de la requête
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();

        // Récupération des résultats
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            // Authentification réussie, démarrer la session et rediriger vers le tableau de bord
            $_SESSION['admin'] = $email;
            header("Location: dashboard.php");
            exit();
        } else {
            // Authentification échouée
            $error = "Identifiant ou mot de passe incorrect.";
        }

        // Fermeture de la requête préparée
        $stmt->close();
    } else {
        // Gestion de l'erreur si la préparation de la requête a échoué
        $error = "Erreur lors de la préparation de la requête : " . $con->error;
    }
}

// Inclure votre fichier d'en-tête, de pied de page et de toute autre mise en page nécessaire
include 'include/header.php'; // Assurez-vous d'avoir un fichier header.php dans votre dossier include
?>

<div class="container">
    <h2>Connexion Administrateur</h2>
    <?php
    // Afficher les erreurs éventuelles
    if (isset($error)) {
        echo '<p>' . $error . '</p>';
    }
    ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Mot de passe:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit">Se connecter</button>
    </form>
</div>

<?php include 'include/footer.php'; // Assurez-vous d'avoir un fichier footer.php dans votre dossier include ?>
