
<?php
session_start();
require ($root . '/app/view/fragment/fragmentDoctolibHeader.html');
?>


<!-- ----- début viewChoisirPraticien -->

<body>
  <div class="container">
    <?php
      include $root . '/app/view/fragment/fragmentDoctolibMenu.php';
      include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';
    ?> 

    <form role="form" method='get' action='router.php'>
      <div class="form-group">
        <input type="hidden" name='action' value='choisirRdv'>        
        <label for="praticien">Praticien : </label> 
        <select class="form-control" id='praticien' name='praticien' style="width: 400px">
            <?php
            foreach ($results as $element) {
                $spe= ModelPersonne::getOneSpe($element->getSpecialite_id());
                printf("<option value='%s'>%s %s %s</option>",$element->getId(),$element->getNom(),$element->getPrenom(),$spe[0][1]);
            }
            ?>
        </select>                          
      </div>
      <p/>
       <br/> 
      <button class="btn btn-primary" type="submit">Go</button>
    </form>
    <p/>
  </div>
  <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>

<!-- ----- fin viewChoisirPraticien -->

