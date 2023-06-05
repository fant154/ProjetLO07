<!-- ----- debut ControllerPatient -->
<?php
require_once'../model/ModelPersonne.php';

class ControllerPatient{
    
    // affiche toute les infos du patient
    public static function monCompte() {
        $results = ModelPersonne::getAllPeople(2);
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/patient/viewMonCompte.php'; 
        require ($vue);
        if (DEBUG){
        echo ("ControllerPatient : MonCompte : vue = $vue");  
        }
   }
    
    
    // affiche tous les RDV du patient
   public static function listeMesRdv() {
        $results = ModelPersonne::getAllRdv();
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/patient/viewMesRdv.php'; 
        require ($vue);
        if (DEBUG){
        echo ("ControllerPatient : MonCompte : vue = $vue");  
        }
   }
   
   // affiche tout les praticiens
   public static function choisirPraticien(){
       $results = ModelPersonne::getAllPeople(1);
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/patient/viewChoisirPraticien.php'; 
        require ($vue);
        if (DEBUG){
        echo ("ControllerPatient : ChoisirPraticien : vue = $vue");  
        }
   }
    
   
   // affiche tout les Rdv du praticien
   public static function choisirRdv(){
       
       $results = ModelPersonne::getLibreRdv($_GET['praticien']);
        // ----- Construction chemin de la vue
        include 'config.php';
        if($results){
        $vue = $root . '/app/view/patient/viewChoisirRdv.php'; 
        }
        else{
            $vue = $root . '/app/view/viewAccueil.php'; 
        }
        require ($vue);
        if (DEBUG){
        echo ("ControllerPatient : ChoisirRdv : vue = $vue");  
        }
   }
    
   // Insérer le rdv choisi
     public static function RdvChoisi(){
       
       $results = ModelPersonne::reserverRdv($_GET['horaire'],$_GET['patient_id']);
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/viewAccueil.php'; 
        require ($vue);
        if (DEBUG){
        echo ("ControllerPatient : ChoisirRdv : vue = $vue");  
        }
   }
   
   
   
   
   
}
?>
<!-- ----- fin ControllerPatient -->
