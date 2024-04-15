<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Adhérents</title>
    <link rel="stylesheet" href="style.css">
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
            </tr>
        </thead>
        <tbody>
            <?php
            // Paramètres de connexion
            $servername = "localhost";
            $username = "username";
            $password = "password";
            $dbname = "projet";

            // Créer la connexion
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Vérifier la connexion
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Requête SQL pour obtenir les données
            $sql = "SELECT id, nom, prenom, email FROM adherents";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Afficher les données de chaque ligne
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["id"]. "</td><td>" . $row["nom"]. "</td><td>" . $row["prenom"]. "</td><td>" . $row["email"]. "</td></tr>";
                }
            } else {
                echo "<tr><td colspan='4'>0 résultats</td></tr>";
            }
            $conn->close();
            ?>
        </tbody>
    </table>
</body>
</html>
