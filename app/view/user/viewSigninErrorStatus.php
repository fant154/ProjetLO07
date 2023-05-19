
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
                <input type="hidden" name='action' value='signinInfosAnalysis'>
                <?php echo"Vous ne pouvez pas choisir de spécilaité si vous n'êtes pas un praticien.<br>" ?>

                <label class='w-25' for="name">Nom : </label><input type="text" name='name' size='75' value=''> <br/>
                <label class='w-25' for="firstName">Prénom : </label><input type="text" name='firstName' size='75' value=''> <br/>  
                <label class='w-25' for="adress">Adresse : </label><input type="text" name='adress' size='75' value=''> <br/>  
                <label class='w-25' for="login">Login : </label><input type="text" name='login' size='75' value=''> <br/>
                <label class='w-25' for="password">Password : </label><input type="text" name='password' size='75' value=''> <br/>
                <label class='w-25' for="status">Status</label>
                <select class="w-25" name="status" size="3" >
                        <option value="1">Praticien</option>
                        <option value="2">Patient</option>
                        <option value="0">Administrateur</option>
                    
                </select><br>
                <label class='w-25' for="specialite">Spécialité si vous êtes un praticien : </label>
                <select class="w-25" name="specialite" size="3" >
                         <option value="0">Je ne suis pas un praticien</option>
                    <option value="1">Médecin généraliste</option>
                    <option value="2">Infirmier</option>
                    <option value="3">Dentiste</option>
                    <option value="4">Sage femme</option>
                    <option value="5">Osthéopathe</option>
                    <option value="6">Kinésithérapeute</option>
                    
                </select><br>

            </div>
            <p/>
            <br/> 
            <button class="btn btn-primary" type="submit">Se Connecter</button>
        </form>
        <p/>
    </div>
    <?php include $root . '/app/view/fragment/fragmentDoctolibFooter.html'; ?>

    <!-- ----- fin viewInsert -->



