
<!-- ----- debut ModelVin -->

<?php
require_once 'Model.php';

class ModelPersonne {
 private $id, $nom, $prenom, $adresse, $login, $password, $specialite, $specialite_id;

 // pas possible d'avoir 2 constructeurs
 public function __construct($id = NULL, $nom = NULL, $prenom = NULL, $adresse = NULL,$login = NULL, $password = NULL, $specialite = NULL, $specialite_id = NULL ) {
  // valeurs nulles si pas de passage de parametres
  if (!is_null($id)) {
   $this->id = $id;
   $this->nom = $nom;
   $this->prenom = $prenom;
   $this->adresse = $adresse;
   $this->login = $login;
   $this->password = $password;
   $this->specialite= $specialite;
   $this->specialite_id= $specialite_id;
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
 
 function setSpecialite($specialite) {
  $this->specialite = $specialite;
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
  return $this->Login;
 }
 
  function getPassword() {
  return $this->password;
 }
 
  function getSpecialite() {
  return $this->specialite;
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
   foreach ($results as $login => $id )
       $currentUserId = $id;
   
   
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

 public static function getAll() {
  try {
   $database = Model::getInstance();
   $query = "select * from producteur";
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelProducteur");
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }

 public static function getOne($id) {
  try {
   $database = Model::getInstance();
   $query = "select * from producteur where id = :id";
   $statement = $database->prepare($query);
   $statement->execute([
     'id' => $id
   ]);
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelProducteur");
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }

 public static function insert($nom, $prenom, $region) {
  try {
   $database = Model::getInstance();

   // recherche de la valeur de la clé = max(id) + 1
   $query = "select max(id) from producteur";
   $statement = $database->query($query);
   $tuple = $statement->fetch();
   $id = $tuple['0'];
   $id++;

   // ajout d'un nouveau tuple;
   $query = "insert into producteur value (:id, :nom, :prenom, :region)";
   $statement = $database->prepare($query);
   $statement->execute([
     'id' => $id,
     'nom' => $nom,
     'prenom' => $prenom,
     'region' => $region
   ]);
   return $id;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return -1;
  }
 }
 public static function getRegions() {
  try {
   $database = Model::getInstance();

  
   $query = "select distinct (region) from producteur";
   $statement = $database->query($query);
   
   $statement->execute();
   $results = $statement->fetchAll(PDO::FETCH_COLUMN, 0);
   return $results;
   
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return -1;
  }
 }

 public static function update() {
  echo ("ModelVin : update() TODO ....");
  return null;
 }

 public static function delete() {
  echo ("ModelVin : delete() TODO ....");
  return null;
 }
 
 public static function getNbProducteursRegions() {
  try {
   $database = Model::getInstance();

  
   $query = "select region, count(*) from producteur group by region; ";
   $statement = $database->query($query);
   
   $statement->execute();
   $results = $statement->fetchAll(PDO::FETCH_KEY_PAIR);
   
   return $results;
   
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return -1;
  }
 }

 
}
?>
<!-- ----- fin ModelVin -->
