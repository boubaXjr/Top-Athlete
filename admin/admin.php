<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include('include/function.php');
check_login();

include('include/db_connect.php');

// Variables pour les messages
$message = '';
$error = '';

// Fonction pour nettoyer les données entrées
function clean_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

// Vérifier si une action d'ajout ou d'édition est demandée
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom_utilisateur = clean_input($_POST['nom_utilisateur']);
    $mot_de_passe = clean_input($_POST['mot_de_passe']);
    $email = clean_input($_POST['email']);
    $nom = clean_input($_POST['nom']);
    $prenom = clean_input($_POST['prenom']);
    
    if (isset($_GET['edit_id'])) {
        $edit_id = intval($_GET['edit_id']);
        $query = "UPDATE administrateur SET nom_utilisateur=?, mot_de_passe=?, email=?, nom=?, prenom=? WHERE id_administrateur=?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('sssssi', $nom_utilisateur, $mot_de_passe, $email, $nom, $prenom, $edit_id);

        if ($stmt->execute()) {
            $message = "Profil mis à jour avec succès.";
            header("Location: admin.php");
            exit;
        } else {
            $error = "Erreur lors de la mise à jour du profil.";
        }

        $stmt->close();
    } else {
        $query = "INSERT INTO administrateur (nom_utilisateur, mot_de_passe, email, nom, prenom) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('sssss', $nom_utilisateur, $mot_de_passe, $email, $nom, $prenom);

        if ($stmt->execute()) {
            $message = "Nouvel administrateur ajouté avec succès.";
            header("Location: admin.php");
            exit;
        } else {
            $error = "Erreur lors de l'ajout du nouvel administrateur.";
        }

        $stmt->close();
    }
}

// Vérifier si une action de suppression est demandée
if (isset($_GET['delete_id'])) {
    $delete_id = intval($_GET['delete_id']);
    
    $query = "DELETE FROM administrateur WHERE id_administrateur=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $delete_id);

    if ($stmt->execute()) {
        $message = "Administrateur supprimé avec succès.";
        header("Location: admin.php");
        exit;
    } else {
        $error = "Erreur lors de la suppression de l'administrateur.";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des administrateurs</title>
    <!-- Intégration de Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
          <style>
        .navbar-nav .nav-item .nav-link {
            color: white;
        }
        .bg-primary {
            background-color: #0033cc !important;
        }


        .navbar-nav .nav-item .nav-link {
            color: white;
            font-size: 1.2em; /* Augmente la taille de la police */
        }
        .navbar {
            justify-content: center; /* Centrer les éléments de navigation */
        }
        .bg-primary {
            background-color: #0033cc !important;
        }
        .content {
            margin-top: 20px;
            padding-bottom: 100px; /* Ajouter un espacement au bas */
        }

        .footer {
            background-color: #0033cc;
            color: white;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            width: 100%;
            bottom: 0;
        }

        .welcome-section {
            padding: 40px 20px;
            text-align: center;
            background-color: #f5f5f5;
        }

        .welcome-section h1 {
            font-size: 2.5em;
            margin-bottom: 20px;
        }

        .welcome-section p {
            font-size: 1.2em;
            margin-bottom: 30px;
        }

        .admin-card {
            margin: 20px 0;
        }
    </style>
</head>
<body>
<header class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="dashboard.php"><img src="../image/50.JPG" alt="Logo" height="40"></a>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a class="nav-link" href="product.php">Produits</a></li>
                                    <li class="nav-item"><a class="nav-link" href="admin.php">Admin</a></li>

            <li class="nav-item"><a class="nav-link" href="order.php">Commandes</a></li>
            <li class="nav-item"><a class="nav-link" href="user.php">Utilisateurs</a></li>
            <li class="nav-item"><a class="nav-link" href="logout.php">deconnexion</a></li>
        </ul>
    </div>
</header>

    <div class="welcome-section">
        <h1>Bienvenue dans la gestion des administrateurs</h1>
        <p>Gérez les administrateurs de votre site efficacement. Vous pouvez ajouter, modifier ou supprimer des administrateurs.</p>
        <a href="admin.php?add_new=true" class="btn btn-primary btn-lg">Ajouter un nouvel administrateur</a>
    </div>

    <div class="container content">
        <h1 class="text-center text-primary">Liste des administrateurs</h1>

        <?php if ($message): ?>
            <div class="alert alert-success text-center"><?= $message ?></div>
        <?php endif; ?>

        <?php if ($error): ?>
            <div class="alert alert-danger text-center"><?= $error ?></div>
        <?php endif; ?>

        <?php
        $query = "SELECT id_administrateur, nom_utilisateur, email, nom, prenom FROM administrateur";
        $result = mysqli_query($conn, $query);

        if (!$result) {
            die("Erreur lors de la récupération des administrateurs: " . mysqli_error($conn));
        }
        ?>

        <div class="row">
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <div class="col-md-4">
                    <div class="card admin-card">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($row['nom_utilisateur']) ?></h5>
                            <p class="card-text">
                                <strong>Email:</strong> <?= htmlspecialchars($row['email']) ?><br>
                                <strong>Nom:</strong> <?= htmlspecialchars($row['nom']) ?><br>
                                <strong>Prénom:</strong> <?= htmlspecialchars($row['prenom']) ?>
                            </p>
                            <a href="admin.php?edit_id=<?= $row['id_administrateur'] ?>" class="btn btn-warning">Modifier</a>
                            <a href="admin.php?delete_id=<?= $row['id_administrateur'] ?>" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet administrateur ?');">Supprimer</a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>

        <?php
        mysqli_free_result($result);
        mysqli_close($conn);
        ?>

        <?php if (isset($_GET['edit_id']) || isset($_GET['add_new'])): ?>
            <h2 class="text-center text-primary"><?= isset($_GET['edit_id']) ? 'Modifier le profil' : 'Ajouter un nouvel administrateur' ?></h2>
            <form method="post" action="<?= isset($_GET['edit_id']) ? 'admin.php?edit_id=' . $edit_id : 'admin.php' ?>" class="mb-4">
                <div class="form-group">
                    <label for="nom_utilisateur">Nom d'utilisateur:</label>
                    <input type="text" name="nom_utilisateur" id="nom_utilisateur" class="form-control" value="<?= isset($nom_utilisateur) ? htmlspecialchars($nom_utilisateur) : '' ?>" required>
                </div>
                <div class="form-group">
                    <label for="mot_de_passe">Mot de passe:</label>
                    <input type="password" name="mot_de_passe" id="mot_de_passe" class="form-control" value="<?= isset($mot_de_passe) ? htmlspecialchars($mot_de_passe) : '' ?>" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" class="form-control" value="<?= isset($email) ? htmlspecialchars($email) : '' ?>" required>
                </div>
                <div class="form-group">
                    <label for="nom">Nom:</label>
                    <input type="text" name="nom" id="nom" class="form-control" value="<?= isset($nom) ? htmlspecialchars($nom) : '' ?>" required>
                </div>
                <div class="form-group">
                    <label for="prenom">Prénom:</label>
                    <input type="text" name="prenom" id="prenom" class="form-control" value="<?= isset($prenom) ? htmlspecialchars($prenom) : '' ?>" required>
                </div>
                <button type="submit" class="btn btn-primary"><?= isset($_GET['edit_id']) ? 'Enregistrer les modifications' : 'Ajouter' ?></button>
                <a href="admin.php" class="btn btn-secondary">Retour à la liste des administrateurs</a>
            </form>
        <?php endif; ?>
    </div>

    <footer class="footer">
        &copy; 2024 Mon Site Web. Tous droits réservés.
    </footer>
    <!-- Intégration de Bootstrap JS et de ses dépendances -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
