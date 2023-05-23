
<!-- ----- début viewAllspecialite -->
<?php
session_start();
require ($root . '/app/view/fragment/fragmentDoctolibHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentDoctolibMenu.php';
      include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';
      ?>
      <h4>Table des praticiens</h4>
    <table class = "table table-striped table-bordered">
      <thead>
        <tr>
          
          <th scope = "col">id</th>
          <th scope = "col">nom</th>
          <th scope = "col">prenom</th>
          <th scope = "col">adresse</th>
          <th scope = "col">spécialité</th>
        </tr>
      </thead>
      <tbody>
          <?php
          // La liste des Praticien avec les ids est dans une variable $praticien             
          foreach ($praticien as $element) {
              $spe=ModelPersonne::getOneSpe($element->getspecialite_id());
          printf("<tr><td>%d</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>", $element->getId(), 
            $element->getNom(),$element->getPrenom(),$element->getAdresse(),$spe[0][1]);
          }
          ?>
      </tbody>
    </table>
      
      <h4>Table des patients</h4>
        <table class = "table table-striped table-bordered">
      <thead>
        <tr>
          
          <th scope = "col">id</th>
          <th scope = "col">nom</th>
          <th scope = "col">prenom</th>
          <th scope = "col">adresse</th>
          
        </tr>
      </thead>
      <tbody>
          <?php
          // La liste des Patients avec les ids est dans une variable $praticien             
          foreach ($patient as $element) {
              
                    $spe=ModelPersonne::getOneSpe($element->getspecialite_id());
                printf("<tr><td>%d</td><td>%s</td><td>%s</td><td>%s</td></tr>", $element->getId(), 
                  $element->getNom(),$element->getPrenom(),$element->getAdresse());
          
          }
          ?>
      </tbody>
    </table>
      
      <h4>Table des administrateurs</h4>
        <table class = "table table-striped table-bordered">
      <thead>
        <tr>
          
          <th scope = "col">id</th>
          <th scope = "col">nom</th>
          <th scope = "col">prenom</th>
          <th scope = "col">adresse</th>
          
        </tr>
      </thead>
      <tbody>
          <?php
          // La liste des Admins avec les ids est dans une variable $praticien             
          foreach ($admin as $element) {
              
          printf("<tr><td>%d</td><td>%s</td><td>%s</td><td>%s</td></tr>", $element->getId(), 
            $element->getNom(),$element->getPrenom(),$element->getAdresse());
          }
          ?>
      </tbody>
    </table>
      <h4> Table des spécialités</h4>
        <table class = "table table-striped table-bordered">
      <thead>
        <tr>
          
          <th scope = "col">id</th>
          <th scope = "col">spécialité</th>
        </tr>
      </thead>
      <tbody>
          <?php
          // La liste des specialites avec les ids est dans une variable $results             
          foreach ($specialite as $element) {
          printf("<tr><td>%d</td><td>%s</td></tr>", $element[0], 
             $element[1]);
          }
          ?>
      </tbody>
    </table>
      
      <h4>Table des rendez-vous</h4>
      
        <table class = "table table-striped table-bordered">
      <thead>
        <tr>
          
          <th scope = "col">id</th>
          <th scope = "col">patient_id</th>
          <th scope = "col">praticien_id</th>
          <th scope = "col">rdv_date</th>
          
        </tr>
      </thead>
      <tbody>
          <?php
          // La liste des rdv             
          foreach ($rdv as $element) {
          printf("<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>",$element[0],$element[1],$element[2],$element[3]);
          }
          ?>
      </tbody>
    </table>
      
     
      
  </div>
  <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>

  <!-- ----- fin viewAllspecialite -->
  
  
  