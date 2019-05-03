<?php
// On appelle la session
session_start();
// On écrase le tableau de session
$_SESSION = array();

// On détruit la session
session_destroy();
echo 'Bravo, Vous êtes déconnecté ';
 echo "<p><a href='magasin.html'>Retour à la page d'accueil</a></p>";
?>