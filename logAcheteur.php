<!DOCTYPE html>
<html>
<head>
	<title>Inscription acheteur</title>
	
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<!--<center><img src="img/logo.png" alt="Logo" style="width:300px;height:300px;"></center>-->
	
		<form action="login.php" method="post">
			<right><table>
		    <tr>
		        <td>Nom :</td>
		        <td><input type="text" name="Nom"></td>
		    </tr>
		    <tr>
		        <td>Prenom :</td>
		        <td><input type="text" name="Prenom"></td>
		    </tr>		    
		    <tr>
		        <td>Mail :</td>
		        <td><input type="text"  name="Mail"></td>
		    </tr>
		    <tr>
		        <td>Mot de Passe :</td>
		        <td><input type="password" name="mdp"></td>
                    </tr>
                    <tr>
		        <td>Confirmation mot de passe :</td>
		        <td><input type="password" name="mdp2"></td>
			</tr>			
		    <tr>
		        <td>Adresse :</td>
		        <td><input type="text" name="Adresse"></td>
                    </tr>
                    <tr>
		        <td>Ville :</td>
		        <td><input type="text" name="Ville"></td>
		    </tr>		    		      
		    <tr>
		        <td>Code Postal :</td>
		        <td><input type="number" name="Code_postal"></td>
			</tr>			
		    <tr>
		        <td>Telephone:</td>
		        <td><input type="tel" id="tel" name="Telephone" pattern="[0-9]{2}[0-9]{2}[0-9]{2}[0-9]{2}[0-9]{2}" required></td>
		        <td><span class="note">Format: 0X-XX-XX-XX-XX</span></td>
		    </tr>  
		</table></right>
		<tr>
			<button class="button" name="button1">Inscription</button>
		</tr>
		






	</form>
	<?php

		/*$fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

		if(strpos($fullUrl,"signup=empty")==true){
			echo "<p class'error'>Vous n'avez pas rempli tous les champs!</p>";
			exit();
		}
		elseif(strpos($fullUrl,"signup=char")==true){
			echo "<p class'error'>Merci de ne pas utiliser de caracteres speciaux!</p>";
			exit();
		}
		elseif(strpos($fullUrl,"signup=mail")==true){
			echo "<p class'error'>Votre adresse mail n'est pas valide (type @edu.ece.fr) !</p>";
			exit();
		}
		else{
			echo "<p class'error'>Vous avez ete enregistre avec succes !</p>";

		} */

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

				}
			}
		

	?>
	 
	
</body>
</html>