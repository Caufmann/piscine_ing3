<?php

$Id_article = isset($_POST["Id_article"])? $_POST["Id_article"] : "";

$database = "ecezon";
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

if ($_POST["button1"]) 
	{	
		if($Id_article == "")
 		{echo "Le champ Id de l'article est vide. <br>";}
 		
 	if($db_found)
 		{
		$sql1 = "SELECT * FROM article WHERE Id_article LIKE '%$Id_article%' ";
		$res = mysqli_query($db_handle, $sql1);
			//regarder s'il y a de résultat

		if (mysqli_num_rows($res) == 0)
			{
			  echo" Vous n'avez pas d'article avec cet Id.";
							
			} 
		else
			{
				/*$res = mysqli_query($db_handle, $sql1);
				$data = mysqli_fetch_assoc($results);
				$id_objet=$data['Id_article']*/
				$sql= "DELETE FROM article WHERE Id_article LIKE '%$Id_article%' ";
				$res = mysqli_query($db_handle, $sql);
				exit();
			}
 		}
 		else
 		{
 			echo "Database not found";
 		}
 	}
?>