<?php
// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect the form data
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Special credentials for user login (assuming these are already registered users)
    $valid_user = "user";
    $valid_pass = "user123";

    // Check if the entered credentials match the registered user credentials
    if ($username === $valid_user && $password === $valid_pass) {
        // Redirect to the user dashboard or appropriate page
        header("Location: gestion.php");
        exit;
    } else {
        // Display an error message
        $error = "Invalid username or password!";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="seconnecter.css">
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
            <li><a href="seconnecter.php">Se connecter</a></li>
        </ul>
    </nav>
    <div class="wrapper fadeInDown">
        <div id="formContent">
            <!-- Tabs Titles -->
            <h2 class="active"> S'inscrire</h2>
            <h2 class="inactive underlineHover">Se connecter </h2>

            <!-- Icon -->
            <div class="fadeIn first">
                <img src="images/love-geader.png" id="icon" alt="User Icon" />
            </div>

            <!-- Login Form -->
            <form method="post">
                <input type="text" id="login" class="fadeIn second" name="username" placeholder="connexion">
                <input type="password" id="password" class="fadeIn third" name="password" placeholder="mot de passe">
                <input type="submit" class="fadeIn fourth" value="Log In">
            </form>

            <!-- Remind Password -->
            <div id="formFooter">
                <a class="underlineHover" href="#">Mot de passe oublié ?</a>
            </div>
        </div>
    </div>
</body>
</html>
