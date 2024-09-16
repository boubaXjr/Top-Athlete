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

// Vérifier si une action d'édition est demandée
if (isset($_GET['edit_id'])) {
    $edit_id = intval($_GET['edit_id']);
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nom = clean_input($_POST['nom']);
        $prenom = clean_input($_POST['prenom']);
        $mail = clean_input($_POST['mail']);
        $mot_de_passe = clean_input($_POST['mot_de_passe']);

        $query = "UPDATE client SET nom=?, prenom=?, mail=?, mot_de_passe=? WHERE id_client=?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('ssssi', $nom, $prenom, $mail, $mot_de_passe, $edit_id);

        if ($stmt->execute()) {
            $message = "Utilisateur mis à jour avec succès.";
            header("Location: user.php");
            exit;
        } else {
            $error = "Erreur lors de la mise à jour de l'utilisateur.";
        }

        $stmt->close();
    }

    $query = "SELECT nom, prenom, mail, mot_de_passe FROM client WHERE id_client=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $edit_id);
    $stmt->execute();
    $stmt->bind_result($nom, $prenom, $mail, $mot_de_passe);
    $stmt->fetch();
    $stmt->close();
}

// Vérifier si une action de suppression est demandée
if (isset($_GET['delete_id'])) {
    $delete_id = intval($_GET['delete_id']);
    
    $query = "DELETE FROM client WHERE id_client=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $delete_id);

    if ($stmt->execute()) {
        $message = "Utilisateur supprimé avec succès.";
        header("Location: user.php");
        exit;
    } else {
        $error = "Erreur lors de la suppression de l'utilisateur.";
    }

    $stmt->close();
}

// Filtrer les utilisateurs par nom ou email
$search = isset($_GET['search']) ? clean_input($_GET['search']) : '';

$query = "SELECT id_client, nom, prenom, mail FROM client WHERE nom LIKE ? OR prenom LIKE ? OR mail LIKE ?";
$search_term = '%' . $search . '%';
$stmt = $conn->prepare($query);
$stmt->bind_param('sss', $search_term, $search_term, $search_term);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des utilisateurs</title>
    <!-- Intégration de Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>

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

        .user-card {
            margin: 20px 0;
        }
    </style>
</head>
<body>
        <style>
        .navbar-nav .nav-item .nav-link {
            color: white;
        }
        .bg-primary {
            background-color: #0033cc !important;
        }
    </style>
    <style>
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
    </style>
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

    <div class="container content">
        <h1 class="text-center text-primary">Liste des utilisateurs</h1>

        <?php if ($message): ?>
            <div class="alert alert-success text-center"><?= $message ?></div>
        <?php endif; ?>

        <?php if ($error): ?>
            <div class="alert alert-danger text-center"><?= $error ?></div>
        <?php endif; ?>

        <form method="get" action="user.php" class="mb-4">
            <div class="form-group">
                <label for="search">Rechercher par nom, prénom ou email :</label>
                <input type="text" name="search" id="search" class="form-control" value="<?= htmlspecialchars($search) ?>">
            </div>
            <button type="submit" class="btn btn-primary">Rechercher</button>
        </form>

        <div class="row">
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="col-md-4">
                    <div class="card user-card">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($row['nom']) . ' ' . htmlspecialchars($row['prenom']) ?></h5>
                            <p class="card-text">
                                <strong>Email:</strong> <?= htmlspecialchars($row['mail']) ?><br>
                            </p>
                            <a href="user.php?edit_id=<?= $row['id_client'] ?>" class="btn btn-warning">Modifier</a>
                            <a href="user.php?delete_id=<?= $row['id_client'] ?>" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');">Supprimer</a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>

        <?php
        $stmt->close();
        $conn->close();
        ?>

        <?php if (isset($_GET['edit_id'])): ?>
            <h2 class="text-center text-primary">Modifier l'utilisateur</h2>
            <form method="post" action="user.php?edit_id=<?= $edit_id; ?>" class="mb-4">
                <div class="form-group">
                    <label for="nom">Nom:</label>
                    <input type="text" name="nom" id="nom" class="form-control" value="<?= htmlspecialchars($nom); ?>" required>
                </div>
                <div class="form-group">
                    <label for="prenom">Prénom:</label>
                    <input type="text" name="prenom" id="prenom" class="form-control" value="<?= htmlspecialchars($prenom); ?>" required>
                </div>
                <div class="form-group">
                    <label for="mail">Email:</label>
                    <input type="email" name="mail" id="mail" class="form-control" value="<?= htmlspecialchars($mail); ?>" required>
                </div>
                <div class="form-group">
                    <label for="mot_de_passe">Mot de passe:</label>
                    <div class="input-group">
                        <input type="password" name="mot_de_passe" id="mot_de_passe" class="form-control" value="<?= htmlspecialchars($mot_de_passe); ?>" required>
                        <div class="input-group-append">
                            <button type="button" class="btn btn-secondary" onclick="togglePassword()">Afficher</button>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                <a href="user.php" class="btn btn-secondary">Retour à la liste des utilisateurs</a>
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
    <script>
        function togglePassword() {
            var passwordField = document.getElementById("mot_de_passe");
            var passwordFieldType = passwordField.getAttribute("type");
            if (passwordFieldType == "password") {
                passwordField.setAttribute("type", "text");
            } else {
                passwordField.setAttribute("type", "password");
            }
        }
    </script>
</body>
</html>
