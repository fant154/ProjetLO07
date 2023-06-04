
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
<h4>Mes Disponibilités</h4>
      <ul>
          <?php
          
          // La liste des rdv             
          foreach ($results as $line) {
              if($line[1]== 0){
                  
                  printf("<li>%s</li>",$line[3]);
              }
          
          }
          ?>
          
      </ul>
          
        
      
      
     
  </div>
  <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>

  <!-- ----- fin viewMesRdv -->
  
