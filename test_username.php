<?php
	if (isset($_POST['username']))
	{
		$username =$_POST['username'];
		$url = "ECE_Amazon_delete.php?username=" . $username;
		header("Location: ". $url);
		exit();
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Formulaire pour se log à la page</title>
	</head>
	<body>
		<h2>Formulaire pour se log à son compte</h2>
		<form method="post" action ="test_username.php">
			<input type="text" name="username" placeholder="username">
			<input type="submit" name="save">
		</form>
	</body>
</html>