


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
                     <td><img src=\"img/$tof\" alt=\"\" style=\"max-width:250px\"border=\"0\"></td>
                      <td><img src=\"img/$tof2\" onerror=\"this.style.display='none';\" style=\"max-width:250px\"border=\"0\"></td>
                       <td><img src=\"img/$tof3\" onerror=\"this.style.display='none';\" style=\"max-width:250px\"border=\"0\"></td>
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
              echo"<html>
                        <table>
                       <tr>
                        <td>Taille</td>
                        <td>Couleur</td>
                        <td>Genre</td>
                       </tr>
                       </table>
                       </html>";


            $sql2="SELECT DISTINCT Taille,Couleur,Genre,Code_article 
            FROM vetement 
            WHERE Identifiant = '".$_GET["id_article"]."' ;";
              $resulta = mysqli_query($db_handle, $sql2); // send the query
              if (mysqli_num_rows($resulta) == 0)
                {
                  //l'article recherché n'existe pas
                echo "Rupture de Stock";
                 }
                else
                { $taille_prec=0;
                  $couleur_prec='';
                  $genre_prec='';
                    
                  while ($data = mysqli_fetch_assoc($resulta))
                  {

                    $taille=$data['Taille'];
                    $couleur=$data['Couleur'];
                    $genre=$data['Genre'];
                    $code_article=$data['Code_article'];
                    if ($taille!=$taille_prec || $couleur!=$couleur_prec || $genre!=$genre_prec)
                    {
                        echo"<html>
                         <!-- <form action='article.php' method='post'>-->
                        <table>
                       <tr>
                        <td>$taille</td>
                        <td>$couleur</td>
                        <td>$genre</td>
                         <!-- <td>
                          <input type='submit' name = 'button$code_article'value='Ajouter au panier'>
                          </td>-->
                       </tr>
                       </table>
                       </form>
                       </html>";

                       
                    }
                    $taille_prec=$taille;
                    $genre_prec=$genre;
                    $couleur_prec=$couleur;

                  }
                }
                  $id_article=$_GET["id_article"];
                 echo"<!DOCTYPE html>
                <html>
                 <h2>Veuillez passer votre commande</h2>
                         <form  action='test_vetement.php?id_article=$id_article' method='post'>
                        <table>
                       <tr>
                          <td> Taille:</td>
                          <td><select name='Taille'>
                                <option value='XS'>XS</option>
                                <option value='S'>S</option>
                                <option value='M'>M</option>
                                <option value='L'>L</option>
                                <option value='XL'>XL</option>
                                
                              </select>
                          <td>
                        </tr>
                        <tr>
                          <td> Couleur:</td>
                          <td><select name='Couleur'>
                                <option value='Rouge'>Rouge</option>
                                <option value='Noir'>Noir</option>
                                <option value='Blanc'>Blanc</option>
                                 <option value='Bleu'>Bleu</option>
                                  <option value='Rose'>Rose</option>
                              </select>
                          <td>
                        </tr>
                        <tr>
                          <td> Genre:</td>
                          <td><select name='Genre'>
                                <option value='M'>M</option>
                                <option value='F'>F</option>
                              </select>
                          <td>
                        </tr>
                        
                        <tr>
                          <td >
                          <input type='submit' name='boutton' value='Ajouter au panier'>
                          </td>
                       </tr>
                       </table>
                       </form>
                    </html>";


             
               break;

               
            case 'Musique':
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
                     <td><img src=\"img/$tof\" alt=\"\" style=\"max-width:250px\"border=\"0\"></td>
                      <td><img src=\"img/$tof2\" onerror=\"this.style.display='none';\" style=\"max-width:250px\"border=\"0\"></td>
                       <td><img src=\"img/$tof3\" onerror=\"this.style.display='none';\" style=\"max-width:250px\"border=\"0\"></td>
                       </tr>
                     <td>$name</td>
                     <td>$price €</td>
                     <td>$description</td>
                   </tr>
                   </table>
                   </html>";
                  } 
                }

              echo "<br>"." &nbsp  &nbsp &nbsp &nbsp Informations supplémentaires:";
              echo"<html>
                        <table>
                       <tr>
                        <td>Genre</td>
                        <td>Artiste</td>
                        <td>Album</td>
                       </tr>
                       </table>
                       </html>";


            $sql2="SELECT* 
            FROM musique 
            WHERE Identifiant = '".$_GET["id_article"]."' ;";
              $resulta = mysqli_query($db_handle, $sql2); // send the query
              if (mysqli_num_rows($resulta) == 0)
                {
                  //l'article recherché n'existe pas
                echo "Rupture de Stock";
                 }
                else
                {   
                  while ($data = mysqli_fetch_assoc($resulta))
                  {

                    $genre=$data['Genre'];
                    $artiste=$data['Artiste'];
                    $album=$data['Album'];
                   
                        echo"<html>
                        <table>
                       <tr>
                        <td>$genre</td>
                        <td>$artiste</td>
                        <td>$album</td>
                       </tr>
                       </table>
                       </html>";
                       
                  }
                }
                 $id_article=$_GET["id_article"];
                 echo"<!DOCTYPE html>
                <html>
                 <h2>Veuillez passer votre commande</h2>
                         <form  action='test_musique.php?id_article=$id_article' method='post'>
                        <table>
                        <tr>
                          <td >
                          <input type='submit' name='boutton' value='Ajouter au panier'>
                          </td>
                       </tr>
                       </table>
                       </form>
                    </html>";


             
               break;
               
             case 'Sport':
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
                     <td><img src=\"img/$tof\" alt=\"\" style=\"max-width:250px\"border=\"0\"></td>
                      <td><img src=\"img/$tof2\" onerror=\"this.style.display='none';\" style=\"max-width:250px\"border=\"0\"></td>
                       <td><img src=\"img/$tof3\" onerror=\"this.style.display='none';\" style=\"max-width:250px\"border=\"0\"></td>
                       </tr>
                     <td>$name</td>
                     <td>$price €</td>
                     <td>$description</td>
                   </tr>
                   </table>
                   </html>";
                  } 
                }

              echo "<br>"."  &nbsp &nbsp &nbsp &nbspinformations supplémentaires:";
              echo"<html>
                        <table>
                       <tr>
                        <td>activite</td>
                        <td>marque</td>
                        
                       </tr>
                       </table>
                       </html>";


             $sql2="SELECT* 
            FROM sport 
            WHERE Identifiant = '".$_GET["id_article"]."' ;";
              $resulta = mysqli_query($db_handle, $sql2); // send the query
              if (mysqli_num_rows($resulta) == 0)
                {
                  //l'article recherché n'existe pas
                echo "Rupture de Stock";
                 }
                else
                {   
                  while ($data = mysqli_fetch_assoc($resulta))
                  {

                    $nom_activite=$data['Nom_activite'];
                    $marque=$data['Marque'];
                    
                   
                        echo"<html>
                        <table>
                       <tr>
                        <td>$nom_activite</td>
                        <td>$marque</td>
                       </tr>
                       </table>
                       </html>";
                       
                  }
                }
                $id_article=$_GET["id_article"];
                 echo"<!DOCTYPE html>
                <html>
                 <h2>Veuillez passer votre commande</h2>
                         <form  action='test_sport.php?id_article=$id_article' method='post'>
                        <table>
                        <tr>
                          <td >
                          <input type='submit' name='boutton' value='Ajouter au panier'>
                          </td>
                       </tr>
                       </table>
                       </form>
                    </html>";

             
               break;


            case 'Livre':
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
                     <td><img src=\"img/$tof\" alt=\"\" style=\"max-width:250px\"border=\"0\"></td>
                      <td><img src=\"img/$tof2\" onerror=\"this.style.display='none';\" style=\"max-width:250px\"border=\"0\"></td>
                       <td><img src=\"img/$tof3\" onerror=\"this.style.display='none';\" style=\"max-width:250px\"border=\"0\"></td>
                       </tr>
                     <td>$name</td>
                     <td>$price €</td>
                     <td>$description</td>
                   </tr>
                   </table>
                   </html>";
                  } 
                }

              echo "<br>"."   &nbsp &nbsp&nbsp &nbspinformations supplémentaires:";
               echo"<html>
                        <table>
                       <tr>
                        <td>genre</td>
                        <td>auteur</td>
                        <td>editeur</td>
                       </tr>
                       </table>
                       </html>";


            $sql2="SELECT* 
            FROM livre
            WHERE Identifiant = '".$_GET["id_article"]."' ;";
              $resulta = mysqli_query($db_handle, $sql2); // send the query
              if (mysqli_num_rows($resulta) == 0)
                {
                  //l'article recherché n'existe pas
                echo "Rupture de Stock";
                 }
                else
                {   
                  while ($data = mysqli_fetch_assoc($resulta))
                  {

                    $genre=$data['Genre'];
                    $auteur=$data['Auteur'];
                    $editeur=$data['Editeur'];
                   
                        echo"<html>
                        <table>
                       <tr>
                        <td>$genre</td>
                        <td>$auteur</td>
                        <td>$editeur</td>
                       </tr>
                       </table>
                       </html>";
                       
                  }
                }
                $id_article=$_GET["id_article"];
                 echo"<!DOCTYPE html>
                <html>
                 <h2>Veuillez passer votre commande</h2>
                         <form  action='test_livre.php?id_article=$id_article' method='post'>
                        <table>
                        <tr>
                          <td >
                          <input type='submit' name='boutton' value='Ajouter au panier'>
                          </td>
                       </tr>
                       </table>
                       </form>
                    </html>";
             
               break;
            default:
               header("location:categories.php");
               break;
            }


       /* $Taille= isset($_POST["Taille"])? $_POST["Taille"] : "";
        $Genre = isset($_POST["Genre"])? $_POST["Genre"] : "";
        $Couleur= isset($_POST["Couleur"])? $_POST["Couleur"] : ""; 

          
        if ($_POST['boutton'])
        {

            $sql2 = "SELECT Code_article FROM vetement WHERE Taille LIKE '%$Taille%' AND Couleur LIKE '%$Couleur%' AND Genre LIKE '%$Genre%'";
              //echo" <br><br>";
              $results = mysqli_query($db_handle, $sql2);
              $data = mysqli_fetch_assoc($results);

              $Code_article=$data['Code_article'];

             $sql3 = "SELECT Nom,Prix,Reduction_prix FROM article
              WHERE Identifiant = '".$_GET["id_article"]."' ;";
              $result = mysqli_query($db_handle, $sql3);
              $datas = mysqli_fetch_assoc($result);

              $Nom_article=$datas['Nom'];
              $Prix_article=$datas['Prix'];
              $Reduction_prix=$datas['Reduction_prix'];

          $sql="INSERT INTO 
          Panier(Id_panier,Code_article,Nom_article,Prix_article,Reduction_prix) VALUES(1,'$Code_article','$Nom_article','$Prix_article','$Reduction_prix')";
        }*/



            

      } 
      else 
      {
          header("location:categories.php");
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