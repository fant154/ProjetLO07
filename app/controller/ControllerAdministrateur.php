<?php

require_once "../model/ModelPersonne.php";

class ControllerAdministrateur{
    
// affiche toutes les spécialités
    public static function listeSpecialite() {
        $results = ModelPersonne::getAllspecialite();
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/administrateur/viewAllSpecialite.php'; 
        require ($vue);
        if (DEBUG){
        echo ("ControllerPersonne : specialiteReadAll : vue = $vue");  
        }
   }
    
    
   // Affiche un formulaire pour sélectionner un id de specialite
    public static function specialiteReadId() {
     $results = ModelPersonne::getAllIdspecialite();

     // ----- Construction chemin de la vue
     include 'config.php';
     $vue = $root . '/app/view/administrateur/viewIdSpecialite.php';
     require ($vue);
    }
    
    // Affiche une specialite particuliere (id)
    public static function specialiteReadOne() {
     $spe_id = $_GET['id'];
     $results = ModelPersonne::getOneSpe($spe_id);
     // ----- Construction chemin de la vue
     include 'config.php';
     $vue = $root . '/app/view/administrateur/viewAllSpecialite.php';
     require ($vue);
    }
    
    // Insertion spécialité
    public static function specialiteCreate(){
    // ----- Construction chemin de la vue
    include 'config.php';
    $vue = $root . '/app/view/administrateur/viewInsertSpecialite.php';
    require ($vue);
   }
    
   // Spécialité créer 
   // La clé est gérée par le systeme et pas par l'internaute
    public static function specialiteCreated() {
     // ajouter une validation des informations du formulaire
     $results = ModelPersonne::specialiteInsert(
         htmlspecialchars($_GET['specialite']));
     // ----- Construction chemin de la vue
    include 'config.php';
    $vue = $root . '/app/view/administrateur/viewInsertedSpecialite.php';
    require ($vue);
      }
    
      // liste praticien avec leurs spés
    public static function listePraticien() {
        $results = ModelPersonne::getAllPeople(1);
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/administrateur/viewAllPraticien.php'; 
        if (DEBUG)
            echo ("ControllerPersonne : specialiteReadAll : vue = $vue");
        require ($vue);
    }
      
    // affiche le nombre de patients par praticiens
    public static function patientPraticien(){
    $results = ModelPersonne::nbrPraticien();
    // ----- Construction chemin de la vue
    include 'config.php';
    $vue = $root . '/app/view/administrateur/viewNbrPraticien.php';
    if (DEBUG)
     echo ("ControllerPersonne : patientPraticien : vue = $vue");
    require ($vue);
 
    }
    
    // affiche les infos globals 
    public static function globalInfo(){
        $admin = ModelPersonne::getAllPeople(0);
        $patient = ModelPersonne::getAllPeople(2);
        $praticien = ModelPersonne::getAllPeople(1);
        $specialite = ModelPersonne::getAllspecialite();
        $rdv = ModelPersonne::getAllRdv();
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/administrateur/viewAllInfo.php'; 
        if (DEBUG)
            echo ("ControllerPersonne : specialiteReadAll : vue = $vue");
        require ($vue);
    
    }
    
    
    
    
    
    
    
}
