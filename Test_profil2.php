<?php
// On appelle la session
session_start();
echo "Id :". $_SESSION['Id'];
// On écrase le tableau de session
$_SESSION = array();

// On détruit la session
session_destroy();
header("Location: verif_login.html");

?>