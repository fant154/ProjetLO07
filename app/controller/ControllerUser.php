<?php

class ControllerUser{
    
    // affiche page Innovation
    public static function Fonctionnalite() {
        require_once 'config.php';
        $vue = $root . '/app/view/user/viewFonctionnalite.php'; 
        require ($vue);
        if (DEBUG){
        echo ("ControllerUser : Fonctionnalite : vue = $vue");  
        }
   }
   
   // affiche page Amelioration
    public static function Amelioration() {
        require_once 'config.php';
        $vue = $root . '/app/view/user/viewAmelioration.php'; 
        require ($vue);
        if (DEBUG){
        echo ("ControllerUser : Amelioration : vue = $vue");  
        }
   }
   
}