<!DOCTYPE html>
<html>
	<head>
		<title>Inscription acheteur</title>
		 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="magasin.css">
	</head>
	<body>
		 <nav class="navbar navbar-expand-md navbar-light bg-light">
      <a class="navbar-brand" href="magasin.html">ECE Amazon</a>
      <ul class="navbar-nav">
        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories</a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="livres.php">Livres</a>
            <a class="dropdown-item" href="musique.php">Musique</a>
            <a class="dropdown-item" href="vetements.php">Vetements</a>
            <a class="dropdown-item" href="sportsetloisirs.php">Sports et loisirs</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="categories.php">Toutes les categories</a>
          </div>
        </li>
        <li class="nav-item"><a class="nav-link" href="votre_compte.php">Votre compte</a></li>
        <li class="nav-item"><a class="nav-link" href="panier.php">Panier</a></li>
        <li class="nav-item"><a class="nav-link" href="connecter.html">Se connecter</a></li>
        <li class="nav-item"><a class="nav-link" href="logout.php">Se deconnecter</a></li>
      </ul>
  </nav>
		<h2>FORMULAIRE ACHETEUR</h2>
    
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
<div id="scrollUp"><a href="#top"><img src="C:\wamp64\www\PP\to_top.png"/></a></div>
<link href='magasin.css' rel='stylesheet' type='text/css'>
<script src="magasin.js"></script>
	
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
		        <td><span class="note">Format: AAAA-MM-JJ</span></td>
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
  <button class="button" name="button2" onclick="document.location.href='connecter.html'">Retour vers la page de connexion</button>

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
	 
	


    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; ECE Amazon 2019</p>
      </div>
    </footer>

		</body>
	</html>