<?php
// Inclure le fichier de connexion à la base de données
include 'include/db_connect.php';

// Récupérer le terme de recherche depuis le formulaire
$searchTerm = isset($_GET['q']) ? $_GET['q'] : '';

// Préparer la requête SQL pour rechercher les produits
$sql = "SELECT * FROM produits WHERE nom LIKE ? OR description LIKE ?";
$stmt = $conn->prepare($sql);

// Ajouter des wildcards % autour du terme de recherche pour une recherche partielle
$searchTerm = "%" . $searchTerm . "%";

// Binder les paramètres et exécuter la requête
$stmt->bind_param("ss", $searchTerm, $searchTerm);
$stmt->execute();

// Récupérer les résultats de la requête
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Résultats de la recherche pour "<?php echo htmlspecialchars($searchTerm); ?>"</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <?php include 'include/header.php'; ?>
    
    <div class="container">
        <h1>Résultats de la recherche pour "<?php echo htmlspecialchars($searchTerm); ?>"</h1>
        
        <?php if ($result->num_rows > 0): ?>
            <ul>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <li>
                        <a href="produit-detail.php?id=<?php echo $row['id']; ?>">
                            <img src="images/<?php echo $row['image']; ?>" alt="<?php echo htmlspecialchars($row['nom']); ?>">
                            <?php echo htmlspecialchars($row['nom']); ?> - <?php echo htmlspecialchars($row['prix']); ?> €
                        </a>
                    </li>
                <?php endwhile; ?>
            </ul>
        <?php else: ?>
            <p>Aucun résultat trouvé pour "<?php echo htmlspecialchars($searchTerm); ?>"</p>
        <?php endif; ?>
    </div>
    
    <?php include 'include/footer.php'; ?>
</body>
</html>

<?php
// Fermer la connexion et le statement
$stmt->close();
$conn->close();
?>
