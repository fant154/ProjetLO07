
<!-- ----- debut ControllerPersonne -->
<?php
require_once '../model/ModelPersonne.php';

class ControllerPersonne {
 // --- page d'acceuil


 // --- Liste des vins
 public static function readLogin() {
  
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/user/viewLogin.php';
  if (DEBUG)
   echo ("ControllerProducteur : producteurReadAll : vue = $vue");
  require ($vue);
 }

 // Affiche un formulaire pour sélectionner un id qui existe
 public static function loginAnalysis() {
  $results = ModelPersonne::getAllLogins();

  // ----- Construction chemin de la vue
  include 'config.php';
  print_r($results);
  $vue = $root . '/app/view/viewAccueil';
  require ($vue);
 }

 // Affiche un vin particulier (id)
 public static function producteurReadOne() {
  $producteur_id = $_GET['id'];
  $results = ModelProducteur::getOne($producteur_id);

  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/producteur/producteurViewAll.php';
  require ($vue);
 }

 // Affiche le formulaire de creation d'un vin
 public static function producteurCreate() {
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/producteur/producteurCreate.php';
  require ($vue);
 }

 // Affiche un formulaire pour récupérer les informations d'un nouveau vin.
 // La clé est gérée par le systeme et pas par l'internaute
 public static function producteurCreated() {
  // ajouter une validation des informations du formulaire
  $results = ModelProducteur::insert(
      htmlspecialchars($_GET['nom']), htmlspecialchars($_GET['prenom']), htmlspecialchars($_GET['region'])
  );
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/producteur/producteurCreated.php';
  require ($vue);
 }
  public static function producteurRegions() {
  
  $results = ModelProducteur::getRegions();

  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/producteur/producteurViewRegions.php';
  require ($vue);
 }
 


public static function nbProducteurRegions() {
  
  $results = ModelProducteur::getNbProducteursRegions();

  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/producteur/producteurViewNbProducteursRegions.php';
  require ($vue);
 }
 
}
?>
<!-- ----- fin ControllerVin -->


