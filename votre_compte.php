<?php
// On appelle la session
session_start();
// On écrase le tableau de session
if (!$_SESSION['Id'])
{
	header("Location: connecter.html");
}


if($_SESSION['Id']==1)
{
	header("Location: admin.php");
}

if($_SESSION['Id']>1 && $_SESSION['Id']<1000 )
{
	header("Location: vendeur.php");
}

if($_SESSION['Id']>999)
{
	header("Location: acheteur.php");
}

//echo "Id :". $_SESSION['Id'];

?>