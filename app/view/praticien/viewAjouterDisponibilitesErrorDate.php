
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
          <p>Ces dates sont déjà disponibles ou réservées.</p></br>
          
        <input type="hidden" name='action' value='ajouterDisponibilitesAnalysis'>        
        <label for="disponibilites">Disponibilités : </label> 
        <input type="date" class="form-control" id='disponibilites' name='disponibilites' style="width: 400px">
        <label for="nombreRdv">Nombre de RDV à ajouter : </label> 
        <input class="form-control" id='nombreRdv' name='nombreRdv' style="width: 400px">
            
            
            
       
       <br/> 
      <button class="btn btn-primary" type="submit">Go</button>
      </div>
    </form>
    <p/>
  </div>
  <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>

<!-- ----- fin viewChoisirRdv -->

