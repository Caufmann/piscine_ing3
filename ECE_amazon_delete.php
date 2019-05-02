<!DOCTYPE html>
<html>
<head>
		<title>Gestion base de donnée article</title>
		<meta charset="utf-8">
		</head>
		<body>
			<p>Si vous n'êtes pas un vendeur ou que vous n'êtes pas connecté, vous allez être redirigé dans 3 secondes</p>
		</body>
<?php

if(!isset($_GET['username']))
	{
		
		sleep(2);
		header("Location: test_username.php");
		exit();
	}

$database = "ece_amazon";
					
					$db_handle = mysqli_connect('localhost', 'root', '');
					$db_found = mysqli_select_db($db_handle, $database);

					if ($db_found)
					{
						$sql= "SELECT * FROM vendeur WHERE Id_vendeur LIKE '". $_GET['username'] ."';";
					
						$result = mysqli_query($db_handle, $sql);
						if (mysqli_num_rows($result) == 0)
						{
						//l'article recherché n'existe pas
						echo "Vous n'êtes pas un vendeur";
						}
						else
						{
							//on trouve l'article recherché
							while ($data = mysqli_fetch_assoc($result))
							{
							echo "Id_vendeur: " . $data['Id_vendeur'] . "<br>";
							echo "Mail: " . $data['Mail'] . "<br>";
							echo "Password: " . $data['Password'] . "<br>";
							echo "Pseudo: " . $data['Pseudo'] . "<br>";

							$tof=$data['Photo'];
							$tof_fond=$data['Img_fond'];

							
							echo "Image Perso ". "<br>";
							echo '<img src="'.$tof.'" >'."<br>";
							echo "Image de fond ". "<br>";
							echo '<img src="'.$tof_fond.'" >';
							echo "<br>";
							}
						}
					}
					else
					{
					echo "Database not found";
					}



	
?>


	
		<body>
				
					<h2>voici vos objets</h2>
					
	<?php
					
					$database = "ecezon";
					//connectez-vous dans votre BDD
					//Rappel: votre serveur = localhost et votre login = root et votre password = <rien>
					$db_handle = mysqli_connect('localhost', 'root', '');
					$db_found = mysqli_select_db($db_handle, $database);

					if ($db_found)
					{
						$sql= "SELECT * FROM article Where Id_vendeur=2";
					
						$result = mysqli_query($db_handle, $sql);
						if (mysqli_num_rows($result) == 0)
						{
						//l'article recherché n'existe pas
						echo "Vous ne possedez pas d'article";
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
							echo "<br>";
							}
						}
					}
					else
					{
					echo "Database not found";
					}
					
	?>
			


				<h2>Supprimer un article</h2>
			<form action="ECE_Amazon_deleted.php" method="post">
				<table>
					
					<tr>
						<td>  Id de l'objet à supprimer:</td>
						<td><input type="text" name="Id_article" placeholder="Id de l'objet à supprimer"></td>
					</tr>
					<tr>
						<td colspan="2" align="center">
							<input type="submit" name="button1" value="Supprimer"></td>
						</tr>
					</table>
				</form>
			</body>
		</html>