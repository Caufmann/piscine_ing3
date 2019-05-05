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
        $type_card= isset($_POST["type_card"])? $_POST["type_card"] : "";
        $number= isset($_POST["number"])? $_POST["number"] : "";
        $date = isset($_POST["date"])? $_POST["date"] : "";
        $nom_carte= isset($_POST["nom_carte"])? $_POST["nom_carte"] : ""; 
        $num_carte= isset($_POST["num_carte"])? $_POST["num_carte"] : ""; 

$database = "ece_amazon";
//connectez-vous dans votre BDD
//Rappel: votre serveur = localhost et votre login = root et votre password = <rien>
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);
          
   if ($_POST['boutton'])
        {
          $id_util=$_SESSION['Id'];

            $_SESSION['Num_carte'] = $number;
            $_SESSION['Nom_carte'] = $nom_carte;
            $_SESSION['Date_carte'] = $date;
            $_SESSION['Code_carte'] = $num_carte;
            $_SESSION['Type_carte'] = $type_card;

            $sql2 = "SELECT * FROM carte_bank WHERE Num_carte LIKE '%$number%' AND Nom_carte LIKE '%$nom_carte%' AND Type_carte LIKE '%$type_card%'
             AND Date_carte LIKE '%$date%'
              AND Code_carte LIKE '%$num_carte%'
              AND Id = '$id_util'";
              //echo" <br><br>";
              $results = mysqli_query($db_handle, $sql2);
              $data = mysqli_fetch_assoc($results);

              if (mysqli_num_rows($results) == 0)
					{


					echo "Cette carte n'a pas été enregistrée ou vous n'etes pas le bon propriétaire";

           echo'<!DOCTYPE html>
           <html>  
           <h3> Voulez-vous enregistrer la carte saisie précédemment?</h3>
           <form  action="ajout_carte.php" method="post">
              <table>
                   <tr>
                      <td>
                        <select name="validation">
                                        <option value="Oui">Oui</option>
                                        <option value="Non">Non</option>         
                        </select>
                       </td>
                    </tr>

                     <tr>
                          <td >
                          <input type="submit" name="boutton" value="ajouter ma carte">
                          </td>
                       </tr>
                 </tabled>
            </form>
           </html>';

					} 
    		else
    		  {

            echo "Commande réussie, un mail de confirmation va vous etre envoyé.";
            $sql1="SELECT Code_article,Nom_article FROM Panier ";
            $result = mysqli_query($db_handle, $sql1);
            while($data=mysqli_fetch_assoc($result))
            {
              $code_article=$data['Code_article'];
              $nom_article=$data['Nom_article'];
              echo $code_article."<br>";
              echo $nom_article."<br><br>";

            if($code_article>149)
            {
                 $sqla="SELECT Code_article,Quantite,Cpt_vente FROM vetement";
              $resulta = mysqli_query($db_handle, $sqla);
               while($dataa=mysqli_fetch_assoc($resulta))
               {
                //if($dataa['Code_article']==$code_article)
                  $code=$dataa['Code_article'];
                   
                  if($code==$code_article)
                  {
                  $quant=$dataa['Quantite'];
                  $new_quantite= $quant-1;


                  $sqla1="UPDATE vetement
                  SET Quantite = '$new_quantite'
                  WHERE Code_article='$code_article'";
                  $resulta1 = mysqli_query($db_handle, $sqla1);



                  /*$compt=$dataa['Cpt_vente'];
                  $new_compt= $compt+1;

                     $sqla2="UPDATE vetement
                    SET Cpt_vente = '$new_compt'
                    WHERE Code_article='$code_article'";
                    $resulta2 = mysqli_query($db_handle, $sqla2);*/
                }
                
               }
            }
            else if ($code_article<50 ) 
            {
              $sqlb="SELECT Code_article,Quantite,Cpt_vente FROM livre";
              $resultb = mysqli_query($db_handle, $sqlb);
               while($datab=mysqli_fetch_assoc($resultb))
               {
                //if($dataa['Code_article']==$code_article)
                   $code=$datab['Code_article'];
                   
                  if($code==$code_article)
                  {
                  $quant=$datab['Quantite'];
                  $new_quantite= $quant-1;
                  $sqlb1="UPDATE livre
                  SET Quantite = '$new_quantite'
                  WHERE Code_article='$code_article'";
                  $resultb1 = mysqli_query($db_handle, $sqlb1);

                  /*$compt=$datab['Cpt_vente'];
                  $new_compt= $compt+1;

                     $sqlb2="UPDATE livre
                    SET Cpt_vente = '$new_compt'
                    WHERE Code_article='$code_article'";
                    $resultb2 = mysqli_query($db_handle, $sqlb2);*/
                }
                
               }
            }

            else if ($code_article>49 && $code_article<100) 
            {
               $sqlc="SELECT Code_article,Quantite,Cpt_vente FROM sport";
              $resultc = mysqli_query($db_handle, $sqlc);
               while($datac=mysqli_fetch_assoc($resultc))
               {
                //if($dataa['Code_article']==$code_article)
                  $code=$datac['Code_article'];
                   
                   
                  if($code==$code_article)
                  {
                    $quant=$datac['Quantite'];
                  $new_quantite= $quant-1;
                  echo$new_quantite."<br>";

                  $sqlc1="UPDATE sport
                  SET Quantite = '$new_quantite'
                  WHERE Code_article='$code_article'";
                  $resultc1 = mysqli_query($db_handle, $sqlc1);


                  /*$compt=$datac['Cpt_vente'];
                  $new_compt= $compt+1;

                     $sqlc2="UPDATE sport
                    SET Cpt_vente = '$new_compt'
                    WHERE Code_article='$code_article'";
                    $resultc2 = mysqli_query($db_handle, $sqlc2);*/

                  }
                
               }
            }
            else if ($code_article>99 && $code_article<150) 
            {
              
               $sqld="SELECT Code_article,Quantite,Cpt_vente FROM musique";
              $resultd = mysqli_query($db_handle, $sqld);
               while($datad=mysqli_fetch_assoc($resultd))
               {
                //if($dataa['Code_article']==$code_article)
                 $code=$datad['Code_article'];
                   
                  if($code==$code_article)
                  {
                  $quant=$datad['Quantite'];
                  $new_quantite= $quant-1;
                  
                  $sqld1="UPDATE musique
                  SET Quantite = '$new_quantite'
                  WHERE Code_article='$code_article'";
                  $resultd1 = mysqli_query($db_handle, $sqld1);

                  $compt=$datad['Cpt_vente'];
                  $new_compt= $compt+1;

                    /* $sqld2="UPDATE musique
                    SET Cpt_vente = '$new_compt'
                    WHERE Code_article='$code_article'";
                    $resultd2 = mysqli_query($db_handle, $sqld2);*/
                  }
                }
            }


              $sqlf="SELECT Nom,Cpt_vente FROM article";
              $resultf = mysqli_query($db_handle, $sqlf);
               while($dataf=mysqli_fetch_assoc($resultf))
               {
                //if($dataa['Code_article']==$code_article)
                 

                   $nom=$dataf['Nom'];
                   if ($nom==$nom_article) 
                   {
                    $compt=$dataf['Cpt_vente'];
                    $new_compt= $compt+1;

                     $sqlf1="UPDATE article
                    SET Cpt_vente = '$new_compt'
                    WHERE Nom='$nom_article'";
                    $resultf1 = mysqli_query($db_handle, $sqlf1);
                   }
                  
                  
                
               }
            }

            $sql_dl="DELETE FROM panier ";
            $result_dl = mysqli_query($db_handle, $sql_dl);
            echo'<a href="magasin.php">Retour au magasin</a>';
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