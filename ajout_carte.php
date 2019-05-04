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
session_start();
        $validation= isset($_POST["validation"])? $_POST["validation"] : "";

        $database = "ece_amazon";
//connectez-vous dans votre BDD
//Rappel: votre serveur = localhost et votre login = root et votre password = <rien>
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);


 if ($_POST['boutton'])
        {    echo $validation ."<br>";
        	if($validation=='Oui')
        	{	
        		$Id_util=$_SESSION['Id'];
        		$type_card= $_SESSION['Type_carte'];
        		$num_carte= $_SESSION['Num_carte'];
        		$date = $_SESSION['Date_carte'];
       		    $nom_carte= $_SESSION['Nom_carte']; 
        		$code_carte= $_SESSION['Code_carte'];

        		echo $Id_util ."<br>";
        		echo $type_card ."<br>";
        		echo $num_carte ."<br>";

        		$addsql2 = "INSERT INTO `carte_bank` (`Id`,`Type_carte`, `Num_carte`, `Date_carte`, `Nom_carte`, `Code_carte`) VALUES ('$Id_util', '$type_card', '$num_carte', '$date', '$nom_carte', '$code_carte')";

				$resul2 = mysqli_query($db_handle, $addsql2);
				header("Location: panier.php");

        	}
        	else
        	{
        		echo"vous ne pouvez pas réaliser d'achat sur notre site sans enregistrer votre carte";
        		echo"<p><a href='magasin.php'>Retour à la page d'accueil.</a> </p>";

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