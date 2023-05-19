
<!-- ----- début viewInsert -->
 
<?php 
require ($root . '/app/view/fragment/fragmentDoctolibHeader.html');
?>

<body>
  <div class="container">
    <?php
      include $root . '/app/view/fragment/fragmentDoctolibMenu.php';
      include $root . '/app/view/fragment/fragmentDoctolibJumbotron.html';
    ?> 

    <form role="form" method='get' action='router.php'>
      <div class="form-group">
          <input type="hidden" name='action' value='loginInfosAnalysis'>  
         
        <label class='w-25' for="id">Login : </label><input type="text" name='login' size='75' value=''> <br/>
        <label class='w-25' for="id">Password : </label><input type="text" name='password' size='75' value=''> <br/>  
              
      </div>
      <p/>
       <br/> 
      <button class="btn btn-primary" type="submit">Se Connecter</button>
    </form>
    <p/>
  </div>
  <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>

<!-- ----- fin viewInsert -->



