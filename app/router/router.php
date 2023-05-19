
<!-- ----- debut Router1 -->
<?php
require ('../controller/ControllerPersonne.php');
//require ('../controller/ControllerProducteur.php');
//require ('../controller/ControllerCave.php');
// --- récupération de l'action passée dans l'URL
$query_string = $_SERVER['QUERY_STRING'];

// fonction parse_str permet de construire 
// une table de hachage (clé + valeur)
parse_str($query_string, $param);

// --- $action contient le nom de la méthode statique recherchée
$action = htmlspecialchars($param["action"]);

// --- Liste des méthodes autorisées
switch ($action) {
    case "readLoginInfos" :
    case "loginInfosAnalysis" :
    case "readSigninInfos":
    case "userLogout":
    case "viewAccueil":
        ControllerPersonne::$action();
        break;

    default:
        // $action = "doctolibAccueil";
        require("../view/viewAccueil.php");
}
?>