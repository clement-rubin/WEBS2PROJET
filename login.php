<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Se connecter</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <a href="index.html"><label class="logo"> Rubine-moi </label></a>
        <ul>
            <li><a href="index.html">Accueil</a></li>
            <li><a href="#">Membres</a></li>
            <li><a href="#">Découvrir</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="seconnecter.php">Se connecter</a></li>

        </ul>
    </nav>

    <div class="form-container">
        <form name="ajout" action="ajouter.php" method="post">
            <fieldset>
                <legend>Ajouter un adhérent</legend>
                
                <label  for="nom">Nom :</label>
                <input placeholder="Nom" type="text" id="nom" name="nom"><br/>
                
                <label for="prenom">Prénom :</label>
                <input  placeholder="Prénom" type="text" id="prenom" name="prenom"><br/>
                
                <label for="email">Email :</label>
                <input  placeholder="Email" type="email" id="email" name="email"><br/>
                
                <label for="dateN">Date de naissance :</label>
                <input  type="date" id="dateN" name="dateN"><br/>
                
                <input type="submit" name="Ajouter" value="Ajouter">
            </fieldset>
            <fieldset class="dins">
                <label>Déja membre ?</label>
                <a href="seconnecter.php">Cliquez-ICI</a>
                
            </fieldset>
        </form>
    </div>
</body>
<?php
/*----------------------------CONNEXION A LA DB--------------------------*/
    $servername ='localhost'; 
	$username ='root'; 
	$password ='root'; 
	$database ='projet';
	
	$conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
/*---------------------------FIN DE LA PARTIE CONNEXION-------------------*/
/*---------------------------Préparation et exécution de  la deuxième requête sans variables (sélection)------*/
$reqprep2 = "SELECT id,Nom,Prenom,Email,DateNaissance FROM adherents";
$req2 = $conn->prepare($reqprep2);
$req2->execute();
/*---------------------------FIN PREP---------------------------------------------*/
?>
</html>

