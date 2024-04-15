<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Page de Connexion</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login-container">
        <h2>Connexion</h2>
        <form action="login.php" method="post">
            <div class="input-group">
                <label for="username">Nom d'utilisateur:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="password">Mot de passe:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" name="connect">Se connecter</button>
        </form>
    </div>
</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['connect'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Vérification des identifiants (exemple simple)
    if ($username == "admin" && $password == "admin123") {
        echo "<script>alert('Connexion réussie');</script>";
    } else {
        echo "<script>alert('Identifiant ou mot de passe incorrect');</script>";
    }
}
/*gestion des utilisateur */
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect the form data
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Special credentials for admin
    $admin_user = "admin";
    $admin_pass = "admin123";

    // Check if the entered credentials match the special admin credentials
    if ($username === $admin_user && $password === $admin_pass) {
        // Redirect to the admin page
        header("Location: admin.php");
        exit;
    } else {
        // Optional: Display an error message or redirect to the login page
        $error = "Invalid username or password!";
    }
}
?>

