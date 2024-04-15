<?php
if(isset($_GET["identifiant"])){

		try{
			require("DBcon.php"); 
               
			//Compléter ICI

			$stmt = $conn->prepare("DELETE FROM adherents WHERE Id = ?");
			$stmt->execute(array($_GET['identifiant']));
			
			header("Location:gestion.php");
		}                 
		catch(Exception $e){
			die("Erreur : " . $e->getMessage());
        }
	}
?>