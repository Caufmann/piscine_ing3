<?php


        $Taille= isset($_POST["Taille"])? $_POST["Taille"] : "";
        $Genre = isset($_POST["Genre"])? $_POST["Genre"] : "";
        $Couleur= isset($_POST["Couleur"])? $_POST["Couleur"] : ""; 

$database = "ece_amazon";
//connectez-vous dans votre BDD
//Rappel: votre serveur = localhost et votre login = root et votre password = <rien>
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);
          
        if ($_POST['boutton'])
        {


            $sql2 = "SELECT Code_article,Quantite FROM vetement WHERE Taille LIKE '%$Taille%' AND Couleur LIKE '%$Couleur%' AND Genre LIKE '%$Genre%'";
              //echo" <br><br>";
              $results = mysqli_query($db_handle, $sql2);
               $data = mysqli_fetch_assoc($results);
               	$Quantite=$data['Quantite'];
              $Code_article=$data['Code_article'];

              if (mysqli_num_rows($results) == 0)
					{
					//le livre est déjà dans la BDD
					echo "Nous ne possedons pas cet article.";
					} 
			else
			{
				if($Quantite<1)
		            {
		         	 //le livre est déjà dans la BDD
		          	echo "Nous n'avons plus cet article en stock.";
		         	 } 
		         else
		         {


             

             $sql3 = "SELECT Nom,Prix,Reduction_prix FROM article
              WHERE Id_article = '".$_GET["id_article"]."' ; ";
              $result = mysqli_query($db_handle, $sql3);
              $datas = mysqli_fetch_assoc($result);

              $Nom_article=$datas['Nom'];
              $Prix_article=$datas['Prix'];
              $Reduction_prix=$datas['Reduction_prix'];

          $sql = "INSERT INTO Panier(Id_panier,Code_article,Nom_article,Prix_article,Reduction_prix) VALUES(1,'$Code_article',
          '$Nom_article','$Prix_article','$Reduction_prix')";
          $res = mysqli_query($db_handle, $sql);

           echo "L'article a été ajouté au panier avec succès";
           echo "<p><a href='magasin.html'>Retour à l'accueil.</a></p>";

           	}
        }
    }



?>