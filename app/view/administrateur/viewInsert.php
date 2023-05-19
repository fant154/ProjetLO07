
<!-- ----- début viewInsert -->
 
<?php 
require ($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
  <div class="container">
    <?php
      include $root . '/app/view/fragment/fragmentCaveMenu.html';
      include $root . '/app/view/fragment/fragmentCaveJumbotron.html';
    ?> 

    <form role="form" method='get' action='router1.php'>
      <div class="form-group">
        <input type="hidden" name='action' value='producteurCreated'>        
        <label class='w-25' for="id">nom : </label><input type="text" name='nom' size='75' value='Besnard' required> <br/>                          
        <label class='w-25' for="id">prenom : </label><input type="text" name='prenom' size='75' value='Olivier' required> <br/> 
        <label class='w-25' for="id">region : </label><input type="text" size='75' name='region' value='Bourgogne' required>        <br/>          
      </div>
      <p/>
       <br/> 
      <button class="btn btn-primary" type="submit">Go</button>
    </form>
    <p/>
  </div>
  <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>

<!-- ----- fin viewInsert -->



