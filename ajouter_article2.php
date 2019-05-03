<?php  
session_start();
	//identifier votre BDD 
	if(isset($_POST['button1'])) {
		$database = "ece_amazon";
		$db_handle = mysqli_connect('localhost', 'root', '');
		$db_found = mysqli_select_db($db_handle, $database);
		if($db_found){	
            $photo1='0';
            $photo2='0';
            $photo3='0';	

			$nom = isset($_POST["Nom"]) ? $_POST["Nom"] : "";			
			$description = isset($_POST["Prenom"]) ? $_POST["Prenom"] : "";		
            $prix = isset($_POST["Adresse"]) ? $_POST["Adresse"] : "";
            $typeitem = isset($_POST["type_item"]) ? $_POST["type_item"] : "";
            $photo1 = isset($_POST["foto1"]) ? $_POST["foto1"] : "";
            $photo2 = isset($_POST["foto2"]) ? $_POST["foto2"] : "";
            $photo3 = isset($_POST["foto3"]) ? $_POST["foto3"] : "";
			

			

           
               $dossier_img1 = 'img/'.$photo1;
           
               $dossier_img2 = 'img/'.$photo2;
           
               $dossier_img3 = 'img/'.$photo3;
			
        	

        	//BLINDAGE
        	if(empty($nom) || empty($description) || empty($prix) || $photo1=='0' ) {
				header("Location: ajouter_article.php?signup=empty&nom=$nom&prenom=$description&adresse=$prix");    
			}else{      
        					$checkslq = "SELECT `Nom` FROM `article` WHERE `Nom` LIKE '$nom'";
        
       						 $result = mysqli_query($db_handle, $checkslq);

       							 $sql2 = "SELECT max(Id_article) FROM article";
			
									$results = mysqli_query($db_handle, $sql2);
									$data = mysqli_fetch_assoc($results);
									$idmax=$data['max(Id_article)'];
		
									$idmaxi=$idmax+1;
		
        
								if(mysqli_num_rows($result) != 0){
									header("Location: ajouter_article.php?signup=mail_used&prenom=$description&adresse=$prix"); 
									exit();	
            
								}
								else{
                                    $id = $_SESSION['Id'];
									$addsql = "INSERT INTO `article` (`Id_article`,`Categorie`, `Nom`, `Photo1`, `Photo2`, `Photo3`, `Description`, `Prix`, `Reduction_prix`, `Cpt_vente`, `Id`) VALUES ('$idmaxi', '$typeitem', '$nom', '$photo1', '$photo2', '$photo3', '$description', '$prix', 1, 0, '$id')";
									//RAJOUTER LES AJOUTS DE PHOTOS
									$result2 = mysqli_query($db_handle, $addsql);
                                    $photo1 = 'imgexpl/'.$photo1;
                                    $photo2 = 'imgexpl/'.$photo2;
                                    $photo3 = 'imgexpl/'.$photo3;
									
									
									
                                        copy($photo1, $dossier_img1);
                                    
                                    
                                        copy($photo2, $dossier_img2);
                                    
                                    
                                        copy($photo3, $dossier_img3);
                                    
                                    
                                    								
                                    
                                    if($typeitem=='Musique'){
                                        header("Location: info_musique.php"); 
                                     }
                                     if($typeitem=='Livre'){
                                        header("Location: info_livre.php"); 
                                     }
                                     if($typeitem=='Sport'){
                                        header("Location: info_sport.php"); 
                                     }
                                     if($typeitem=='Vetement'){
                                        header("Location: info_vetement.php"); 
                                     }
									
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

