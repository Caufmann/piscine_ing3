<!DOCTYPE html>
<html>
<head>
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
	//identifier votre BDD 
	if(isset($_POST['button1'])) {
		$database = "ece_amazon";
		$db_handle = mysqli_connect('localhost', 'root', '');
		$db_found = mysqli_select_db($db_handle, $database);
		if($db_found){	
			$typecarte = 0;
			$numcarte = 0;
			$date = 0;
			$nomcarte = 0;
			$crypto = 0;	

			$nom = isset($_POST["Nom"]) ? $_POST["Nom"] : "";
			$mdp = isset($_POST["mdp"]) ? $_POST["mdp"] : "";
			$mdp2 = isset($_POST["mdp2"]) ? $_POST["mdp2"] : "";
			$prenom = isset($_POST["Prenom"]) ? $_POST["Prenom"] : "";		
			$mail = isset($_POST["Mail"]) ? $_POST["Mail"] : "";
        	$adresse = isset($_POST["Adresse"]) ? $_POST["Adresse"] : "";
        	$ville = isset($_POST["Ville"]) ? $_POST["Ville"] : "";		
			$code_postal = isset($_POST["Code_postal"]) ? $_POST["Code_postal"] : "";
			$telephone = isset($_POST["Telephone"]) ? $_POST["Telephone"] : "";
			$typecarte = isset($_POST["type_card"]) ? $_POST["type_card"] : "";
			$numcarte = isset($_POST["number"]) ? $_POST["number"] : "";
			$date = isset($_POST["date"]) ? $_POST["date"] : "";
			$nomcarte = isset($_POST["nom_carte"]) ? $_POST["nom_carte"] : "";
			$crypto = isset($_POST["num_carte"]) ? $_POST["num_carte"] : "";

        	//BLINDAGE
        	if(empty($nom) || empty($mdp) || empty($prenom) || empty($mail) || empty($adresse) || empty($ville) || empty($code_postal) || empty($telephone) ) {
				header("Location: inscrition_acheteur.php?signup=empty");    
			} elseif(!preg_match("/^[a-zA-Z]*$/", $nom) || !preg_match("/^[a-zA-Z]*$/", $mdp) || !preg_match("/^[a-zA-Z]*$/", $prenom)){
					header("Location: inscrition_acheteur.php?signup=char"); 
					exit();
			
					} elseif(!preg_match("#^[a-z0-9._-]+@edu.ece.fr$#", $mail)){
						header("Location: inscrition_acheteur.php?signup=mail&nom=$nom&prenom=$prenom&adresse=$adresse&ville=$ville&telephone=$telephone&Code_postal=$code_postal"); 
						exit();
			
					}elseif(strcmp($mdp,$mdp2)!==0){ 
						header("Location: inscrition_acheteur.php?signup=mdp&nom=$nom&prenom=$prenom&adresse=$adresse&ville=$ville&telephone=$telephone&Code_postal=$code_postal"); 
						exit(); 
					}else{      
        					$checkslq = "SELECT `Mail` FROM `Acheteur` WHERE `Mail` LIKE '$mail'";
        
       						 $result = mysqli_query($db_handle, $checkslq);

       							 $sql2 = "SELECT max(Id) FROM acheteur";
			
									$results = mysqli_query($db_handle, $sql2);
									$data = mysqli_fetch_assoc($results);
									$idmax=$data['max(Id)'];
		
									$idmaxi=$idmax+1;
		
        
								if(mysqli_num_rows($result) != 0){
									header("Location: inscrition_acheteur.php?signup=mail_used"); 
									exit();	
            
								}
								else{
									$addsql = "INSERT INTO `acheteur` (`Id`,`Mail`, `Password`, `Nom`, `Prenom`, `Adresse`, `Ville`, `Code_postal`, `Telephone`) VALUES ('$idmaxi', '$mail', '$mdp', '$nom', '$prenom', '$adresse', '$ville', '$code_postal', '$telephone')";
									$addsql2 = "INSERT INTO `carte_bank` (`Id`,`Type_carte`, `Num_carte`, `Date_carte`, `Nom_carte`, `Code_carte`) VALUES ('$idmaxi', '$typecarte', '$numcarte', '$date', '$nomcarte', '$crypto')";

									$result2 = mysqli_query($db_handle, $addsql);
									$resul2 = mysqli_query($db_handle, $addsql2);
									header("Location: inscrition_acheteur.php?signup=success"); 
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

