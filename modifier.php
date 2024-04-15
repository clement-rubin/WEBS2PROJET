<?php
include 'DBcon.php';  // Informations de connexion

$id = $_GET['id']; // ID de l'élément à modifier

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Préparer et exécuter la requête SQL pour mettre à jour l'élément
        $sql = "UPDATE adherents SET Nom = ?, Prenom = ?, Email = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$nom, $prenom, $email, $id]);

        // Redirection vers la page de login
        header("Location: modif.php");
        exit;
    } catch(PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
?>
<!-- Formulaire pour la modification -->
<nav>	
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"> </i>
        </label>
        <label class="logo"> Rubine-moi </label>
        <ul>
            <li><a class="active" href="#"> Accueil </a></li>
            <li><a href="#"> Membres </a></li>
            <li><a href="#"> Découvrir </a></li>
            <li><a href="#"> Contact </a></li>
        </ul>

    </nav>
<form method="post">
    <!-- Champs du formulaire avec les valeurs pré-remplies -->
    <input type="text" name="nom" value="Nom initial">
    <input type="text" name="prenom" value="Prénom initial">
    <input type="email" name="email" value="Email initial">
    <button type="submit">Modifier</button>
</form>
