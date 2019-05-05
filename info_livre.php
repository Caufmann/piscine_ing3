<!DOCTYPE html>
<html>
	<head>
		<title>Caracteristiques livre</title>
		 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="magasin.css">
	</head>
	<body>
		 <nav class="navbar navbar-expand-md navbar-light bg-light">
      <a class="navbar-brand" href="magasin.php">ECE Amazon</a>
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
        <li class="nav-item"><a class="nav-link" href="connecter1.php">Se connecter</a></li>
        <li class="nav-item"><a class="nav-link" href="logout.php">Se deconnecter</a></li>
      </ul>
  </nav>
		<h2>CARACTERISTIQUE LIVRE</h2>
    
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
<div id="scrollUp"><a href="#top"><img src="C:\wamp64\www\PP\to_top.png"/></a></div>
<link href='magasin.css' rel='stylesheet' type='text/css'>
<script src="magasin.js"></script>
	
		<form action="info_livre2.php" method="post">
			
			<table>
				<tr>
				<?php 				
				if(isset($_GET['nom'])){
					$nom = $_GET['nom'];
					echo' <td>Auteur :</td>';
					echo'<td><input type="text" name="Nom" value="'.$nom.'"></td>';					
				}
				else{
					echo' <td>Auteur :</td>';
					echo'<td><input type="text" name="Nom"></td>';
				}
				?>
				</tr>
				<tr>
				<?php
				if(isset($_GET['prenom'])){
					$prenom = $_GET['prenom'];
					echo' <td>Editeur :</td>';
					echo'<td><input type="text" name="Prenom" value="'.$prenom.'"></td>';					
				}
				else{
					echo' <td>Editeur :</td>';
					echo'<td><input type="text" name="Prenom"></td>';
				}
				?>
				</tr>
				<tr>
				<?php 
				if(isset($_GET['adresse'])){
					$adresse = $_GET['adresse'];
					echo' <td>Quantite :</td>';
					echo'<td><input type="number" name="Adresse" value="'.$adresse.'"></td>';					
				}
				else{
					echo' <td>Quantite :</td>';
					echo'<td><input type="number" name="Adresse"></td>';
				}
				?>
				</tr>
					
				    			
		     
		
		
				
		<tr>
		        <td><label for="type_item">Genre:</label></td>

					<td><select  name="type_item">
                    <option value="Autre">Autre</option>
                    <option value="Aventure">Aventure</option>
                    <option value="Comedie">Comedie</option>
                    <option value="Dramatique">Dramatique</option>
                    <option value="Policier">Policier</option>
                    <option value="Theatre">Theatre</option>
   					<option value="Tragedie">Tragedie</option>
                    <option value="Romantique">Romantique</option>						
					</select> </td>
		        
        </tr>
        
        	
		
		

		</table>
				
		<tr>
      <button class="button" name="button1">Enregistrer</button>
      
      
		</tr>
        </form>
        <button class="button" name="button2" onclick="document.location.href='ajouter_article.php'">Page precedente</button>
  

    <?php	
    session_start();

    if(!isset($_GET['id'])){
        exit();
    }
        else{
            $id_value = $_GET['id'];
            $_SESSION['var'] = $id_value;}

		if(!isset($_GET['signup'])){
			exit();
		}
			else{
				$signupCheck = $_GET['signup'];

				if($signupCheck=="empty"){
					echo "<p class'error'>Vous n'avez pas rempli tous les champs!</p>";
					exit();

				}elseif($signupCheck=="mail_used"){
					echo "<p class'error'>Ce nom d objet est deja pris!</p>";
					exit();
				}elseif($signupCheck=="success"){
				echo "<p class'error'>Vous avez ete enregistre avec succes! Merci de vous connecter !</p>";
				exit();
				}
			}
		

	?>
	 
	
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
<div id="scrollUp"><a href="#top"><img src="C:\wamp64\www\PP\to_top.png"/></a></div>
<link href='magasin.css' rel='stylesheet' type='text/css'>
<script src="magasin.js"></script>

<footer class="py-5 bg-dark">
	<div class="container">
    	<p class="m-0 text-center text-white">Copyright &copy; ECE Amazon 2019</p>
	</div>
</footer>

		</body>
	</html>