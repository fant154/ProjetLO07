
<!-- ----- debut Router1 -->
<?php
require ('../controller/ControllerPersonne.php');
require ('../controller/ControllerAdministrateur.php');
//require ('../controller/ControllerPatient.php');
//require ('../controller/ControllerPraticien.php');
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
    case "signinInfosAnalysis":
    case "userLogout":
    case "viewAccueil":
        ControllerPersonne::$action();
        break;
    case "listeSpecialite":
    case "specialiteReadId":
    case "specialiteReadOne":
    case "specialiteCreate":
    case "specialiteCreated":
    case "listePraticien":
        ControllerAdministrateur::$action();

    default:
        // $action = "doctolibAccueil";
        require("../view/viewAccueil.php");
}
?>