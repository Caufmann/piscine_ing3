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

            $sql2 = "SELECT Code_article FROM vetement WHERE Taille LIKE '%$Taille%' AND Couleur LIKE '%$Couleur%' AND Genre LIKE '%$Genre%'";
              //echo" <br><br>";
              $results = mysqli_query($db_handle, $sql2);
              $data = mysqli_fetch_assoc($results);

              $Code_article=$data['Code_article'];
              echo $Code_article;
              echo "<br>";

             $sql3 = "SELECT Nom,Prix,Reduction_prix FROM article
              WHERE Id_article = '".$_GET["id_article"]."' ; ";
              $result = mysqli_query($db_handle, $sql3);
              $datas = mysqli_fetch_assoc($result);

              $Nom_article=$datas['Nom'];
              $Prix_article=$datas['Prix'];
              $Reduction_prix=$datas['Reduction_prix'];
              echo $Nom_article;
              echo "<br>";
              echo $Prix_article;
              echo "<br>";
              echo $Reduction_prix;
              echo "<br>";

          $sql = "INSERT INTO Panier(Id_panier,Code_article,Nom_article,Prix_article,Reduction_prix) VALUES(1,'$Code_article',
          '$Nom_article','$Prix_article','$Reduction_prix')";
          $res = mysqli_query($db_handle, $sql);

        }



?>