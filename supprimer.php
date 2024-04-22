<?php
$servername = 'localhost';
$username = 'root';
$password = 'root';
$database = 'projet';

$id = $_GET['id']; // Récupérer l'ID depuis l'URL

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Requête SQL pour supprimer l'adhérent
    $sql = "DELETE FROM adherents WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    // Redirection vers la page de gestion après la suppression
    header('Location: gestion.php');
} catch(PDOException $e) {
    echo "Erreur de suppression : " . $e->getMessage();
}
?>
