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
        <li class="nav-item"><a class="nav-link" href="connecter.html">Se connecter</a></li>
        <li class="nav-item"><a class="nav-link" href="logout.php">Se deconnecter</a></li>
      </ul>
  </nav>


 <?php
  session_start();
  $database = "ece_amazon";
//connectez-vous dans votre BDD
//Rappel: votre serveur = localhost et votre login = root et votre password = <rien>
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

if ($db_found) 
    {


      $sql = "  SELECT * FROM vendeur WHERE Id = '".$_SESSION["Id"]."' ";
      $result = mysqli_query($db_handle, $sql);
      if (mysqli_num_rows($result) == 0) 
      {
        //l'article recherché n'existe pas
      echo "Votre profil n'a pas été trouvé";
      } 
      else 
      {
        echo "Voilà votre profil :". "<br>". "<br>";
      //on trouve l'article recherché
        while ($data = mysqli_fetch_assoc($result)) 
        {
          echo "Id: " . $data['Id'] . "<br>";
          echo "Mail: " . $data['Mail'] . "<br>";
          echo "Nom: " . $data['Nom'] . "<br>";
          echo "Pseudo: " . $data['Pseudo'] . "<br>";
          $tof=$data['Photo'];
          $tof_fond=$data['Img_fond'];

         echo"<html>
                <table>
                <tr>
                 <td><img src=\"img/$tof\" alt=\"user pic\" style=\"max-width:200px\"border=\"0\"></td>
                 <td><img src=\"img/$tof_fond\" alt=\"user pic\" style=\"max-width:200px\"border=\"0\"></td>
               </tr>
               </table>
               </html>"; 
          echo "<br>";

          
        }
      }
    }


  ?>
  <button class="button" name="button2" onclick="document.location.href='ajouter_article.php'">Ajouter des articles</button>

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