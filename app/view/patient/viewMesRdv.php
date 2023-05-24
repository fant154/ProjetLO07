
<!-- ----- début viewMesRdv -->
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
          
          <th scope = "col">Nom</th>
          <th scope = "col">Prenom</th>
          <th scope = "col">rdv_date</th>
        </tr>
      </thead>
      <tbody>
          <?php
          // La liste des rdv             
          foreach ($results as $element) {
              if($element[1]==$_SESSION['id']){
                  $inf_praticien= ModelPersonne::getPersonneById($element[2]);
                  printf("<tr><td>%s</td><td>%s</td><td>%s</td></tr>",$inf_praticien[0][0],$inf_praticien[0][1],$element[3]);
              }
          
          }
          ?>
      </tbody>
    </table>
      
     
  </div>
  <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>

  <!-- ----- fin viewMesRdv -->
  
