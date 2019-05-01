<?php  
	//identifier votre BDD 
	if(isset($_POST['button1'])) {
	$database = "ece_amazon";
	$db_handle = mysqli_connect('localhost', 'root', '');
	$db_found = mysqli_select_db($db_handle, $database);
	if($db_found){		

		$nom = isset($_POST["Nom"]) ? $_POST["Nom"] : "";
		$mdp = isset($_POST["mdp"]) ? $_POST["mdp"] : "";
		$prenom = isset($_POST["Prenom"]) ? $_POST["Prenom"] : "";		
		$mail = isset($_POST["Mail"]) ? $_POST["Mail"] : "";
        $adresse = isset($_POST["Adresse"]) ? $_POST["Adresse"] : "";
        $ville = isset($_POST["Ville"]) ? $_POST["Ville"] : "";		
		$code_postal = isset($_POST["Code_postal"]) ? $_POST["Code_postal"] : "";
        $telephone = isset($_POST["Telephone"]) ? $_POST["Telephone"] : "";

        //BLINDAGE
        if(empty($nom) || empty($mdp) || empty($prenom) || empty($mail) || empty($adresse) || empty($ville) || empty($code_postal) || empty($telephone) ) {
			header("Location: logAcheteur.html?signup=empty");    
			} else{
			if(!preg_match("/^[a-zA-Z]*$/", $nom) || !preg_match("/^[a-zA-Z]*$/", $mdp) || !preg_match("/^[a-zA-Z]*$/", $prenom)){
				header("Location: logAcheteur.html?signup=char"); 
				exit();
			}
			} else {
			if(!preg_match("#^[a-z0-9._-]+@edu.ece.fr$#", $mail)){
				header("Location: logAcheteur.html?signup=mail"); 
				exit();
			}
			}else{        
        	$checkslq = "SELECT `Mail` FROM `Acheteur` WHERE `Mail` LIKE '$mail'";
        
       	 $result = mysqli_query($db_handle, $checkslq);

       	 $sql2 = "SELECT max(Id_acheteur) FROM acheteur";
			
			$results = mysqli_query($db_handle, $sql2);
			$data = mysqli_fetch_assoc($results);
			$idmax=$data['max(Id_acheteur)'];
		
			$idmaxi=$idmax+1;
		
        
			if(mysqli_num_rows($result) != 0){
			echo "<script>alert('Cette adresse mail est deja utilisee !');</script>";
            echo "<script>window.close();</script>";
            
			}
			else{
			$addsql = "INSERT INTO `acheteur` (`Id_acheteur`,`Mail`, `Password`, `Nom`, `Prenom`, `Adresse`, `Ville`, `Code_postal`, `Telephone`) VALUES ('$idmaxi', '$mail', '$mdp', '$nom', '$prenom', '$adresse', '$ville', '$code_postal', '$telephone')";
			$result2 = mysqli_query($db_handle, $addsql);
			echo "<script>alert('Felicitations , veuillez vous connecter');</script>";
			echo "<script>window.close();</script>";
			}
		}
	}
	else{
		echo 'BD not found';
	}
	mysqli_close($db_handle);	 
	

}  
?>

