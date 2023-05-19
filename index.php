<?php
session_start();
$_SESSION['nom'] = NULL;
$_SESSION['prenom'] = NULL;
$_SESSION['login'] = NULL;
session_destroy();

header('Location: app/router/router.php?action=truc');

?>

