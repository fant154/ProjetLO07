<?php

require_once "../model/ModelPersonne.php";

class ControllerPraticien {

// affiche toutes les spécialités
    public static function ajouterDisponibilites() {
        session_start();
        //$praticien_id = ModelPersonne::getIdWithLogin($_SESSION['login']);
        //$results = ModelPersonne::getLibreRdvForPraticien($praticien_id);
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/praticien/viewAjouterDisponibilites.php';
        require ($vue);
        if (DEBUG) {
            echo ("ControllerPersonne : specialiteReadAll : vue = $vue");
        }
    }

    public static function ajouterDisponibilitesAnalysis() {
        session_start();
        $praticien_id = ModelPersonne::getIdWithLogin($_SESSION['login']);
        $results = ModelPersonne::getRdvForPraticien($praticien_id);
        if ($_GET['nombreRdv'] > 8) {
            include 'config.php';
            $vue = $root . '/app/view/praticien/viewAjouterDisponibilitesError.php';
            require ($vue);
        } else {
            $allRdv = array();
            $disponibilites = $_GET['disponibilites'];
            
            for ($i=0;$i<$_GET['nombreRdv'];$i=$i+1){
                $heure = 10+$i;
                $allRdv[$i] = "$disponibilites" . " à " . "$heure" ."h";
            }
            include 'config.php';
        $vue = $root . '/app/view/praticien/viewAjouterDisponibilitesConfirm.php';
        require ($vue);
            
            
        }

        // ----- Construction chemin de la vue
       
        if (DEBUG) {
            echo ("ControllerPersonne : specialiteReadAll : vue = $vue");
        }
    }
    
    public static function ajouterDisponibilitesSuccess() {
        
        //$praticien_id = ModelPersonne::getIdWithLogin($_SESSION['login']);
        //$results = ModelPersonne::getLibreRdvForPraticien($praticien_id);
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/praticien/viewAjouterDisponibilitesSuccess.php';
        require ($vue);
        if (DEBUG) {
            echo ("ControllerPraticien : ajoputerDisponibilitesSuccess : vue = $vue");
        }
    }
    
     public static function ajouterDisponibilitesError() {
        
        //$praticien_id = ModelPersonne::getIdWithLogin($_SESSION['login']);
        //$results = ModelPersonne::getLibreRdvForPraticien($praticien_id);
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/praticien/viewAjouterDisponibilitesError.php';
        require ($vue);
        if (DEBUG) {
            echo ("ControllerPersonne : specialiteReadAll : vue = $vue");
        }
    }

}
