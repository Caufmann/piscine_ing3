<?php
	//récupérer les données du HTML
//le parametre de $_POST = "name" de <input> de votre page HTML
$Categorie = isset($_POST["Categorie"])? $_POST["Categorie"] : "";
$Nom = isset($_POST["Nom"])? $_POST["Nom"] : "";
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
	$erreur = "";
if($Categorie == "") {$erreur .= "Le champ Categorie est vide. <br>";}
if($Nom == "") {$erreur .= " Le champ Nom est vide. <br>";}
if($Photo1 == "") {$erreur .= "Le champ Photo1 est vide. <br>";}if($Photo2 == "") {$Photo2='NULL';};
if($Photo3 == "") {$Photo3='NULL';};
if($Description == "") {$erreur .= "Le champ Description est vide. <br>";}
if($Prix == "") {$erreur .= "Le champ Prix est vide. <br>";}
if($Quantite == "") {$erreur .= "Le champ Quantité est vide. <br>";}
if($Id_vendeur == "") {$erreur .= "Le champ Id vendeur est vide. <br>";}
if ($erreur == "") {echo "Formulaire valide. <br>";}

else {echo "Erreur : $erreur"; }

	if ($db_found)
	{
	$sql1 = "SELECT * FROM article WHERE Nom LIKE '%$Nom%' AND Id_vendeur LIKE '%$Id_vendeur%'";
	$res = mysqli_query($db_handle, $sql1);
	//regarder s'il y a de résultat
		if (mysqli_num_rows($res) != 0)
		{
		//le livre est déjà dans la BDD
		echo "Cet article existe déjà.";
		} 
		else
		{
			$sql2 = "SELECT max(Id_article) FROM article";
			//echo" <br><br>";
			$results = mysqli_query($db_handle, $sql2);
			$data = mysqli_fetch_assoc($results);
			$idmax=$data['max(Id_article)'];
			$idmaxi=$idmax+1;
			echo $idmaxi;
			
		$sql1 = "INSERT INTO article(Id_article,Categorie,Nom,Photo1,Photo2,Photo3,Description,Prix,Reduction_prix,Quantite,Cpt_vente,Id_vendeur)VALUES('$idmaxi','$Categorie', '$Nom', '$Photo1', '$Photo2','$Photo3','$Description','$Prix',1,'$Quantite',0,'$Id_vendeur')";

		$res = mysqli_query($db_handle, $sql1);
		echo "Add successful." . "<br><br>";
		//on affiche le livre ajouté
		$sql1 = "SELECT * FROM article";
			if ($Nom != "")
			{
				//on cherche le livre avec les paramètres titre et auteur
			$sql1 .= " WHERE Nom LIKE '%$Nom%'";
				if ($Id_vendeur != "")
				{
				$sql1 .= " AND Id_vendeur LIKE '%$Id_vendeur%'";
				}
			}
		$res = mysqli_query($db_handle, $sql1);
			while ($data = mysqli_fetch_assoc($res))
			{
			echo "Informations sur l'article ajouté:" . "<br>";
			echo "ID article: " . $data['Id_article'] . "<br>";
			echo "Nom: " . $data['Nom'] . "<br>";
			echo "Categorie: " . $data['Categorie'] . "<br>";

			$tof1=$data['Photo1'];

			echo "Photo1: " ."<br>";
			echo '<img src="'.$tof1.'" >';

			echo "Description: " . $data['Description'] . "<br>";
			echo "Prix: " . $data['Prix'] . "<br>";
			echo "Quantite: " . $data['Quantite'] . "<br>";
			echo "Id du vendeur: " . $data['Id_vendeur'] . "<br>";
			echo "<br>";
			}
		}
	}
else
	{
	echo "Database not found";
	}
}
//fermer la connexion
mysqli_close($db_handle);
?>