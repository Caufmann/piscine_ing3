<html>
  <head>
    <title>Connexion au site</title>
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
  if(isset($_GET['msg']))
  {
    echo $_GET['msg'];
  }
?>

    <form method="post" action="connecter.php">
      <table border="0" width="400" align="center">
        <tr>
          <td width="200"><b>Votre Mail</b></td>
          <td width="200">
            <input type="text" name="Mail">
          </td>
        </tr>
        <tr>
          <td width="200"><b>Votre mot de passe<b></td>
          <td width="200">
            <input type="password" name="Password">
          </td>
        </tr>
        <tr>
          <td colspan="2" align="center">
            <input type="submit" name="button1" value="Submit">
          </td>
        </tr>
      </table>
      <p><a href="inscription.html">Je n'ai pas de compte</a> </p>
    </form>
  </body>
</html>