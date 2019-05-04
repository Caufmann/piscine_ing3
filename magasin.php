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
  		<a class="navbar-brand">ECE Amazon</a>
  		<ul class="navbar-nav">
    		<li class="nav-item dropdown"><a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories</a>
      		<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
        		<a class="dropdown-item" href="livres.php">Livres</a>
        		<a class="dropdown-item" href="musique.php">Musique</a>
        		<a class="dropdown-item" href="vetements.php">Vetements</a>
        		<a class="dropdown-item" href="sportsetloisirs.php">Sports et loisirs</a>
        		<div class="dropdown-divider"></div>
        		<a class="dropdown-item" href="categories.php">Toutes les categories</a>
      		</div>
    		</li>
    		<li class="nav-item"><a class="nav-link" href="connecter.html">Se connecter</a></li>
    		<li class="nav-item"><a class="nav-link" href="votre_compte.php">Votre compte</a></li>
    		<li class="nav-item"><a class="nav-link" href="panier.php">Panier</a></li>
    		<li class="nav-item"><a class="nav-link" href="logout.php">Se deconnecter</a></li>
  		</ul>
	</nav>

	<div class="container">
		<div class="row">
			<div class="col-lg-3">
				<h3 class="my-4">Ventes flash</h3>
				<div class="list-group">
          			<a href="#Livres" class="list-group-item">Livres</a>
          			<a href="#Musique" class="list-group-item">Musique</a>
          			<a href="#Vetements" class="list-group-item">Vetements</a>
          			<a href="#Sports" class="list-group-item">Sports </a>
        		</div>
			</div>

 <?php
  $database = "ece_amazon";
//connectez-vous dans votre BDD
//Rappel: votre serveur = localhost et votre login = root et votre password = <rien>
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

 $sql = " SELECT * FROM article ORDER BY Cpt_vente DESC LIMIT 1 ";
      $result = mysqli_query($db_handle, $sql);
      $data = mysqli_fetch_assoc($result);
       $tof=$data['Photo1'];
       $id_article = $data['Id_article'];
       $categorie = $data['Categorie'];
       $name=$data['Nom'];
       $price=$data['Prix'];


       $sql1 = " SELECT * FROM article ORDER BY Cpt_vente DESC LIMIT 2 OFFSET 1 ";
      $result1 = mysqli_query($db_handle, $sql1);
      $data1 = mysqli_fetch_assoc($result1);
      $tof1=$data1['Photo1'];
       $id_article1 = $data1['Id_article'];
       $categorie1 = $data1['Categorie'];
       $name1=$data1['Nom'];
       $price1=$data1['Prix'];

      $sql2 = " SELECT * FROM article ORDER BY Cpt_vente DESC LIMIT 3 OFFSET 2 ";

      $result2 = mysqli_query($db_handle, $sql2);
      $data2 = mysqli_fetch_assoc($result2);
      $tof2=$data2['Photo1'];
       $id_article2 = $data2['Id_article'];
       $categorie2 = $data2['Categorie'];
       $name2=$data2['Nom'];
       $price2=$data2['Prix'];


      
        
          echo
          "
            <html>
              <div class='col-lg-9'>
        <h2>Les trois meilleurs ventes rien que pour vous </h2>
        <div id='carouselExampleIndicators' class='carousel slide my-4' data-ride='carousel'>
                <ol class='carousel-indicators'>
                  <li data-target='#carouselExampleIndicators' data-slide-to='0' class='active'></li>
                  <li data-target='#carouselExampleIndicators' data-slide-to='1'></li>
                  <li data-target='#carouselExampleIndicators' data-slide-to='2'></li>
                </ol>
            <div class='carousel-inner' role='listbox'>
              <div class='carousel-item active'>
                  <!--change la source de image-->
                <a href='article.php?id_article=$id_article&categorie=$categorie'> <img class='d-block img-fluid' src='img/$tof' alt='Premier produit' style='width:400px; height:320px;margin:auto;'>
                </a>
                <center>$name</center>
                <center>$price  €</center>
              </div>
              <div class='carousel-item'>
                <!--change la source de image-->
                   <a href='article.php?id_article=$id_article1&categorie=$categorie1'> <img class='d-block img-fluid' src='img/$tof1' alt='Premier produit' style='width:400px; height:320px;margin:auto;'>
                   
                </a>
                <center>$name1</center>
                <center>$price1  €</center>
              </div>
              <div class='carousel-item'>
                <!--change la source de image-->
                  <a href='article.php?id_article=$id_article2&categorie=$categorie2'> <img class='d-block img-fluid' src='img/$tof2' alt='Premier produit' style='width:400px; height:320px;margin:auto;'>
                    
                </a>
                <center>$name2</center>
                <center>$price2  €</center>
                    
              </div>
            </div>
            <a class='carousel-control-prev' href='#carouselExampleIndicators' role='button' data-slide='prev'>
              <span class='carousel-control-prev-icon' aria-hidden='true'></span>
              <span class='sr-only'>Precedent</span>
            </a>
            <a class='carousel-control-next' href='#carouselExampleIndicators' role='button' data-slide='next'>
              <span class='carousel-control-next-icon' aria-hidden='true'></span>
              <span class='sr-only'>Suivant</span>
            </a>
        </div>
      </html>
          ";
      

?>

<!--<a href="article.php?id_article=$id_article&categorie=$categorie"> <img class="d-block img-fluid" src="img/$tof" alt="Premier produit" style="width:900px; height:350px;">-->
<?php		
$database = "ece_amazon";
//connectez-vous dans votre BDD
//Rappel: votre serveur = localhost et votre login = root et votre password = <rien>
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

	$database = "ece_amazon";
//connectez-vous dans votre BDD
//Rappel: votre serveur = localhost et votre login = root et votre password = <rien>
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

 $sqla = " SELECT * FROM article WHERE Categorie LIKE 'Livre' ORDER BY Cpt_vente DESC LIMIT 1 ";
      $resulta = mysqli_query($db_handle, $sqla);
      $dataa = mysqli_fetch_assoc($resulta);
       $tofa=$dataa['Photo1'];
       $id_articlea = $dataa['Id_article'];
       $categoriea = $dataa['Categorie'];
       $namea=$dataa['Nom'];
       $pricea=$dataa['Prix'];


       $sqla1 = " SELECT * FROM article WHERE Categorie LIKE 'Livre' ORDER BY Cpt_vente DESC LIMIT 2 OFFSET 1 ";
      $resulta1 = mysqli_query($db_handle, $sqla1);
      $dataa1 = mysqli_fetch_assoc($resulta1);
      $tofa1=$dataa1['Photo1'];
       $id_articlea1 = $dataa1['Id_article'];
       $categoriea1 = $dataa1['Categorie'];
       $namea1=$dataa1['Nom'];
       $pricea1=$dataa1['Prix'];

      $sqla2 = " SELECT * FROM article WHERE Categorie LIKE 'Livre' ORDER BY Cpt_vente DESC LIMIT 3 OFFSET 2 ";

      $resulta2 = mysqli_query($db_handle, $sqla2);
      $dataa2 = mysqli_fetch_assoc($resulta2);
      $tofa2=$dataa2['Photo1'];
       $id_articlea2 = $dataa2['Id_article'];
       $categoriea2 = $dataa2['Categorie'];
       $namea2=$dataa2['Nom'];
       $pricea2=$dataa2['Prix'];



echo"
        <div class='row'>

        	<div id='Livres'>Top 3 des meilleures ventes de livres</div>
        	<div class='col-md-8 col-md-offset-2'></div>

        	<div class='col-lg-4 col-md-6 mb-4'>
            	<div class='card h-100'>
            		<a href='article.php?id_article=$id_articlea&categorie=$categoriea'> <img class='card-img-top' src='img/$tofa' alt='Premier produit' style='width:253px; height:200px;'>
                </a>
            		<div class='card-body'>
            			<h5 class='card-title'>
                  		<!--ref a mettre vers l'objet-->
                  		<a href='article.php?id_article=$id_articlea&categorie=$categoriea'><center>$namea</center></a>
                		</h5>
                		<h6>$pricea €</h6>
                	
            		</div>
            	</div>
        	</div>
        	<div class='col-lg-4 col-md-6 mb-4'>
            	<div class='card h-100'>
              		  <a href='article.php?id_article=$id_articlea1&categorie=$categoriea1'> <img class='card-img-top' src='img/$tofa1' alt='Premier produit' style='width:253px; height:200px;'>
                </a>
              		<div class='card-body'>
                		<h5 class='card-title'>
                 		<a href='article.php?id_article=$id_articlea1&categorie=$categoriea1'><center>$namea1</center></a>
                		</h5>
                		<h6>$pricea1 €</h6>
               
              		</div>
            	</div>
          	</div>

          	<div class='col-lg-4 col-md-6 mb-4'>
            	<div class='card h-100'>
              		  <a href='article.php?id_article=$id_articlea2&categorie=$categoriea2'> <img class='card-img-top' src='img/$tofa2' alt='Premier produit' style='width:253px; height:200px;'>
                </a>
              		<div class='card-body'>
                		<h5 class='card-title'>
                  		<a href='article.php?id_article=$id_articlea2&categorie=$categoriea2'><center>$namea2</center></a>
                		</h5>
                		<h6>$pricea2 €</h6>
                
              		</div>
            	</div>
          	</div>
            </div>
            ";
?>

<?php
$database = "ece_amazon";
//connectez-vous dans votre BDD
//Rappel: votre serveur = localhost et votre login = root et votre password = <rien>
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);
 $sqlb = " SELECT * FROM article WHERE Categorie LIKE 'Musique' ORDER BY Cpt_vente DESC LIMIT 1 ";
      $resultb = mysqli_query($db_handle, $sqlb);
      $datab = mysqli_fetch_assoc($resultb);
       $tofb=$datab['Photo1'];
       $id_articleb = $datab['Id_article'];
       $categorieb = $datab['Categorie'];
       $nameb=$datab['Nom'];
       $priceb=$datab['Prix'];


       $sqlb1 = " SELECT * FROM article WHERE Categorie LIKE 'Musique' ORDER BY Cpt_vente DESC LIMIT 2 OFFSET 1 ";
      $resultb1 = mysqli_query($db_handle, $sqlb1);
      $datab1 = mysqli_fetch_assoc($resultb1);
      $tofb1=$datab1['Photo1'];
       $id_articleb1 = $datab1['Id_article'];
       $categorieb1 = $datab1['Categorie'];
       $nameb1=$datab1['Nom'];
       $priceb1=$datab1['Prix'];

      $sqlb2 = " SELECT * FROM article WHERE Categorie LIKE 'Musique' ORDER BY Cpt_vente DESC LIMIT 3 OFFSET 2 ";

      $resultb2 = mysqli_query($db_handle, $sqlb2);
      $datab2 = mysqli_fetch_assoc($resultb2);
      $tofb2=$datab2['Photo1'];
       $id_articleb2 = $datab2['Id_article'];
       $categorieb2 = $datab2['Categorie'];
       $nameb2=$datab2['Nom'];
       $priceb2=$datab2['Prix'];



echo"
        <div class='row'>

          <div id='Musique'>Top 3 des meilleures ventes de musique</div>
          <div class='col-md-8 col-md-offset-2'></div>

          <div class='col-lg-4 col-md-6 mb-4'>
              <div class='card h-100'>
                <a href='article.php?id_article=$id_articleb&categorie=$categorieb'> <img class='card-img-top' src='img/$tofb' alt='Premier produit' style='width:253px; height:200px;'>
                </a>
                <div class='card-body'>
                  <h5 class='card-title'>
                      <!--ref a mettre vers l'objet-->
                      <a href='article.php?id_article=$id_articleb&categorie=$categorieb'><center>$nameb</center></a>
                    </h5>
                    <h6>$priceb €</h6>
                  
                </div>
              </div>
          </div>
          <div class='col-lg-4 col-md-6 mb-4'>
              <div class='card h-100'>
                    <a href='article.php?id_article=$id_articleb1&categorie=$categorieb1'> <img class='card-img-top' src='img/$tofb1' alt='Premier produit' style='width:253px; height:200px;'>
                </a>
                  <div class='card-body'>
                    <h5 class='card-title'>
                    <a href='article.php?id_article=$id_articleb1&categorie=$categorieb1'><center>$nameb1</center></a>
                    </h5>
                    <h6>$priceb1 €</h6>
               
                  </div>
              </div>
            </div>

            <div class='col-lg-4 col-md-6 mb-4'>
              <div class='card h-100'>
                    <a href='article.php?id_article=$id_articleb2&categorie=$categorieb2'> <img class='card-img-top' src='img/$tofb2' alt='Premier produit' style='width:253px; height:200px;'>
                    </a>
                   <div class='card-body'>
                    <h5 class='card-title'>
                      <a href='article.php?id_article=$id_articleb2&categorie=$categorieb2'><center>$nameb2</center></a>
                    </h5>
                    <h6>$priceb2 €</h6>
                
                   </div>
              </div>
             </div>
             </div>

            ";
   

?>

    
<?php   
$database = "ece_amazon";
//connectez-vous dans votre BDD
//Rappel: votre serveur = localhost et votre login = root et votre password = <rien>
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

  $database = "ece_amazon";
//connectez-vous dans votre BDD
//Rappel: votre serveur = localhost et votre login = root et votre password = <rien>
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

 $sqla = " SELECT * FROM article WHERE Categorie LIKE 'Vetement' ORDER BY Cpt_vente DESC LIMIT 1 ";
      $resulta = mysqli_query($db_handle, $sqla);
      $dataa = mysqli_fetch_assoc($resulta);
       $tofa=$dataa['Photo1'];
       $id_articlea = $dataa['Id_article'];
       $categoriea = $dataa['Categorie'];
       $namea=$dataa['Nom'];
       $pricea=$dataa['Prix'];


       $sqla1 = " SELECT * FROM article WHERE Categorie LIKE 'Vetement' ORDER BY Cpt_vente DESC LIMIT 2 OFFSET 1 ";
      $resulta1 = mysqli_query($db_handle, $sqla1);
      $dataa1 = mysqli_fetch_assoc($resulta1);
      $tofa1=$dataa1['Photo1'];
       $id_articlea1 = $dataa1['Id_article'];
       $categoriea1 = $dataa1['Categorie'];
       $namea1=$dataa1['Nom'];
       $pricea1=$dataa1['Prix'];

      $sqla2 = " SELECT * FROM article WHERE Categorie LIKE 'Vetement' ORDER BY Cpt_vente DESC LIMIT 3 OFFSET 2 ";

      $resulta2 = mysqli_query($db_handle, $sqla2);
      $dataa2 = mysqli_fetch_assoc($resulta2);
      $tofa2=$dataa2['Photo1'];
       $id_articlea2 = $dataa2['Id_article'];
       $categoriea2 = $dataa2['Categorie'];
       $namea2=$dataa2['Nom'];
       $pricea2=$dataa2['Prix'];



echo"
        <div class='row'>

          <div id='Vetements'>Top 3  meilleures ventes de vetement</div>
          <div class='col-md-8 col-md-offset-2'></div>

          <div class='col-lg-4 col-md-6 mb-4'>
              <div class='card h-100'>
                <a href='article.php?id_article=$id_articlea&categorie=$categoriea'> <img class='card-img-top' src='img/$tofa' alt='Premier produit' style='width:253px; height:200px;'>
                </a>
                <div class='card-body'>
                  <h5 class='card-title'>
                      <!--ref a mettre vers l'objet-->
                      <a href='article.php?id_article=$id_articlea&categorie=$categoriea'><center>$namea</center></a>
                    </h5>
                    <h6>$pricea €</h6>
                  
                </div>
              </div>
          </div>
          <div class='col-lg-4 col-md-6 mb-4'>
              <div class='card h-100'>
                    <a href='article.php?id_article=$id_articlea1&categorie=$categoriea1'> <img class='card-img-top' src='img/$tofa1' alt='Premier produit' style='width:253px; height:200px;'>
                </a>
                  <div class='card-body'>
                    <h5 class='card-title'>
                    <a href='article.php?id_article=$id_articlea1&categorie=$categoriea1'><center>$namea1</center></a>
                    </h5>
                    <h6>$pricea1 €</h6>
               
                  </div>
              </div>
            </div>

            <div class='col-lg-4 col-md-6 mb-4'>
              <div class='card h-100'>
                    <a href='article.php?id_article=$id_articlea2&categorie=$categoriea2'> <img class='card-img-top' src='img/$tofa2' alt='Premier produit' style='width:253px; height:200px;'>
                </a>
                  <div class='card-body'>
                    <h5 class='card-title'>
                      <a href='article.php?id_article=$id_articlea2&categorie=$categoriea2'><center>$namea2</center></a>
                    </h5>
                    <h6>$pricea2 €</h6>
                
                  </div>
              </div>
            </div>
            </div>
            ";
?>




<?php
$database = "ece_amazon";
//connectez-vous dans votre BDD
//Rappel: votre serveur = localhost et votre login = root et votre password = <rien>
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);
 $sqld = " SELECT * FROM article WHERE Categorie LIKE 'Sport' ORDER BY Cpt_vente DESC LIMIT 1 ";
      $resultd = mysqli_query($db_handle, $sqld);
      $datad = mysqli_fetch_assoc($resultd);
       $tofd=$datad['Photo1'];
       $id_articled = $datad['Id_article'];
       $categoried = $datad['Categorie'];
       $named=$datad['Nom'];
       $priced=$datad['Prix'];


       $sqld1 = " SELECT * FROM article WHERE Categorie LIKE 'Sport' ORDER BY Cpt_vente DESC LIMIT 2 OFFSET 1 ";
      $resultd1 = mysqli_query($db_handle, $sqld1);
      $datad1 = mysqli_fetch_assoc($resultd1);
      $tofd1=$datad1['Photo1'];
       $id_articled1 = $datad1['Id_article'];
       $categoried1 = $datad1['Categorie'];
       $named1=$datad1['Nom'];
       $priced1=$datad1['Prix'];

      $sqld2 = " SELECT * FROM article WHERE Categorie LIKE 'Sport' ORDER BY Cpt_vente DESC LIMIT 3 OFFSET 2 ";

      $resultd2 = mysqli_query($db_handle, $sqld2);
      $datad2 = mysqli_fetch_assoc($resultd2);
      $tofd2=$datad2['Photo1'];
       $id_articled2 = $datad2['Id_article'];
       $categoried2 = $datad2['Categorie'];
       $named2=$datad2['Nom'];
       $priced2=$datad2['Prix'];



echo"
        <div class='row'>

          <div id='Sports'>Top 3 des meilleures ventes de sport</div>
          <div class='col-md-8 col-md-offset-2'></div>

          <div class='col-lg-4 col-md-6 mb-4'>
              <div class='card h-100'>
                <a href='article.php?id_article=$id_articled&categorie=$categoried'> <img class='card-img-top' src='img/$tofd' alt='Premier produit' style='width:253px; height:200px;'>
                </a>
                <div class='card-body'>
                  <h5 class='card-title'>
                      <!--ref a mettre vers l'objet-->
                      <a href='article.php?id_article=$id_articled&categorie=$categoried'><center>$named</center></a>
                    </h5>
                    <h6>$priced €</h6>
                  
                </div>
              </div>
          </div>
          <div class='col-lg-4 col-md-6 mb-4'>
              <div class='card h-100'>
                    <a href='article.php?id_article=$id_articled1&categorie=$categoried1'> <img class='card-img-top' src='img/$tofd1' alt='Premier produit' style='width:253px; height:200px;'>
                </a>
                  <div class='card-body'>
                    <h5 class='card-title'>
                    <a href='article.php?id_article=$id_articled1&categorie=$categoried1'><center>$named1</center></a>
                    </h5>
                    <h6>$priced1 €</h6>
               
                  </div>
              </div>
            </div>

            <div class='col-lg-4 col-md-6 mb-4'>
              <div class='card h-100'>
                    <a href='article.php?id_article=$id_articled2&categorie=$categoried2'> <img class='card-img-top' src='img/$tofd2' alt='Premier produit' style='width:253px; height:200px;'>
                    </a>
                   <div class='card-body'>
                    <h5 class='card-title'>
                      <a href='article.php?id_article=$id_articled2&categorie=$categoried2'><center>$named2</center></a>
                    </h5>
                    <h6>$priced2 €</h6>
                
                   </div>
              </div>
             </div>
             </div>
            ";
   

?>



      </div>

    </div>

</div>

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