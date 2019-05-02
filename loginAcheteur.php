<?php  
	//identifier votre BDD 
	if(isset($_POST['button1'])) {
		$database = "ece_amazon";
		$db_handle = mysqli_connect('localhost', 'root', '');
		$db_found = mysqli_select_db($db_handle, $database);
		if($db_found){	
			$typecarte = 0;
			$numcarte = 0;
			$date = 0;
			$nomcarte = 0;
			$crypto = 0;	

			$nom = isset($_POST["Nom"]) ? $_POST["Nom"] : "";
			$mdp = isset($_POST["mdp"]) ? $_POST["mdp"] : "";
			$mdp2 = isset($_POST["mdp2"]) ? $_POST["mdp2"] : "";
			$prenom = isset($_POST["Prenom"]) ? $_POST["Prenom"] : "";		
			$mail = isset($_POST["Mail"]) ? $_POST["Mail"] : "";
        	$adresse = isset($_POST["Adresse"]) ? $_POST["Adresse"] : "";
        	$ville = isset($_POST["Ville"]) ? $_POST["Ville"] : "";		
			$code_postal = isset($_POST["Code_postal"]) ? $_POST["Code_postal"] : "";
			$telephone = isset($_POST["Telephone"]) ? $_POST["Telephone"] : "";
			$typecarte = isset($_POST["type_card"]) ? $_POST["type_card"] : "";
			$numcarte = isset($_POST["number"]) ? $_POST["number"] : "";
			$date = isset($_POST["date"]) ? $_POST["date"] : "";
			$nomcarte = isset($_POST["nom_carte"]) ? $_POST["nom_carte"] : "";
			$crypto = isset($_POST["num_carte"]) ? $_POST["num_carte"] : "";

        	//BLINDAGE
        	if(empty($nom) || empty($mdp) || empty($prenom) || empty($mail) || empty($adresse) || empty($ville) || empty($code_postal) || empty($telephone) ) {
				header("Location: logAcheteur.php?signup=empty");    
			} elseif(!preg_match("/^[a-zA-Z]*$/", $nom) || !preg_match("/^[a-zA-Z]*$/", $mdp) || !preg_match("/^[a-zA-Z]*$/", $prenom)){
					header("Location: logAcheteur.php?signup=char"); 
					exit();
			
					} elseif(!preg_match("#^[a-z0-9._-]+@edu.ece.fr$#", $mail)){
						header("Location: logAcheteur.php?signup=mail&nom=$nom&prenom=$prenom&adresse=$adresse&ville=$ville&telephone=$telephone&Code_postal=$code_postal"); 
						exit();
			
					}elseif(strcmp($mdp,$mdp2)!==0){ 
						header("Location: logAcheteur.php?signup=mdp&nom=$nom&prenom=$prenom&adresse=$adresse&ville=$ville&telephone=$telephone&Code_postal=$code_postal"); 
						exit(); 
					}else{      
        					$checkslq = "SELECT `Mail` FROM `Acheteur` WHERE `Mail` LIKE '$mail'";
        
       						 $result = mysqli_query($db_handle, $checkslq);

       							 $sql2 = "SELECT max(Id_acheteur) FROM acheteur";
			
									$results = mysqli_query($db_handle, $sql2);
									$data = mysqli_fetch_assoc($results);
									$idmax=$data['max(Id_acheteur)'];
		
									$idmaxi=$idmax+1;
		
        
								if(mysqli_num_rows($result) != 0){
									header("Location: logAcheteur.php?signup=mail_used"); 
									exit();	
            
								}
								else{
									$addsql = "INSERT INTO `acheteur` (`Id_acheteur`,`Mail`, `Password`, `Nom`, `Prenom`, `Adresse`, `Ville`, `Code_postal`, `Telephone`) VALUES ('$idmaxi', '$mail', '$mdp', '$nom', '$prenom', '$adresse', '$ville', '$code_postal', '$telephone')";
									$addsql2 = "INSERT INTO `carte_bank` (`Id_acheteur`,`Type_carte`, `Num_carte`, `Date_carte`, `Nom_carte`, `Code_carte`) VALUES ('$idmaxi', '$typecarte', '$numcarte', '$date', '$nomcarte', '$crypto')";

									$result2 = mysqli_query($db_handle, $addsql);
									$resul2 = mysqli_query($db_handle, $addsql2);
									header("Location: logAcheteur.php?signup=success"); 
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

