<!-- ----- debut de la page viewameliorer --> 

<?php
session_start();


require ($root . '/app/view/fragment/fragmentDoctolibHeader.html');
?>



<body>
  <div class="container">
    <?php
    include $root.'/app/view/fragment/fragmentDoctolibMenuBis.php';
      include $root . '/app/view/fragment/fragmentDoctolibJumbotronAmelioration.html';
    ?> 

    
    <p/>
  </div>
  <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>


    <!-- ----- fin de la page viewameliorer -->

</body>
</html>