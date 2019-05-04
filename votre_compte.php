<?php
// On appelle la session
session_start();
// On écrase le tableau de session
if (!$_SESSION['Id'])
{
	$msg = "Vous devez vous connecter pour visualiser votre compte";
            header("Location:connecter1.php?msg=".$msg);
            die;
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