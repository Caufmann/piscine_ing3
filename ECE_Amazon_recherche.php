<?php
	//récupérer les données du HTML
//le parametre de $_POST = "name" de <input> de votre page HTML
$Categorie = isset($_POST["Categorie"])? $_POST["Categorie"] : "";
$Nom = isset($_POST["Nom"])? $_POST["Nom"] : "";
$Id_article = isset($_POST["Id_article"])? $_POST["Id_article"] : "";
$Pseudo_vendeur = isset($_POST["Pseudo_vendeur"])? $_POST["Pseudo_vendeur"] : "";

$Photo1 = isset($_POST["Photo1"])? $_POST["Photo1"] : "";
$Photo2 = isset($_POST["Photo2"])? $_POST["Photo2"] : "";
$Photo3 = isset($_POST["Photo3"])? $_POST["Photo3"] : "";
$Description = isset($_POST["Description"])? $_POST["Description"] : "";
$Prix = isset($_POST["Prix"])? $_POST["Prix"] : "";
$Quantite = isset($_POST["Quantite"])? $_POST["Quantite"] : "";
$Id_vendeur = isset($_POST["Id_vendeur"])? $_POST["Id_vendeur"] : "";

//identifier votre BDD
$database = "ece_amazon";
//connectez-vous dans votre BDD
//Rappel: votre serveur = localhost et votre login = root et votre password = <rien>
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);
if ($_POST["button1"]) 
	{
		if ($db_found) 
		{
		//$sql = "SELECT * FROM article";
			if ($Categorie != "") 
			{
		//on cherche l'article avec les param Categorie et Nom 
			$sql = " SELECT * FROM article WHERE Categorie LIKE '%$Categorie%'";
			}

			if ($Nom != "") 
			{
				$sql = "  SELECT * FROM article WHERE Nom LIKE '%$Nom%'";
			}
			if ($Id_article != "") 
			{
				$sql = "  SELECT * FROM article WHERE Id_article LIKE '%$Id_article%'";
			}

			if($Pseudo_vendeur !="")
			{
				$sql ="SELECT article.* 
					 FROM article, vendeur
					 WHERE vendeur.Pseudo LIKE '%$Pseudo_vendeur%' AND article.Id=vendeur.Id";
					echo $sql ."<br>"; 
			}	
			
		$result = mysqli_query($db_handle, $sql);
		//regarder s'il y a de résultat
			if (mysqli_num_rows($result) == 0) 
			{
				//l'article recherché n'existe pas
			echo "L'article n'a pas été trouvé";
			} 
			else 
			{
			//on trouve l'article recherché
				while ($data = mysqli_fetch_assoc($result)) 
				{
					echo "Id: " . $data['Id_article'] . "<br>";
					echo "Categorie: " . $data['Categorie'] . "<br>";
					echo "Nom de l'article: " . $data['Nom'] . "<br>";
					echo "Prix de l'article: " . $data['Prix'] . "<br>";
					echo "Description de l'article: " . $data['Description'] . "<br>";
					echo "Id_vendeur: " . $data['Id_vendeur'] . "<br>";
					$id_seller=$data['Id_vendeur'];

					$sql1 ="SELECT vendeur.Pseudo 
					 FROM vendeur
					 WHERE Id_vendeur LIKE '%$id_seller%'";
					 $result1 = mysqli_query($db_handle, $sql1);
					 $data2= mysqli_fetch_assoc($result1);
					 $name_vendeur=$data2['Pseudo'];
					echo "Pseudo_vendeur: " .$name_vendeur . "<br>";
					echo "<br>";
				}
			}
		} else 
		{
		echo "Database not found";
		}
	}
mysqli_close($db_handle);
?>