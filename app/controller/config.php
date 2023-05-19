
<!-- ----- debut config -->
<?php

// Utile pour le débugage car c'est un interrupteur pour les echos et print_r.
if (!defined('DEBUG')) {
    define('DEBUG', FALSE);
<<<<<<< HEAD
=======
    
    function visu($table){
         echo"<pre>";
      print_r($table);
      echo"</pre>";
    }
>>>>>>> c7913d5dee56ef9b76a57acc638ae1192b4254df
}

// ===============
// Configuration de la base de données sur dev-isi
<<<<<<< HEAD
$dsn = 'mysql:dbname=besnardo;host=localhost;charset=utf8';
$username = 'besnardo';
$password = 'pPE9soPs';

if (!defined('LOCAL')) {
    define('LOCAL', TRUE);
=======
$dsn = 'mysql:dbname=schmittf;host=localhost;charset=utf8';
$username = 'schmittf';
$password = 'uBhNlOf6';

if (!defined('LOCAL')) {
    define('LOCAL', FALSE);
>>>>>>> c7913d5dee56ef9b76a57acc638ae1192b4254df
}

if (LOCAL) {
    // Configuration de la base de données sur localhost
<<<<<<< HEAD
    $dsn = 'mysql:dbname=besnardo;host=localhost;port=3307;charset=utf8';
    $username = 'besnardo';
    $password = 'besnardo';
=======
    $dsn = 'mysql:dbname=schmittf;host=localhost;charset=utf8';
    $username = 'root';
    $password = 'root';
>>>>>>> c7913d5dee56ef9b76a57acc638ae1192b4254df
}
 
// chemin absolu vers le répertoire du projet SUR DEV-ISI 
$root = dirname(dirname(__DIR__)) . "/";


if (DEBUG) {
 echo ("<ul>");
 echo (" <li>dsn = $dsn</li>");
 echo (" <li>username = $username</li>");
 echo (" <li>password = $password</li>");
 echo ("<li>---</li>");
 echo (" <li>root = $root</li>");

 echo ("</ul>");
}
?>

<!-- ----- fin config -->



