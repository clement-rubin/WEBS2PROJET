<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login - Rubine-moi</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <label class="logo">Rubine-moi</label>
        <ul>
            <li><a href="#">Accueil</a></li>
            <li><a href="#">Membres</a></li>
            <li><a href="#">Découvrir</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </nav>

    <div class="login-container">
        <h2>Connexion</h2>
        <form action="seconnecter.html" method="post">
            <label for="username">Nom d'utilisateur</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Se connecter</button>
            <p>Pas encore membre ? <a href="signup.html">Inscrivez-vous maintenant</a></p>
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
/*---------------------------FIN PREP--------------------------------------------->
?>
</html>
