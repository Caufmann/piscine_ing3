<?php
// On démarre la session
session_start();
$loginOK = false;  

$Mail = isset($_POST["Mail"])? $_POST["Mail"] : "";
$Password = isset($_POST["Password"])? $_POST["Password"] : "";

$database = "ece_amazon";
//connectez-vous dans votre BDD
//Rappel: votre serveur = localhost et votre login = root et votre password = <rien>
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);
if ($_POST["button1"])
{
  
if($Mail == "") {echo "Le champ Mail est vide. <br>";}
if($Password == "") {echo" Le champ Password est vide. <br>";}


if ($db_found)
{
// On n'effectue les traitement qu'à la condition que 
// les informations aient été effectivement postées
 

/*SELECT article.* 
           FROM article, vendeur
           WHERE vendeur.Pseudo LIKE '%$Pseudo_vendeur%' AND article.Id_vendeur=vendeur.Id_vendeur";*/
  // On va chercher le mot de passe afférent à ce login
 $sql = "SELECT * FROM acheteur
      WHERE Mail LIKE '%$Mail%'";
  $result = mysqli_query($db_handle, $sql);
  // On vérifie que l'utilisateur existe bien
  if (mysqli_num_rows($result) == 0) 
  {
     
  }
  else
  {
     $data = mysqli_fetch_assoc($result);
    echo $data['Id'] ."<br>";
     echo $data['Password']."<br>";
     echo $data['Mail']."<br>";
    
    // On vérifie que son mot de passe est correct
    if ($Password == $data['Password'])
     {
      $loginOK = true;
     }

  }  


   $sql1 = "SELECT * FROM vendeur
      WHERE Mail LIKE '%$Mail%'";
  $resultat = mysqli_query($db_handle, $sql1);
  // On vérifie que l'utilisateur existe bien
  if (mysqli_num_rows($resultat) == 0) 
  {
     
  }
  else
  {
     $data = mysqli_fetch_assoc($resultat);
    echo $data['Id'] ."<br>";
     echo $data['Password']."<br>";
     echo $data['Mail']."<br>";
    
    // On vérifie que son mot de passe est correct
    if ($Password == $data['Password'])
     {
      $loginOK = true;
     }

  }  


   $sql = "SELECT * FROM administrateur
      WHERE Mail LIKE '%$Mail%'";
  $resultat = mysqli_query($db_handle, $sql);
  // On vérifie que l'utilisateur existe bien
  if (mysqli_num_rows($resultat) == 0) 
  {
     
  }
  else
  {
     $data = mysqli_fetch_assoc($resultat);
    echo $data['Id'] ."<br>";
     echo $data['Password']."<br>";
     echo $data['Mail']."<br>";
    
    // On vérifie que son mot de passe est correct
    if ($Password == $data['Password'])
     {
      $loginOK = true;
     }

  }  


// Si le login a été validé on met les données en sessions
if ($loginOK) 
{
  $_SESSION['Id'] = $data['Id'];
  echo 'Id : ',$_SESSION['Id'],'<br />';
}
else 
{
  echo 'Une erreur est survenue, veuillez réessayer !'."<br>"; 
}
}


else
{
   echo "Database not found"; 
}
}

mysqli_close($db_handle);


// On affiche une phrase résumant les infos sur l'utilisateur courant

?>
