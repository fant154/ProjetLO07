<!-- ----- debut ControllerAdministrateur -->
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
      
    // affiche le nombre de praticiens par patients
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
    
    // --- page d'acceuil
    // --- Liste des vins  
    public static function viewAccueil() {
        include 'config.php';
        $vue = $root . '/app/view/viewAccueil.php';
        require ($vue);
    }

    public static function readLoginInfos() {

        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/user/viewLogin.php';
        if (DEBUG)
            echo ("ControllerProducteur : producteurReadAll : vue = $vue");
        require ($vue);
    }

    public static function readSigninInfos() {

        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/user/viewSignin.php';
        if (DEBUG)
            echo ("ControllerProducteur : producteurReadAll : vue = $vue");
        require ($vue);
    }

    // Affiche un formulaire pour sélectionner un id qui existe
    public static function loginInfosAnalysis() {

        $infos_login = $_GET['login'];
        $infos_password = $_GET['password'];
        $results = ModelPersonne::getAllLoginInfos();
        $isInDatabse = FALSE;
        // ----- Construction chemin de la vue
        include'config.php';
        foreach ($results as $login => $password) {
            if ([$login, $password] == [$infos_login, $infos_password]) {
                $isInDatabase = TRUE;
                break;
            };
        };
        if ($isInDatabase) {
            $currentUserId = ModelPersonne::getIdWithLogin($infos_login);
            $currentUserInfos = ModelPersonne::getNameWithId($currentUserId);
            foreach ($currentUserInfos as $name => $firstName) {
                $currentUserName = $name;
                $currentUserFirstName = $firstName;
            };
            $currentUserStatus = ModelPersonne::getStatusWithId($currentUserId);
            session_start();
            $_SESSION['nom'] = $currentUserName;
            $_SESSION['prenom'] = $currentUserFirstName;
            $_SESSION['id'] = $currentUserId;
            $_SESSION['status'] = $currentUserStatus;
            $_SESSION['login'] = $infos_login;
            echo $currentUserStatus;
            $vue = $root . '/app/view/viewAccueil.php';
        } else {
            $vue = $root . '/app/view/user/viewLoginError.php';
        }
        require ($vue);
    }

    public static function signinInfosAnalysis() {
        $infos_name = $_GET['name'];
        $infos_firstname = $_GET['firstName'];
        $infos_adress = $_GET['adress'];
        $infos_login = $_GET['login'];
        $infos_password = $_GET['password'];
        $infos_status = $_GET['status'];
        $infos_specialite = $_GET['specialite'];
        $results = ModelPersonne::getAllLoginInfos();
        $isInDatabse = FALSE;
        // ----- Construction chemin de la vue
        include 'config.php';
        foreach ($results as $login => $password) {
            if ($login == $infos_login) {
                $isInDatabase = TRUE;
                break;
            };
        };
        if (($infos_status!= ModelPersonne::PRATICIEN && $infos_specialite==0)||($infos_status== ModelPersonne::PRATICIEN && $infos_specialite!=0)){
        if (!$isInDatabase) {
            
            $results = ModelPersonne::insert($infos_name, $infos_firstname, $infos_adress, $infos_login, $infos_password, $infos_status, $infos_specialite);
            session_start();
            //insert into table personne 
            $_SESSION['nom'] = $infos_name;
            $_SESSION['prenom'] = $infos_name;
            $_SESSION['id'] = $results;
            $_SESSION['status'] = $infos_status;
            $vue = $root . '/app/view/user/viewSigninSuccess.php';
        } else {
            $vue = $root . '/app/view/user/viewSigninError.php';
        }}else{ if($infos_status!= ModelPersonne::PRATICIEN && $infos_specialite!=0){
        $vue = $root . '/app/view/user/viewSigninErrorStatus.php';
        
        }else{
            $vue = $root . '/app/view/user/viewSigninErrorStatus1.php';
        }
        }
        require ($vue);
    }

    public static function userLogout() {

        // ----- Construction chemin de la vue
        session_start();
        include 'config.php';
        unset($_SESSION['nom']);
        unset($_SESSION['prenom']);
        session_destroy();
        session_unset();

        unset($_SESSION);
        $vue = $root . '/app/view/viewAccueil.php';
        if (DEBUG)
            echo ("ControllerProducteur : producteurReadAll : vue = $vue");
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
<!-- ----- fin ControllerAdministrateur -->