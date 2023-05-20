
<!-- ----- début viewAllspecialite -->
<?php

require ($root . '/app/view/fragment/fragmentDoctolibHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentDoctolibMenu.html';
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
            $element->getNom(),$element->getPrenom(),$element->getAdresse(),$spe[1]);
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
          // La liste des Praticien avec les ids est dans une variable $praticien             
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
          // La liste des Praticien avec les ids est dans une variable $praticien             
          foreach ($administrateur as $element) {
              $spe=ModelPersonne::getOneSpe($element->getspecialite_id());
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
      `id`, `patient_id`, `praticien_id`, `rdv_date`
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
          // La liste des Praticien avec les ids est dans une variable $praticien             
          foreach ($rdv as $element) {
              $spe=ModelPersonne::getOneSpe($element->getspecialite_id());
          printf("<tr><td>%d</td><td>%d</td><td>%d</td><td>%s</td></tr>",$rdv[0],$rdv[1],$rdv[2],$rdv[3] );
          }
          ?>
      </tbody>
    </table>
      
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
            $element->getNom(),$element->getPrenom(),$element->getAdresse(),$spe[1]);
          }
          ?>
      </tbody>
    </table>
      
  </div>
  <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>

  <!-- ----- fin viewAllspecialite -->
  
  
  