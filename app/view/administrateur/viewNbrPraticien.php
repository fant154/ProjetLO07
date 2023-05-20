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
          <th scope = "col">Nom du Patient</th>
          <th scope = "col">Prenom du patient</th>
          <th scope = "col">Nombre de praticiens</th>
        </tr>
      </thead>
      <tbody>
          <?php             
          foreach ($results as $element) {
              if ($element[0]==0){
                  $res=array("Libre","");
              }
              else{
                  $res= ModelPersonne::getPersonneById($element[0]);
              }
           printf("<tr><td>%s</td><td>%s</td><td>%d</td></tr>", $res[0], $res[1],
             $element[1]);
          }
          ?>
      </tbody>
    </table>
  </div>
  <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>

  <!-- ----- fin viewAll -->
  