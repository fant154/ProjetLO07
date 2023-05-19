
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

                <label class='w-25' for="name">Nom : </label><input type="text" name='name' size='75' value=''> <br/>
                <label class='w-25' for="firstName">Prénom : </label><input type="text" name='firstName' size='75' value=''> <br/>  
                <label class='w-25' for="adress">Adresse : </label><input type="text" name='adress' size='75' value=''> <br/>  
                <label class='w-25' for="login">Login : </label><input type="text" name='login' size='75' value=''> <br/>
                <label class='w-25' for="password">Password : </label><input type="text" name='password' size='75' value=''> <br/>
                <label class='w-25' for="status">Status</label>
                <select class="w-25" name="status" size="3" >
                        <option value="praticien">Praticien</option>
                        <option value="patient">Patient</option>
                        <option value="admin">Administrateur</option>
                    
                </select><br>
                <label class='w-25' for="specialite">Spécialité si vous êtes un praticien : </label>
                <select class="w-25" name="specialite" size="3" >
                        <option value="general">Médecin généraliste</option>
                        <option value="dentist">Dentiste</option>
                        <option value="ostheo">Osthéopathe</option>
                        <option value="infirmier">Infirmier</option>
                    
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



