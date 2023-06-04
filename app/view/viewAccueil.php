 
<!-- ----- debut de la page viewacceuil -->
<?php if(!isset($_SESSION)){
    session_start();
}?>
<?php include 'fragment/fragmentDoctolibHeader.html'; ?>
<body>
    <div class="container">
        <?php
        include 'fragment/fragmentDoctolibMenu.php';
        include 'fragment/fragmentDoctolibJumbotron.html';
        ?>
    </div>   




    <?php
    include 'fragment/fragmentDoctolibFooter.html';
    ?>

    <!-- ----- fin de la page viewacceuil -->

</body>
</html>