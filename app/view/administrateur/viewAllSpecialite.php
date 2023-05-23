
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
          foreach ($results as $element) {
          printf("<tr><td>%d</td><td>%s</td></tr>", $element[0], 
             $element[1]);
          }
          ?>
      </tbody>
    </table>
  </div>
  <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>

  <!-- ----- fin viewAllspecialite -->
  
  
  