
<?php

if (!isset($_SESSION)){
    session_start();
}
require ($root . '/app/view/fragment/fragmentDoctolibHeader.html');
?>


<!-- ----- début viewChoisirRdv -->

<body>
  <div class="container">
    <?php
      include $root . '/app/view/fragment/fragmentDoctolibMenu.php';
       include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';
    ?> 

    <form role="form" method='get' action='router.php'>
      <div class="form-group">
          
        <input type="hidden" name='action' value='ajouterDisponibilitesSuccess'>        
        <label for="disponibilites">Les disponibilités suivantes seront ajoutées : </label> 
        <?php 
        echo ("<ul>");
        foreach ($allRdv as $Rdv){
            echo("<li>". $Rdv. "</li>");
        }
        echo("</ul>");
        
        ?>
       
        
        
            
            
            
      
       <br/> 
      <button class="btn btn-primary" type="submit">Valider</button>
    </form>
    <p/>
  </div>
  <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>

<!-- ----- fin viewChoisirRdv -->

