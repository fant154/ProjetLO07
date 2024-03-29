
<!-- ----- debut ModelPersonne -->

<?php
require_once 'Model.php';

class ModelPersonne {

    private $id, $nom, $prenom, $adresse, $login, $password, $specialite_id;

    const ADMINISTRATEUR = 0;
    const PRATICIEN = 1;
    const PATIENT = 2;

    // pas possible d'avoir 2 constructeurs
    public function __construct($id = NULL, $nom = NULL, $prenom = NULL, $adresse = NULL, $login = NULL, $password = NULL, $specialite_id = NULL) {
        // valeurs nulles si pas de passage de parametres
        if (!is_null($id)) {
            $this->id = $id;
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->adresse = $adresse;
            $this->login = $login;
            $this->password = $password;

            $this->specialite_id = $specialite_id;
        }
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }

    function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    function setAdresse($adresse) {
        $this->adresse = $adresse;
    }

    function setLogin($login) {
        $this->login = $login;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setSpecialite_id($specialite_id) {
        $this->specialite_id = $specialite_id;
    }

    function getId() {
        return $this->id;
    }

    function getNom() {
        return $this->nom;
    }

    function getPrenom() {
        return $this->prenom;
    }

    function getAdresse() {
        return $this->adresse;
    }

    function getLogin() {
        return $this->login;
    }

    function getPassword() {
        return $this->password;
    }

    function getSpecialite_id() {
        return $this->specialite_id;
    }

// retourne une liste des id
    public static function getAllLoginInfos() {
        try {
            $database = Model::getInstance();
            $query = "select login, password from personne";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_KEY_PAIR);
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function getIdWithLogin($infos_login) {
        try {
            $database = Model::getInstance();
            $query = "select login, id from personne where login = :infos_login";
            $statement = $database->prepare($query);
            $statement->execute([
                'infos_login' => $infos_login
            ]);
            $results = $statement->fetchAll(PDO::FETCH_KEY_PAIR);
            foreach ($results as $login => $id) {
                $currentUserId = $id;
            }


            return $currentUserId;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function getNameWithId($currentUserId) {
        try {
            $database = Model::getInstance();
            $query = "select nom, prenom from personne where id = :currentUserId";
            $statement = $database->prepare($query);
            $statement->execute([
                'currentUserId' => $currentUserId
            ]);
            $results = $statement->fetchAll(PDO::FETCH_KEY_PAIR);

            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function getStatusWithId($currentUserId) {
        try {
            $database = Model::getInstance();
            $query = "select statut from personne where id = :currentUserId";
            $statement = $database->prepare($query);
            $statement->execute([
                'currentUserId' => $currentUserId
            ]);
            $results = $statement->fetch();
            $status = $results['statut'];
            return $status;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function insert($nom, $prenom, $adresse, $login, $password, $status, $specialite_id) {
        try {
            $database = Model::getInstance();

            // recherche de la valeur de la clé = max(id) + 1
            $query = "select max(id) from personne";
            $statement = $database->query($query);
            $tuple = $statement->fetch();
            $id = $tuple['0'];
            $id++;

            // ajout d'un nouveau tuple;
            $query = "insert into personne value (:id, :nom, :prenom, :adresse, :login, :password, :status, :specialite_id)";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $id,
                'nom' => $nom,
                'prenom' => $prenom,
                'adresse' => $adresse,
                'login' => $login,
                'password' => $password,
                'status' => $status,
                'specialite_id' => $specialite_id
            ]);
            return $id;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return -1;
        }
    }

    public static function getMany($query) {
        try {
            $database = Model::getInstance();
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelProducteur");
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

// On récupère toutes les spécialités dans un tableau numéroté
    public static function getAllspecialite() {
        try {
            $database = Model::getInstance();
            $query = "select * from specialite";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_NUM);
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    // on récupère tout les ID des specialite
    public static function getAllIdspecialite() {
        try {
            $database = Model::getInstance();
            $query = "select id from specialite";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_COLUMN, 0);
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    // On récupère un ID spécifique 
    public static function getOneSpe($id) {
        try {
            $database = Model::getInstance();
            $query = "select * from specialite where id = :id";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $id
            ]);
            $results = $statement->fetchAll(PDO::FETCH_NUM);
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    // insertion d'une spe
    public static function specialiteInsert($specialite) {
        try {
            $database = Model::getInstance();

            // recherche de la valeur de la clé = max(id) + 1
            $query = "select max(id) from specialite";
            $statement = $database->query($query);
            $tuple = $statement->fetch();
            $id = $tuple['0'];
            $id++;

            // ajout d'un nouveau tuple;
            $query = "insert into specialite value (:id, :specialite)";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $id,
                'specialite' => $specialite
            ]);
            return $id;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return -1;
        }
    }

    // On récupère tous les types de personne
    public static function getAllPeople($statut) {
        try {
            $database = Model::getInstance();
            $query = "select * from personne where statut= :statut";
            $statement = $database->prepare($query);
            $statement->execute(['statut' => $statut]);
            $results = $statement->fetchAll(PDO::FETCH_CLASS, 'ModelPersonne');
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    // nbr de patients par praticiens
    public static function nbrPraticien() {
        try {
            $database = Model::getInstance();
            $query = "select patient_id,Count(distinct praticien_id) from rendezvous where patient_id != 0 group by patient_id";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_NUM);
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    // avoir quelqu'un par son id 
    public static function getPersonneById($id) {
        try {
            $database = Model::getInstance();
            $query = "select nom,prenom from personne where id = :id";
            $statement = $database->prepare($query);
            $statement->execute(['id' => $id]);
            $results = $statement->fetchAll();
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    // avoir tout les rdv
    public static function getAllRdv() {
        try {
            $database = Model::getInstance();
            $query = "select * from rendezvous where patient_id != 0";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_NUM);
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    // avoir tout les rdv libres
    public static function getLibreRdv($praticien_id) {
        try {
            $database = Model::getInstance();
            $query = "select * from rendezvous where patient_id = 0 And praticien_id = :praticien_id";
            $statement = $database->prepare($query);
            $statement->execute(['praticien_id' => $praticien_id]);
            $results = $statement->fetchAll(PDO::FETCH_NUM);
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
    
    
    public static function getPatientNameWithId($patient_id) {
        try {
            $database = Model::getInstance();
            $query = "select distinct nom from personne where  id = :patient_id";
            $statement = $database->prepare($query);
            $statement->execute(['patient_id' => $patient_id]);
            $results = $statement->fetchAll(PDO::FETCH_NUM);
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
    
    
     public static function getPatientAdresseWithId($patient_id) {
        try {
            $database = Model::getInstance();
            $query = "select adresse from personne where  id = :patient_id";
            $statement = $database->prepare($query);
            $statement->execute(['patient_id' => $patient_id]);
            $results = $statement->fetchAll(PDO::FETCH_NUM);
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
    
    public static function getPatientFirstNameWithId($patient_id) {
        try {
            $database = Model::getInstance();
            $query = "select distinct prenom from personne where  id = :patient_id";
            $statement = $database->prepare($query);
            $statement->execute(['patient_id' => $patient_id]);
            $results = $statement->fetchAll(PDO::FETCH_NUM);
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
    
    
    
    public static function getPatientIdWithRdv($rdv) {
        try {
            $database = Model::getInstance();
            $query = "select patient_id from rendezvous where rdv_date = :rdv and patient_id != 0";
            $statement = $database->prepare($query);
            $statement->execute(['rdv' => $rdv]);
            $results = $statement->fetchAll(PDO::FETCH_NUM);
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
    
    public static function getRdvReserved($praticien_id) {
        try {
            $database = Model::getInstance();
            $query = "select rdv_date from rendezvous where praticien_id = :praticien_id and patient_id !=0";
            $statement = $database->prepare($query);
            $statement->execute(['praticien_id' => $praticien_id]);
            $results = $statement->fetchAll(PDO::FETCH_COLUMN);
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
    public static function getRdv($praticien_id) {
        try {
            $database = Model::getInstance();
            $query = "select rdv_date from rendezvous where praticien_id = :praticien_id";
            $statement = $database->prepare($query);
            $statement->execute(['praticien_id' => $praticien_id]);
            $results = $statement->fetchAll(PDO::FETCH_COLUMN);
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    // réserver un rdv
    public static function reserverRdv($id, $patient_id) {
        try {
            $database = Model::getInstance();
            $query = "UPDATE rendezvous SET patient_id = :patient_id WHERE id = :id";
            $statement = $database->prepare($query);
            $statement->execute(['id' => $id, 'patient_id' => $patient_id]);
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function getRdvForPraticien($praticien_id) {
        try {
            $database = Model::getInstance();
            $query = "select rdv_date from rendezvous where praticien_id = :praticien_id";
            $statement = $database->prepare($query);
            $statement->execute(['praticien_id' => $praticien_id]);
            $results = $statement->fetchAll(PDO::FETCH_NUM);
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function ajouterDisponibilitesPraticien($praticien_id, $disponibilites) {
        try {
            foreach ($disponibilites as $disponibilite) {
                print_r($disponibilite);
                $database = Model::getInstance();
                $query = "select max(id) from rendezvous";
                $statement = $database->query($query);
                $tuple = $statement->fetch();
                $id = $tuple['0'];
                $id++;
                //création d'un nouvel id pour le rendez vous 
                $query = "insert into rendezvous (id, patient_id, praticien_id, rdv_date) VALUES (:id, '0', :praticien_id, :disponibilite)";
                $statement = $database->prepare($query);
                $statement->execute(['id' => $id,'praticien_id' => $praticien_id, 'disponibilite' => $disponibilite]);
                
            }
           
            
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

}
?>
<!-- ----- fin ModelPersonne -->

