<!DOCTYPE html>
<html>
<head>
	<title>Inscription Vendeur</title>
	<script type="text/javascript" src="login.js"></script>
	
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<!--<center><img src="img/logo.png" alt="Logo" style="width:300px;height:300px;"></center>-->
	
		<form action="logVendeur.php" method="post">
			<p>(*) Informations requises <p>
			<table>
				<tr>
				<?php 				
				if(isset($_GET['nom'])){
					$nom = $_GET['nom'];
					echo' <td>Nom* :</td>';
					echo'<td><input type="text" name="Nom" value="'.$nom.'"></td>';					
				}
				else{
					echo' <td>Nom* :</td>';
					echo'<td><input type="text" name="Nom"></td>';
				}
				?>
				</tr>
				<tr>
				<?php
				if(isset($_GET['prenom'])){
					$prenom = $_GET['prenom'];
					echo' <td>Pseudo* :</td>';
					echo'<td><input type="text" name="Prenom" value="'.$prenom.'"></td>';					
				}
				else{
					echo' <td>Pseudo* :</td>';
					echo'<td><input type="text" name="Prenom"></td>';
				}
				?>
				</tr>		
				
						   		    
		    <tr>
		        <td>Mail* :</td>
		        <td><input type="text"  name="Mail"></td>
		    </tr>
		    <tr>
		        <td>Mot de Passe* :</td>
		        <td><input type="password" name="mdp"></td>
            </tr>
            <tr>
		        <td>Confirmation mot de passe* :</td>
		        <td><input type="password" name="mdp2"></td>
            </tr>
            
            <tr>
                <td><label for="avatar">Choisissez une photo de profil*:</label></td>

                <td><input type="file"
                    id="avatar" name="avatar"
                    accept="image/png, image/jpeg">  </td>
            </tr>

            <tr>
                <td><label for="fond">Choisissez une photo de fond*:</label></td>

                 <td><input type="file"
                    id="fond" name="fond"
                    accept="image/png, image/jpeg">  </td>
            </tr>
		

		</table>
				
		<tr>
			<button class="button" name="button1">Inscription</button>
		</tr>
		






	</form>
	<?php	

		if(!isset($_GET['signup'])){
			exit();
		}
			else{
				$signupCheck = $_GET['signup'];

				if($signupCheck=="empty"){
					echo "<p class'error'>Vous n'avez pas rempli tous les champs!</p>";
					exit();

				} elseif($signupCheck=="char"){
					echo "<p class'error'>Merci de ne pas utiliser de caracteres speciaux!</p>";
					exit();

				}elseif($signupCheck=="mail"){
					echo "<p class'error'>Votre adresse mail n'est pas valide (type @edu.ece.fr) !</p>";
					exit();

				}elseif($signupCheck=="mail_used"){
					echo "<p class'error'>Cette adresse mail est deja utilise !</p>";
					exit();

				}elseif($signupCheck=="mdp"){
					echo "<p class'error'>Le mot de passe n'est pas identique dans les deux champs!</p>";
					exit();
				}elseif($signupCheck=="success"){
				echo "<p class'error'>Vous avez ete enregistre avec succes! Merci de vous connecter !</p>";
				exit();
				}
			}
		

	?>
	 
	
</body>
</html>