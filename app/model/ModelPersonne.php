<?php
require 'Model.php';

class ModelPersonne{
    
    public const ADMINISTRATEUR = 0;
    public const PRATICIEN = 1;
    public const PATIENT =2;
  
    private $id,$nom,$prenom,$adresse, $login,$password,$statut,$specialite_id;
    
    public function __construct($id = NULL, $nom = NULL, $prenom = NULL, $adresse = NULL,$login=NULL,$password=NULL,$statut=NULL,$specialite_id=NULL) {
  // valeurs nulles si pas de passage de parametres
  if (!is_null($id)) {
   $this->id = $id;
   $this->nom = $nom;
   $this->prenom = $prenom;
   $this->adresse = $adresse;
   $this->login = $login;
   $this->password = $password;
   $this->statut = $statut;
   $this->specialite_id = $specialite_id;
  }
 }
    
   function setId($id){
        $this->id=$id;
}

function setnom($nom){
        $this->nom=$nom;
}

function setPrenom($prenom){
        $this->prenom=$prenom;
}
function setAdresse($adresse){
        $this->adresse=$adresse;
}
function setLogin($login){
        $this->login=$login;
}
function setPassword($password){
        $this->password=$password;
}
function setStatut($statut){
        $this->statut=$statut;
}
function setSpecialite_id($specialite_id){
        $this->specialite_id=$specialite_id;
}

   function getId($id){
        return $this->id;
}

function getnom($nom){
        return $this->nom;
}

function getPrenom($prenom){
        return $this->prenom;
}
function getAdresse($adresse){
        return $this->adresse;
}
function getLogin($login){
        return $this->login;
}
function getPassword($password){
        return $this->password;
}
function getStatut($statut){
        return $this->statut;
}
function getSpecialite_id($specialite_id){
        return $this->specialite_id;
}

// retourne une liste des id
 public static function getAllId() {
  try {
   $database = Model::getInstance();
   $query = "select id from Personne where statut=0";
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll(PDO::FETCH_COLUMN, 0);
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
 
  public static function getMany($query) {
  try {
   $database = Model::getInstance();
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelPersonne");
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
 
 public static function getAll() {
  try {
   $database = Model::getInstance();
   $query = "select * from Personne";
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelPersonne");
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
 
 public static function getOne($id) {
  try {
   $database = Model::getInstance();
   $query = "select * from Personne where id = :id";
   $statement = $database->prepare($query);
   $statement->execute([
     'id' => $id
   ]);
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelPersonne");
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
  
 
 public static function insert($nom, $prenom, $adresse,$login,$password,$statut,$specialite_id) {
  try {
   $database = Model::getInstance();

   // recherche de la valeur de la clé = max(id) + 1
   $query = "select max(id) from Personne";
   $statement = $database->query($query);
   $tuple = $statement->fetch();
   $id = $tuple['0'];
   $id++;

   // ajout d'un nouveau tuple;
   $query = "insert into Producteur value (:id, :nom, :prenom, :adresse, :login, :password, :statut, :specialite_id)";
   $statement = $database->prepare($query);
   $statement->execute([
     'id' => $id,
     'nom' => $nom,
     'prenom' => $prenom,
     'adresse' => $adresse,
     'login'=>$login,
       'password' => $password,
       'statut' => $statut,
       'specialite_id' => $specialite_id
   ]);
   return $id;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return -1;
  }
 }
 
 
 }













