
<!-- ----- debut Router1 -->
<?php

require_once ('../controller/ControllerAdministrateur.php');
require_once ('../controller/ControllerPatient.php');
require_once ('../controller/ControllerPraticien.php');
require_once ('../controller/ControllerUser.php');
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
        
    case "listeSpecialite":
    case "specialiteReadId":
    case "specialiteReadOne":
    case "specialiteCreate":
    case "specialiteCreated":
    case "listePraticien":
    case "patientPraticien":
    case"globalInfo":
        ControllerAdministrateur::$action();
        break;
    case "monCompte":
    case "listeMesRdv":
    case "choisirPraticien":
    case "choisirRdv":
    case "RdvChoisi":
        ControllerPatient::$action();
        break;
    case "ajouterDisponibilitesAnalysis":
        case "ajouterDisponibilitesSuccess":
            case "ajouterDisponibilitesError":
    case "ajouterDisponibilites":
    case "listeDisponibilites":
    case "listeRdvNomPatients":
    case "listePatients":
        ControllerPraticien::$action();
        break;
    case "Fonctionnalite";
    case "Amelioration";
        ControllerUser::$action();
        break;
    default:
        // $action = "doctolibAccueil";
        require("../view/viewAccueil.php");
}
?>

<!-- ----- fin Router1 -->