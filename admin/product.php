<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include('include/function.php');
check_login();
include('include/db_connect.php');

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
        $club = clean_input($_POST['club']);
        $description = clean_input($_POST['description']);
        $prix = clean_input($_POST['prix']);
        $image = isset($_FILES['image']['name']) ? $_FILES['image']['name'] : $image;

        if ($_FILES['image']['name']) {
            $image = $_FILES['image']['name'];
            $target_dir = "../image/";
            $target_file = $target_dir . basename($image);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            $check = getimagesize($_FILES['image']['tmp_name']);
            if ($check !== false) {
                if (!move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                    $error = "Désolé, une erreur s'est produite lors du téléchargement de l'image.";
                }
            } else {
                $error = "Le fichier n'est pas une image.";
            }
        }

        $query = "UPDATE produit SET club=?, description_=?, prix=?, image=? WHERE id_produit=?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('ssdsi', $club, $description, $prix, $image, $edit_id);

        if ($stmt->execute()) {
            $message = "Produit mis à jour avec succès.";
            header("Location: product.php");
            exit;
        } else {
            $error = "Erreur lors de la mise à jour du produit.";
        }

        $stmt->close();
    }

    $query = "SELECT club, description_, prix, image FROM produit WHERE id_produit=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $edit_id);
    $stmt->execute();
    $stmt->bind_result($club, $description, $prix, $image);
    $stmt->fetch();
    $stmt->close();
}

// Vérifier si une action de suppression est demandée
if (isset($_GET['delete_id'])) {
    $delete_id = intval($_GET['delete_id']);
    
    $query = "DELETE FROM produit WHERE id_produit=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $delete_id);

    if ($stmt->execute()) {
        $message = "Produit supprimé avec succès.";
        header("Location: product.php");
        exit;
    } else {
        $error = "Erreur lors de la suppression du produit.";
    }

    $stmt->close();
}

// Filtrer les produits par catégorie
$id_categorie = isset($_GET['id_categorie']) ? intval($_GET['id_categorie']) : 0;

$produits_par_page = 10; 
$page_actuelle = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page_actuelle < 1) $page_actuelle = 1;
$offset = ($page_actuelle - 1) * $produits_par_page;

$query_total = "SELECT COUNT(*) AS total FROM produit" . ($id_categorie ? " WHERE id_categorie = $id_categorie" : "");
$result_total = mysqli_query($conn, $query_total);
$total_produits = mysqli_fetch_assoc($result_total)['total'];
$total_pages = ceil($total_produits / $produits_par_page);

$query = "SELECT p.id_produit, p.club, p.description_, p.prix, p.image, c.Nom_Categorie FROM produit p 
          JOIN categorie c ON p.id_categorie = c.ID_Categorie" . 
          ($id_categorie ? " WHERE p.id_categorie = $id_categorie" : "") . 
          " LIMIT $produits_par_page OFFSET $offset";
$result = mysqli_query($conn, $query);

// Récupérer les catégories pour le formulaire de sélection
$query_categories = "SELECT ID_Categorie, Nom_Categorie FROM categorie";
$result_categories = mysqli_query($conn, $query_categories);
$categories = mysqli_fetch_all($result_categories, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des produits</title>
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
    <h1 class="text-center text-primary">Liste des produits</h1>

    <?php if ($message): ?>
        <div class="alert alert-success text-center"><?= $message ?></div>
    <?php endif; ?>

    <?php if ($error): ?>
        <div class="alert alert-danger text-center"><?= $error ?></div>
    <?php endif; ?>

    <form action="<?= isset($edit_id) ? 'product.php?edit_id=' . $edit_id : 'product.php' ?>" method="post" enctype="multipart/form-data" class="mb-4">
        <div class="form-group">
            <label for="club">Club :</label>
            <input type="text" name="club" id="club" class="form-control" value="<?= $club ?? '' ?>" required>
        </div>

        <div class="form-group">
            <label for="description">Description :</label>
            <input type="text" name="description" id="description" class="form-control" value="<?= $description ?? '' ?>" required>
        </div>

        <div class="form-group">
            <label for="prix">Prix :</label>
            <input type="number" step="0.01" name="prix" id="prix" class="form-control" value="<?= $prix ?? '' ?>" required>
        </div>

        <div class="form-group">
            <label for="image">Image :</label>
            <input type="file" name="image" id="image" class="form-control-file">
        </div>

        <?php if (isset($edit_id) && $image): ?>
            <div class="form-group">
                <img src="../image/<?= $image ?>" alt="Image du produit" class="product-image img-thumbnail">
            </div>
        <?php endif; ?>

        <button type="submit" class="btn btn-primary"><?= isset($edit_id) ? 'Mettre à jour' : 'Ajouter' ?></button>
    </form>

    <form method="get" action="product.php" class="mb-4">
        <div class="form-group">
            <label for="id_categorie">Filtrer par championnat :</label>
            <select name="id_categorie" id="id_categorie" class="form-control">
                <option value="0">Tous les championnats</option>
                <?php foreach ($categories as $categorie): ?>
                    <option value="<?= $categorie['ID_Categorie'] ?>" <?= $id_categorie == $categorie['ID_Categorie'] ? 'selected' : '' ?>>
                        <?= $categorie['Nom_Categorie'] ?>
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
                    <th>ID</th>
                    <th>Club</th>
                    <th>Description</th>
                    <th>Prix</th>
                    <th>Image</th>
                    <th>Catégorie</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?= $row['id_produit'] ?></td>
                        <td><?= $row['club'] ?></td>
                        <td><?= $row['description_'] ?></td>
                        <td><?= $row['prix'] ?></td>
                        <td>
                            <?php if ($row['image']): ?>
                                <img src="../<?= $row['image'] ?>" alt="Image du produit" class="product-image img-thumbnail" style="max-width: 100px;">
                            <?php else: ?>
                                Pas d'image
                            <?php endif; ?>
                        </td>
                        <td><?= $row['Nom_Categorie'] ?></td>
                        <td>
                            <a href="product.php?edit_id=<?= $row['id_produit'] ?>" class="btn btn-warning btn-sm">Modifier</a>
                            <a href="product.php?delete_id=<?= $row['id_produit'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce produit?');">Supprimer</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <div class="pagination">
        <?php if ($total_pages > 1): ?>
            <?php if ($page_actuelle > 1): ?>
                <a href="product.php?page=<?= $page_actuelle - 1 ?>&id_categorie=<?= $id_categorie ?>" class="btn btn-secondary">&laquo; Précédent</a>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                <?php if ($i == $page_actuelle): ?>
                    <strong class="btn btn-primary"><?= $i ?></strong>
                <?php else: ?>
                    <a href="product.php?page=<?= $i ?>&id_categorie=<?= $id_categorie ?>" class="btn btn-secondary"><?= $i ?></a>
                <?php endif; ?>
            <?php endfor; ?>

            <?php if ($page_actuelle < $total_pages): ?>
                <a href="product.php?page=<?= $page_actuelle + 1 ?>&id_categorie=<?= $id_categorie ?>" class="btn btn-secondary">Suivant &raquo;</a>
            <?php endif; ?>
        <?php endif; ?>
    </div>
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
