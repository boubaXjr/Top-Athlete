<?php
$files = [
    'index.php', 'club.php', 'bundesliga.php', 'recherche.php', 
    'premierleague.php', 'commande.php', 'favoris.php', 
    'laliga.php', 'ligue1.php', 'ajouter_favoris.php', 
    'product_detail.php', 'pagecompte.php', 'seria.php'
];

$pattern = '/\$servername\s*=\s*"localhost";\s*\$username\s*=\s*"root";\s*\$password\s*=\s*"(toor|root|mamadou)";\s*\$dbname\s*=\s*"maillot_nouvelle";\s*\$conn\s*=\s*new mysqli\(\$servername,\s*\$username,\s*\$password,\s*\$dbname\);\s*if\s*\(\$conn->connect_error\)\s*\{\s*die\([^}]+\}\s*/ui';

foreach ($files as $file) {
    if (file_exists($file)) {
        $content = file_get_contents($file);
        $replacement = "require_once __DIR__ . '/db_config.php';";
        $replaced = preg_replace($pattern, $replacement, $content);
        if ($replaced !== null && $replaced !== $content) {
            file_put_contents($file, $replaced);
            echo "Updated $file\n";
        } else {
            echo "No match found in $file\n";
        }
    }
}
?>
