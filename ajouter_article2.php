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



<?php  
session_start();
	//identifier votre BDD 
	if(isset($_POST['button1'])) {
		$database = "ece_amazon";
		$db_handle = mysqli_connect('localhost', 'root', '');
		$db_found = mysqli_select_db($db_handle, $database);
		if($db_found){	
            $photo1='0';
            $photo2='0';
            $photo3='0';	

			$nom = isset($_POST["Nom"]) ? $_POST["Nom"] : "";			
			$description = isset($_POST["Prenom"]) ? $_POST["Prenom"] : "";		
            $prix = isset($_POST["Adresse"]) ? $_POST["Adresse"] : "";
            $typeitem = isset($_POST["type_item"]) ? $_POST["type_item"] : "";
            $photo1 = isset($_POST["foto1"]) ? $_POST["foto1"] : "";
            $photo2 = isset($_POST["foto2"]) ? $_POST["foto2"] : "";
            $photo3 = isset($_POST["foto3"]) ? $_POST["foto3"] : "";
			

			

           
               $dossier_img1 = 'img/'.$photo1;
           
               $dossier_img2 = 'img/'.$photo2;
           
               $dossier_img3 = 'img/'.$photo3;
			
        	

        	//BLINDAGE
        	if(empty($nom) || empty($description) || empty($prix) || $photo1=='0' ) {
				header("Location: ajouter_article.php?signup=empty&nom=$nom&prenom=$description&adresse=$prix");    
			}else{      
        					$checkslq = "SELECT `Nom` FROM `article` WHERE `Nom` LIKE '$nom'";
        
       						 $result = mysqli_query($db_handle, $checkslq);

       							 $sql2 = "SELECT max(Id_article) FROM article";
			
									$results = mysqli_query($db_handle, $sql2);
									$data = mysqli_fetch_assoc($results);
									$idmax=$data['max(Id_article)'];
		
									$idmaxi=$idmax+1;
		
        
								if(mysqli_num_rows($result) != 0){
									header("Location: ajouter_article.php?signup=mail_used&prenom=$description&adresse=$prix"); 
									exit();	
            
								}
								else{
                                    $id = $_SESSION['Id'];
									$addsql = "INSERT INTO `article` (`Id_article`,`Categorie`, `Nom`, `Photo1`, `Photo2`, `Photo3`, `Description`, `Prix`, `Reduction_prix`, `Cpt_vente`, `Id`) VALUES ('$idmaxi', '$typeitem', '$nom', '$photo1', '$photo2', '$photo3', '$description', '$prix', 1, 0, '$id')";
									//RAJOUTER LES AJOUTS DE PHOTOS
									$result2 = mysqli_query($db_handle, $addsql);
                                    $photo1 = 'imgexpl/'.$photo1;
                                    $photo2 = 'imgexpl/'.$photo2;
                                    $photo3 = 'imgexpl/'.$photo3;
									
									
									
                                        copy($photo1, $dossier_img1);
                                    
                                    
                                        copy($photo2, $dossier_img2);
                                    
                                    
                                        copy($photo3, $dossier_img3);
                                    
                                    
                                    								
                                    
                                    if($typeitem=='Musique'){
                                        header("Location: info_musique.php?id=$idmaxi"); 
                                     }
                                     if($typeitem=='Livre'){
                                        header("Location: info_livre.php?id=$idmaxi"); 
                                     }
                                     if($typeitem=='Sport'){
                                        header("Location: info_sport.php?id=$idmaxi"); 
                                     }
                                     if($typeitem=='Vetement'){
                                        header("Location: info_vetement.php?id=$idmaxi"); 
                                     }
									
									exit();
								}
							}
							
		}
		else{
		echo 'BD not found';
		}
		mysqli_close($db_handle);	 
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