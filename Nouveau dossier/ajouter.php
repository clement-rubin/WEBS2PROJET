<?php
	if(isset($_POST["Ajouter"])){
		try{
			require("login.php");               
			
			//Compléter ICI
			$stmt = $conn->prepare("INSERT INTO adherents (Nom, Prenom, Email, DateNaissance) VALUES (?, ?, ?, ?)");
			$stmt->execute(array(htmlspecialchars($_POST['nom']),
								htmlspecialchars($_POST['prenom']),
								htmlspecialchars($_POST['email']),
								$_POST['dateN']));
			$conn=NULL;
			header("Location:index.html");
		}                 
		catch(Exception $e){
			die("Erreur : " . $e->getMessage());
        }
	}
?>