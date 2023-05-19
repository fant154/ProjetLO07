
<!-- ----- debut Router1 -->
<?php
require ('../controller/ControllerAdministrateur.php');
require ('../controller/ControllerPatient.php');
require ('../controller/ControllerPraticien.php');
// --- récupération de l'action passée dans l'URL
$query_string = $_SERVER['QUERY_STRING'];

// fonction parse_str permet de construire 
// une table de hachage (clé + valeur)
parse_str($query_string, $param);

// --- $action contient le nom de la méthode statique recherchée
$action = htmlspecialchars($param["action"]);

// --- Liste des méthodes autorisées
switch ($action) {
 case "vinReadAll" :
 case "vinReadOne" :
 case "vinReadId" :
 case "vinCreate" :
 case "vinCreated" :
  ControllerAdministrateur::$action();
 


 // Tache par défaut
 default:
  $action = "administrateurAccueil";
  ControllerAdministrateur::$action();
}
?>
<!-- ----- Fin Router1 -->

