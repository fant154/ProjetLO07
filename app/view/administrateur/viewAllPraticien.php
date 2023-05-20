
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
          // La liste des Praticien avec les ids est dans une variable $results, dans $res il y a la liste des              
          foreach ($results as $element) {
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
  
  
  