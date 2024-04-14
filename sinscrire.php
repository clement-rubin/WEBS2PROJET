<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>TP4 : web dynamique</title>
        <meta charset="utf-8" />
        <style>
			body{padding:3%;}
            h1{text-align:center;}
            h2{color:red;}
			table,td,th{border: solid; border-collapse:collapse;text-align:center;}
        </style>
    </head>
    <body>
		<h1>TP4 : web dynamique<br>Base de données</h1>
		<h2>Liste des Adhérents</h2>
		<?php
            try{
                require("connexion.php"); 
				
				$reqPrep="SELECT id,Nom,Prenom,Email,DateNaissance FROM adherents";//La requere SQL SELECT
				$req =$conn->prepare($reqPrep);//Préparer la requete
				$req->execute();//Executer la requete
				
				$resultat = $req->fetchALL(PDO::FETCH_ASSOC);//récupérer le résultat
				
				//Affichage sous forme d'un tableau
				echo "<table>
							<tr>
								<th>id</th>
								<th>Nom</th>
								<th>Prenom</th>
								<th>Email</th>
								<th>Date de naissance</th>
								<th colspan=2>Action</th>
							</tr>";
		
					//Compléter ICI
					foreach($resultat as $row){
						echo "<tr><td>{$row['id']}</td><td>{$row['Nom']}</td><td>{$row['Prenom']}</td><td>{$row['Email']}</td><td>{$row['DateNaissance']}</td><td>{$row['Action']}<a href='modifier.php?identifiant={$row['id']}'>Modifier</a></td><td>{$row['Action']}<a href='supprimer.php?identifiant={$row['id']}'>Supprimer</a></td></tr>"; 
					}
					
					
					//AIDE pour la question 4 
					//echo "<td><a href='modifier.php?identifiant=...'>Modifier</a></td>";
					//echo "<td><a href='supprimer.php?identifiant=...'>Supprimer</a></td>";
					
				echo "</table>";
				
				$conn=NULL;// On ferme la connexion						
            }                 
            catch(Exception $e){
                echo "Erreur : " . $e->getMessage();
            }
		?>

		<!-- Formulaire d'ajout -->
		<h2>Ajouter un adhérent</h2>
		<form name="ajout" action="ajouter.php" method="post">
			<fieldset>
				<legend>Ajouter un adhérent</legend>
				
				<label for="nom">Nom : </label>
				<input type="text" id="nom" name="nom"><br/>
				
				<label for="prenom">Prénom : </label>
				<input type="text" id="prenom" name="prenom"><br/>
				
				<label for="email">Email : </label>
				<input type="email" id="email" name="email"><br/>
				
				<label for="dateN">Date de naissance : </label>
				<input type="date" id="dateN" name="dateN"><br/>
				
				<input Type="submit" name="Ajouter" value="Ajouter">
			</fieldset>
		</form>
		
    </body>
</html>