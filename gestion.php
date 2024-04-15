<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="10;url=gestion.php">
    <title>Liste des Adhérents</title>
    <link rel="stylesheet" href="gestion.css">
    <label class="logo"> Rubine-moi </label>
    <a href="index.html">Accueil</a>
</head>
<body>
    <h1>Liste des Adhérents</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Date de Naissance</th>
                <th>Action</th>
            </tr>   
        </thead>
        <tbody>
            <?php
            $servername ='localhost'; 
            $username ='root'; 
            $password ='root'; 
            $database ='projet';
            
            try {
                $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // Requête SQL pour obtenir les données
                $sql = "SELECT id, Nom, Prenom, Email, DateNaissance FROM adherents"; // Assurez-vous que le nom de la colonne est correct
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                
                $result = $stmt->fetchAll(); // Récupérer tous les résultats
                if (count($result) > 0) {
                    // Afficher les données de chaque ligne
                    foreach ($result as $row) {
                        echo "<tr><td>" . htmlspecialchars($row['id']) . "</td><td>" . htmlspecialchars($row['Nom']) . "</td><td>" . htmlspecialchars($row['Prenom']) . "</td><td>" . htmlspecialchars($row['Email']) . "</td><td>" . htmlspecialchars($row['DateNaissance']) . "</td><td><a href='supprimer.php?id={$row['id']}'>Supprimer</a> <a href='modifier.php?id={$row['id']}'>Modifier</a></td></tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>0 résultats</td></tr>";
                }
                $conn = null; // Fermer la connexion
            } catch(PDOException $e) {
                echo "Erreur de connexion : " . $e->getMessage();
            }
            ?>
        </tbody>
    </table>
</body>
</html>
