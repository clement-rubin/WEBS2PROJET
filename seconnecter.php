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
    <link rel="stylesheet" href="sec.css">
    <title>Page de connexion</title>
</head>
<body>
    <div class="login-container">
        <?php if (!empty($error)): ?>
            <p class="error"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="input-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Se connecter</button>
        </form>
    </div>
</body>
</html>
