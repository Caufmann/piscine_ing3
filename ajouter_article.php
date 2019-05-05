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
		<h2>AJOUT NOUVEL OBJET</h2>
    
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
<div id="scrollUp"><a href="#top"><img src="C:\wamp64\www\PP\to_top.png"/></a></div>
<link href='magasin.css' rel='stylesheet' type='text/css'>
<script src="magasin.js"></script>
	
		<form action="ajouter_article2.php" method="post">
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
					echo' <td>Description* :</td>';
					echo'<td><input type="text" name="Prenom" value="'.$prenom.'"></td>';					
				}
				else{
					echo' <td>Description* :</td>';
					echo'<td><input type="text" name="Prenom"></td>';
				}
				?>
				</tr>
				<tr>
				<?php 
				if(isset($_GET['adresse'])){
					$adresse = $_GET['adresse'];
					echo' <td>Prix* (en €):</td>';
					echo'<td><input type="number" name="Adresse" value="'.$adresse.'"></td>';					
				}
				else{
					echo' <td>Prix* (en €) :</td>';
					echo'<td><input type="number" name="Adresse"></td>';
				}
				?>
				</tr>
					
				    			
		     
		
		
				
		<tr>
		        <td><label for="type_item">Categorie d'objet :</label></td>

					<td><select  name="type_item">
   					 <option value="Livre">Livre</option>
   					 <option value="Musique">Musique</option>
    				<option value="Vetement">Vetement</option>
    				<option value="Sport">Sport et loisir</option>
    								
					</select> </td>
		        
        </tr>
        <tr>
                <td><label for="foto1">Photo 1*:</label></td>

                <td><input type="file"
                    id="foto1" name="foto1"
                    accept="image/png, image/jpeg">  </td>
            </tr>

            <tr>
                <td><label for="foto2">Photo 2:</label></td>

                 <td><input type="file"
                    id="foto2" name="foto2"
                    accept="image/png, image/jpeg">  </td>
            </tr>	
            <tr>
                <td><label for="foto3">Photo 3:</label></td>

                 <td><input type="file"
                    id="foto3" name="foto3"
                    accept="image/png, image/jpeg">  </td>
            </tr>	
		
		

		</table>
				
		<tr>
      <button class="button" name="button1">Page suivante</button>
      
      
		</tr>
		
		






  </form>
	<button class="button" name="button2" onclick="document.location.href='vendeur.php'">Page precedente</button>
  

	<?php	

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