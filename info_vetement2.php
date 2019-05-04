<!DOCTYPE html>
<html>
	<head>
		<title>Caracteristiques sport</title>
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


<?php  
session_start();

	//identifier votre BDD 
	
		$database = "ece_amazon";
		$db_handle = mysqli_connect('localhost', 'root', '');
		$db_found = mysqli_select_db($db_handle, $database);
		if($db_found){	        	

			$couleur = isset($_POST["Nom"]) ? $_POST["Nom"] : "";			
			$taille = isset($_POST["Prenom"]) ? $_POST["Prenom"] : "";		
            $quantite = isset($_POST["Adresse"]) ? $_POST["Adresse"] : "";
            $typeitem = isset($_POST["type_item"]) ? $_POST["type_item"] : "";    
            $genre = isset($_POST["Genre"]) ? $_POST["Genre"] : "";     	

        	//BLINDAGE
        	if(empty($couleur) || empty($taille) || empty($quantite) || empty($genre)) {
				header("Location: info_vetement.php?signup=empty&nom=$couleur&prenom=$taille&adresse=$quantite");    
			}else{
                
        
                $id_value = $_SESSION['var'];
                                    $sql2 = "SELECT max(Code_article) FROM vetement";
			
									$results = mysqli_query($db_handle, $sql2);
									$data = mysqli_fetch_assoc($results);
									$idmax=$data['max(Code_article)'];
		
                                    $idmaxi=$idmax+1;
                                    
                                    
									$addsql = "INSERT INTO `vetement` (`Identifiant`,`Code_article`, `Categorie`, `Type`, `Taille`, `Couleur`,`Genre`, `Quantite`) VALUES ($id_value, $idmaxi, 'Vetement', '$typeitem', '$taille', '$couleur', '$genre', $quantite)";
									//RAJOUTER LES AJOUTS DE PHOTOS
                                    $result2 = mysqli_query($db_handle, $addsql);   
                                    header("Location: info_vetement.php");                            
                                   
									
									exit();
								}
							
							
		}
		else{
		echo 'BD not found';
		}
		mysqli_close($db_handle);	 
	

	  
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

