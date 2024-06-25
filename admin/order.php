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
        $statut = isset($_POST['statut']) ? 1 : 0;
        $date_commande = clean_input($_POST['date_commande']);

        $query = "UPDATE commande SET Statut_Commande=?, Date_Commande=? WHERE ID_Commande=?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('isi', $statut, $date_commande, $edit_id);

        if ($stmt->execute()) {
            $message = "Commande mise à jour avec succès.";
            header("Location: order.php");
            exit;
        } else {
            $error = "Erreur lors de la mise à jour de la commande.";
        }

        $stmt->close();
    }

    $query = "SELECT Statut_Commande, Date_Commande FROM commande WHERE ID_Commande=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $edit_id);
    $stmt->execute();
    $stmt->bind_result($statut, $date_commande);
    $stmt->fetch();
    $stmt->close();
}

// Vérifier si une action de suppression est demandée
if (isset($_GET['delete_id'])) {
    $delete_id = intval($_GET['delete_id']);
    
    $query = "DELETE FROM commande WHERE ID_Commande=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $delete_id);

    if ($stmt->execute()) {
        $message = "Commande supprimée avec succès.";
        header("Location: order.php");
        exit;
    } else {
        $error = "Erreur lors de la suppression de la commande.";
    }

    $stmt->close();
}

// Filtrer les commandes par client
$id_client = isset($_GET['id_client']) ? intval($_GET['id_client']) : 0;

$query_clients = "SELECT id_client, nom, prenom FROM client";
$result_clients = mysqli_query($conn, $query_clients);
$clients = mysqli_fetch_all($result_clients, MYSQLI_ASSOC);

$query = "SELECT c.ID_Commande, c.Date_Commande, c.Statut_Commande, cl.nom, cl.prenom 
          FROM commande c 
          JOIN client cl ON c.id_client = cl.id_client" . 
          ($id_client ? " WHERE c.id_client = $id_client" : "");
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des commandes</title>
    <!-- Intégration de Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
<div class="container mt-5">
    <h1 class="text-center text-primary">Liste des commandes</h1>

    <?php if ($message): ?>
        <div class="alert alert-success text-center"><?= $message ?></div>
    <?php endif; ?>

    <?php if ($error): ?>
        <div class="alert alert-danger text-center"><?= $error ?></div>
    <?php endif; ?>

    <form method="get" action="order.php" class="mb-4">
        <div class="form-group">
            <label for="id_client">Filtrer par client :</label>
            <select name="id_client" id="id_client" class="form-control">
                <option value="0">Tous les clients</option>
                <?php foreach ($clients as $client): ?>
                    <option value="<?= $client['id_client'] ?>" <?= $id_client == $client['id_client'] ? 'selected' : '' ?>>
                        <?= $client['nom'] . ' ' . $client['prenom'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Filtrer</button>
    </form>

    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID Commande</th>
                    <th>Date Commande</th>
                    <th>Statut</th>
                    <th>Client</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?= $row['ID_Commande'] ?></td>
                        <td><?= $row['Date_Commande'] ?></td>
                        <td><?= $row['Statut_Commande'] ? 'Validée' : 'En attente' ?></td>
                        <td><?= $row['nom'] . ' ' . $row['prenom'] ?></td>
                        <td>
                            <a href="order.php?edit_id=<?= $row['ID_Commande'] ?>" class="btn btn-warning btn-sm">Modifier</a>
                            <a href="order.php?delete_id=<?= $row['ID_Commande'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette commande ?');">Supprimer</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <?php
    mysqli_free_result($result);
    mysqli_close($conn);
    ?>

    <?php if (isset($_GET['edit_id'])): ?>
    <h2 class="text-center text-primary">Modifier la commande</h2>
    <form method="post" action="order.php?edit_id=<?= $edit_id ?>" class="mb-4">
        <div class="form-group">
            <label for="date_commande">Date de commande:</label>
            <input type="date" name="date_commande" id="date_commande" class="form-control" value="<?= htmlspecialchars($date_commande) ?>" required>
        </div>
        <div class="form-group">
            <label for="statut">Statut de la commande:</label>
            <div class="form-check">
                <input type="checkbox" name="statut" id="statut" class="form-check-input" <?= $statut ? 'checked' : '' ?>>
                <label class="form-check-label" for="statut">Validée</label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
        <a href="order.php" class="btn btn-secondary">Retour à la liste des commandes</a>
    </form>
    <?php endif; ?>
</div>
<footer class="bg-primary text-white text-center py-3">
    &copy; 2024 Mon Site Web. Tous droits réservés.
</footer>
<!-- Intégration de Bootstrap JS et de ses dépendances -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
