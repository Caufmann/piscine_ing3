<?php  
	//identifier votre BDD 
	if(isset($_POST['button1'])) {
		$database = "ece_amazon";
		$db_handle = mysqli_connect('localhost', 'root', '');
		$db_found = mysqli_select_db($db_handle, $database);
		if($db_found){	

			
				

			$nom = isset($_POST["Nom"]) ? $_POST["Nom"] : "";
			$mdp = isset($_POST["mdp"]) ? $_POST["mdp"] : "";
			$mdp2 = isset($_POST["mdp2"]) ? $_POST["mdp2"] : "";
			$prenom = isset($_POST["Prenom"]) ? $_POST["Prenom"] : "";		
			$mail = isset($_POST["Mail"]) ? $_POST["Mail"] : "";
			$photo = isset($_POST["avatar"]) ? $_POST["avatar"] : "";
			$fond = isset($_POST["fond"]) ? $_POST["fond"] : "";

			

			$dossier_img = 'img/'.$photo;
			$dossier_img2 = 'img/'.$fond;
        	

        	//BLINDAGE
        	if(empty($nom) || empty($mdp) || empty($prenom) || empty($mail) ) {
				header("Location: inscription_vendeur.php?signup=empty");    
			} elseif(!preg_match("/^[a-zA-Z]*$/", $nom) || !preg_match("/^[a-zA-Z]*$/", $mdp) || !preg_match("/^[a-zA-Z]*$/", $prenom)){
					header("Location: inscription_vendeur.php?signup=char"); 
					exit();
			
					} elseif(!preg_match("#^[a-z0-9._-]+@edu.ece.fr$#", $mail)){
						header("Location: inscription_vendeur.php?signup=mail&nom=$nom&prenom=$prenom"); 
						exit();
			
					}elseif(strcmp($mdp,$mdp2)!==0){ 
						header("Location: inscription_vendeur.php?signup=mdp&nom=$nom&prenom=$prenom"); 
						exit(); 
					}else{      
        					$checkslq = "SELECT `Mail` FROM `vendeur` WHERE `Mail` LIKE '$mail'";
        
       						 $result = mysqli_query($db_handle, $checkslq);

       							 $sql2 = "SELECT max(Id) FROM vendeur";
			
									$results = mysqli_query($db_handle, $sql2);
									$data = mysqli_fetch_assoc($results);
									$idmax=$data['max(Id)'];
		
									$idmaxi=$idmax+1;
		
        
								if(mysqli_num_rows($result) != 0){
									header("Location: inscription_vendeur.php?signup=mail_used"); 
									exit();	
            
								}
								else{
									$addsql = "INSERT INTO `vendeur` (`Id`,`Mail`, `Password`, `Pseudo`, `Nom`, `Photo`, `Img_fond`) VALUES ('$idmaxi', '$mail', '$mdp', '$prenom', '$nom', '$photo', '$fond')";
									//RAJOUTER LES AJOUTS DE PHOTOS
									$result2 = mysqli_query($db_handle, $addsql);
									$photo = 'imgexpl/'.$photo;
									$fond = 'imgexpl/'.$fond;
									
									
									copy($photo, $dossier_img);
									copy($fond, $dossier_img2);
									

									
									
									header("Location: inscription_vendeur.php?signup=success"); 
									exit();
								}
							}
							
		}
		else{
		echo 'BD not found';
		}
		mysqli_close($db_handle);	 
	}

	  
?>

