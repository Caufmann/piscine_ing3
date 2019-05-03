


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
        <li class="nav-item"><a class="nav-link" href="connecter.php">Se connecter</a></li>
        <li class="nav-item"><a class="nav-link" href="logout.php">Se deconnecter</a></li>
  		</ul>
	</nav>

	<h2>Voici votre article</h2>
	</br>

   <?php
      if (isset($_GET["id_article"]) and isset($_GET["categorie"])) 
      {
          $database = "ece_amazon";
          //connectez-vous dans votre BDD
          //Rappel: votre serveur = localhost et votre login = root et votre password = <rien>
          $db_handle = mysqli_connect('localhost', 'root', '');
          $db_found = mysqli_select_db($db_handle, $database);


          switch ($_GET["categorie"]) 
          {
            case 'Vetement':
            // make the request to the DATABASE
            $sql = "SELECT * FROM article WHERE id_article = '".$_GET["id_article"]."' ;";
            $result = mysqli_query($db_handle, $sql);
            if (mysqli_num_rows($result) == 0)
            {
            //l'article recherché n'existe pas
            echo "rupture de stock";
            }
            else
            {
              while ($data = mysqli_fetch_assoc($result))
              {
                 $tof=$data['Photo1'];
                 $tof2=$data['Photo2'];
                 $tof3=$data['Photo3'];

                 $name=$data['Nom'];
                 $price=$data['Prix'];
                 $description=$data['Description'];

               echo"<html>
                    <table>
                    <tr>
                     <td><img src=\"img/$tof\" alt=\"user pic\" style=\"max-width:250px\"border=\"0\"></td>
                      <td><img src=\"img/$tof2\" alt=\"user pic\" style=\"max-width:250px\"border=\"0\"></td>
                       <td><img src=\"img/$tof3\" alt=\"user pic\" style=\"max-width:250px\"border=\"0\"></td>
                       </tr>
                    <tr>
                     <td>$name</td>
                     <td>$price €</td>
                     <td>$description</td>
                   </tr>
                   </table>
                   </html>";
                  } 
                }

              echo "<br>"." Voici les differents modèles en stock";


            $sql2="SELECT DISTINCT Taille,Couleur,Genre 
            FROM vetement 
            WHERE Identifiant = '".$_GET["id_article"]."' ;";
              $resulta = mysqli_query($db_handle, $sql2); // send the query
              if (mysqli_num_rows($resulta) == 0)
                {
                  //l'article recherché n'existe pas
                echo "Rupture de Stock";
                 }
                else
                {   $taille_prec=0;
                  $couleur_prec='';
                  $genre_prec='';
                    
                  while ($data = mysqli_fetch_assoc($resulta))
                  {

                    $taille=$data['Taille'];
                    $couleur=$data['Couleur'];
                    $genre=$data['Genre'];
                    if ($taille!=$taille_prec || $couleur!=$couleur_prec || $genre!=$genre_prec)
                    {
                        echo"<html>
                        <table>
                       <tr>
                        <td>$taille</td>
                        <td>$couleur</td>
                        <td>$genre</td>
                       </tr>
                       </table>
                       </html>";
                       
                    }
                    $taille_prec=$taille;
                    $genre_prec=$genre;
                    $couleur_prec=$couleur;
                  }
                }

             
               break;

               /*
            case 'sports':
            // make the request to the DATABASE
            $sql = "SELECT *
                   FROM sportsloisirs
                   WHERE id_sl = '".$_GET["id"]."' ;";
            $result = mysqli_query($conn, $sql); // send the query
            $row = mysqli_fetch_assoc($result);
             if (mysqli_num_rows($result) > 0) {
                 $nom=$row["nom"];
                 $description=$row["description"]."<br>Marque : ".$row["marque"];
                 $prix=$row["prix"];
                 $nombre=$row["nombre"];
                 $photo=$row["photo"];
                 $genre=$row["genre"];
             } else {
                 $isLost=true;
                 echo "<div class=\"alert alert-danger\" role=\"alert\">
               Article Introuvable
               </div>";
             }
               break;
            case 'book':
            // make the request to the DATABASE
            $sql = "SELECT *
                   FROM book
                   WHERE id_book = '".$_GET["id"]."' ;";
            $result = mysqli_query($conn, $sql); // send the query
            $row = mysqli_fetch_assoc($result);
             if (mysqli_num_rows($result) > 0) {
                 $nom=$row["title"];
                 $description=$row["description"] . "<br>Auteur : ".$row["auteur"]."<br>Date de Parution : ".$row["date"]."<br>Editeur : ".$row["editeur"];
                 $prix=$row["prix"];
                 $nombre=$row["nombre"];
                 $photo=$row["photo"];
                 $genre=$row["genre"];
             } else {
                 $isLost=true;
                 echo "<div class=\"alert alert-danger\" role=\"alert\">
               Article Introuvable
               </div>";
             }
               break;
            case 'cloth':
            // make the request to the DATABASE
            $sql = "SELECT *
                   FROM vetements
                   WHERE id_vetement = '".$_GET["id"]."' ;";
            $result = mysqli_query($conn, $sql); // send the query
            $row = mysqli_fetch_assoc($result);
             if (mysqli_num_rows($result) > 0) {
                 $nom=$row["nom"];
                 $description=$row["description"] . "<br>Couleur : ".$row["couleur"]."<br>Taille : ".$row["taille"];
                 $prix=$row["prix"];
                 $nombre=$row["nombre"];
                 $photo=$row["photo"];
                 $genre=$row["sexe"];
             } else {
                 $isLost=true;
                 echo "<div class=\"alert alert-danger\" role=\"alert\">
               Article Introuvable
               </div>";
             }
               break;*/
            default:
               header("location:categorie.php");
               break;
            }
      } 
      else 
      {
          header("location:categorie.php");
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