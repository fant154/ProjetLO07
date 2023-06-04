
<!-- ----- début viewMesRdv -->
<?php
if (!isset($_SESSION)){
    session_start();
}
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
          <th scope = "col">Rendez-vous</th>
        </tr>
      </thead>
      <tbody>
          <?php
          // La liste des rdv   
$i=0;          
          foreach ($names as $name) {
             
                  
                  printf("<tr><td>%s</td><td>%s</td><td>%s</td></tr>",$name,$first_names[$i],$listeRdv[$i]);
              $i++;
          
          }
          ?>
      </tbody>
    </table>
      
     
  </div>
  <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>

  <!-- ----- fin viewMesRdv -->
  
