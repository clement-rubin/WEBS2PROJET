    <?php
    include 'DBcon.php';

    // Fetch user details
    $identifiant = $_GET["identifiant"] ?? null;

    if ($identifiant) {
        try {
            $stmt = $conn->prepare("SELECT * FROM utilisateurs WHERE id = ?");
            $stmt->bindParam(1, $identifiant, PDO::PARAM_INT);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if (!$user) {
                echo "<p>Utilisateur non trouvé.</p>";
            }
        } catch(Exception $e) {
            die("Erreur de connexion : " . $e->getMessage());
        }
    }

    // Update user details
    if (isset($_POST["Modifier"]) && !empty($_POST["id"])) {
        $id = $_POST['id'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $dateN = $_POST['dateN'];

        try {
            $stmt = $conn->prepare("UPDATE utilisateurs SET Nom = ?, Prenom = ?, Email = ?, date_naissance = ? WHERE id = ?");
            $stmt->bindParam(1, $nom);
            $stmt->bindParam(2, $prenom);
            $stmt->bindParam(3, $email);
            $stmt->bindParam(4, $dateN);
            $stmt->bindParam(5, $id, PDO::PARAM_INT);
            $stmt->execute();
            
            header("Location: gestion.php"); // Redirect to management page
            exit();
        } catch(Exception $e) {
            die("Erreur de mise à jour : " . $e->getMessage());
        }
    }
    ?>
    <html>
        <head>
            <title>Mot de passe oublié ?</title>
        </head>
        <body>
            <h2>Ajouter un adhérent</h2>
            <form name="ajout" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <fieldset>
                    <legend>Ajouter un adhérent</legend>
                    
                    <label for="nom">Nom :</label>
                    <input type="text" id="nom" name="nom" required><br/>
                    
                    <label for="prenom">Prénom :</label>
                    <input type="text" id="prenom" name="prenom" required><br/>
                    
                    <label for="email">Email :</label>
                    <input type="email" id="email" name="email" required><br/>
                    
                    <label for="dateN">Date de naissance :</label>
                    <input type="date" id="dateN" name="dateN" required><br/>
                    
                    <input type="hidden" name="id" value="<?php echo $identifiant; ?>">
                    <input type="submit" name="Modifier" value="Modifier">
                </fieldset>
            </form>
        </body>
    </html>
