
<?php
session_start();
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
          <?php
          printf("<input type='hidden' name='patient_id' value='%d'>",$_SESSION['id']);
          ?>
        <input type="hidden" name='action' value='RdvChoisi'>        
        <label for="horaire">Horaires : </label> 
        <select class="form-control" id='horaire' name='horaire' style="width: 400px">
            <?php
            foreach ($results as $element) {
                    printf("<option value='%s'>%s</option>\n",$element[0],$element[3]);
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

<!-- ----- fin viewChoisirRdv -->

