<!DOCTYPE html>
<html>
<head>
	<title>Inscription acheteur</title>
	<script type="text/javascript" src="login.js"></script>
	
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<!--<center><img src="img/logo.png" alt="Logo" style="width:300px;height:300px;"></center>-->
	
		<form action="login.php" method="post">
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
					echo' <td>Prenom* :</td>';
					echo'<td><input type="text" name="Prenom" value="'.$prenom.'"></td>';					
				}
				else{
					echo' <td>Prenom* :</td>';
					echo'<td><input type="text" name="Prenom"></td>';
				}
				?>
				</tr>
				<tr>
				<?php 
				if(isset($_GET['adresse'])){
					$adresse = $_GET['adresse'];
					echo' <td>Adresse* :</td>';
					echo'<td><input type="text" name="Adresse" value="'.$adresse.'"></td>';					
				}
				else{
					echo' <td>Adresse* :</td>';
					echo'<td><input type="text" name="Adresse"></td>';
				}
				?>
				</tr>
				<tr>
				<?php 
				if(isset($_GET['ville'])){
					$ville = $_GET['ville'];
					echo' <td>Ville* :</td>';
					echo'<td><input type="text" name="Ville" value="'.$ville.'"></td>';					
				}
				else{
					echo' <td>Ville* :</td>';
					echo'<td><input type="text" name="Ville"></td>';
				}
				?>
				</tr>
				<tr>
				<?php
				if(isset($_GET['Code_postal'])){
					$postal = $_GET['Code_postal'];
					
					echo' <td>Code Postal* :</td>';
					echo'<td><input type="number" name="Code_postal" value="'.$postal.'"></td>';					
				}
				else{
					echo' <td>Code Postal* :</td>';
					echo'<td><input type="number" name="Code_postal"></td>';
				}
				?>
				</tr>
				<tr>
				<?php
				if(isset($_GET['telephone'])){
					$telephone = $_GET['telephone'];
					echo' <td>Telephone* :</td>';
					echo'<td><input type="tel" id="tel" name="Telephone" value="'.$telephone.'" pattern="[0-9]{2}[0-9]{2}[0-9]{2}[0-9]{2}[0-9]{2}" required></td>';
		        	echo'<td><span class="note">Format: 0X-XX-XX-XX-XX</span></td>';			
				}
				else{
					echo' <td>Telephone* :</td>';
					echo'<td><input type="tel" id="tel" name="Telephone" pattern="[0-9]{2}[0-9]{2}[0-9]{2}[0-9]{2}[0-9]{2}" required></td>';
		        	echo'<td><span class="note">Format: 0X-XX-XX-XX-XX</span></td>';
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
		        <td><label for="type_card">Type de carte :</label></td>

					<td><select  name="type_card" onchange="card_form(this.value)">
   					 <option value="">Aucune</option>
   					 <option value="visa">Visa</option>
    				<option value="mastercard">Mastercard</option>
    				<option value="amex">American Express</option>
    				<option value="paypal">Paypal</option>    				
					</select> </td>
		        
		</tr>
		
		
		<tr>
		        <td>Numero de carte :</td>
		        <td><input type="number" name="number"></td>
		</tr>
		<tr>
		        <td>Date expiration carte :</td>
		        <td><input type="date" name="date"></td>
		</tr>
		<tr>
		        <td>Nom proprietaire carte:</td>
		        <td><input type="string" name="nom_carte" ></td>
		</tr>
		<tr>
		        <td>Cryptogramme :</td>
		        <td><input type="number" name="num_carte"></td>
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