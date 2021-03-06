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

	<h1>Vous aimez lire, alors laissez tomber la tele c'est mieux</h1>
	</br>
  <?php
  $database = "ece_amazon";
//connectez-vous dans votre BDD
//Rappel: votre serveur = localhost et votre login = root et votre password = <rien>
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

if ($db_found) 
    {
    //$sql = "SELECT * FROM article";
      
    //on cherche l'article avec les param Categorie et Nom 
      $sql = " SELECT * FROM article ";
      $result = mysqli_query($db_handle, $sql);
      
        while ($data = mysqli_fetch_assoc($result)) 
        {
          $tof=$data['Photo1'];
          $name=$data['Nom'];
          $price=$data['Prix'];
          $id_article = $data['Id_article'];
          $categorie = $data['Categorie'];

           echo"<html>
                <table>
                <tr>
                 <td><a href=\"article.php?id_article=$id_article&categorie=$categorie\"><img src=\"img/$tof\" alt=\"user pic\" style=\"max-width:100px\"border=\"0\"></a></td>
                 <td>$name</td>
                 <td>$price €</td>
               </tr>
               </table>
               </html>";

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