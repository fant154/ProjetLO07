
<!-- ----- début fragmentCaveMenu -->

<nav class="navbar navbar-expand-lg bg-success fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="router.php?action=viewAccueil">SCHMITT BESNARD <?php
        $status = '';
            if (!empty($_SESSION)) {
                if (isset($_SESSION['status'])){
                    $status = '';
                    if($_SESSION['status']== 0)
                        $status = "| Administrateur";
                    elseif($_SESSION['status']== 1)
                        $status = "| Praticien";
                    elseif($_SESSION['status']== 2)
                        $status = "| Patient";
                        
                }
                
                printf("%s  | %s %s",$status,  $_SESSION['nom'], $_SESSION['prenom']);
            };
            // The session is empty
            ?></a> <!-- add role and username -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                   <?php 
                   
                if (isset($_SESSION['status'])){
                    
                    if($_SESSION['status']== 0)
                      echo(" <li class='nav-item dropdown'>
                    <a class='nav-link dropdown-toggle' role='button' data-bs-toggle='dropdown' aria-expanded='false'>Administrateur</a>
                    <ul class='dropdown-menu'>
                        <li><a class='dropdown-item' href='router.php?action=listeSpecialite'>Liste des spécialités</a></li>
                        <li><a class='dropdown-item' href='router.php?action=specialiteReadId'>Sélection d'ubne spécialité par son id</a></li>
                        <li><a class='dropdown-item' href='router.php?action=specialiteCreate'>Insertion d'une nouvelle spécialité</a></li> 
                        <li><hr></li> 
                        <li><a class='dropdown-item' href='router.php?action=listePraticien'>Liste des praticiens avec leur spécialité</a></li> 
                        <li><a class='dropdown-item' href='router.php?action=patientPraticien'>Nombre de praticiens par patient</a></li> 
                        <li><hr></li>
                        <li><a class='dropdown-item' href='router.php?action=globalInfo'>Info</a></li> 
                    </ul>
                </li>");  
                    elseif($_SESSION['status']== 1)
                        echo(" <li class='nav-item dropdown'>
                    <a class='nav-link dropdown-toggle' role='button' data-bs-toggle='dropdown' aria-expanded='false'>Praticien</a>
                    <ul class='dropdown-menu'>
                        <li><a class='dropdown-item' href='router.php?action=listeDisponibilites'>Liste de mes disponibilités</a></li>
                        <li><a class='dropdown-item' href='router.php?action=ajouterDisponibilites'>Ajout de nouvelles disponibilités</a></li>
                        
                        <li><hr></li> 
                        <li><a class='dropdown-item' href='router.php?action=vinCreate'>Liste des rendez vous avec le nom des patients</a></li> 
                        <li><a class='dropdown-item' href='router.php?action=vinCreate'>Liste de mes patients (sans doublons)</a></li> 
                        
                    </ul>
                </li>");  
                    elseif($_SESSION['status']== 2)
                        echo(" <li class='nav-item dropdown'>
                    <a class='nav-link dropdown-toggle' role='button' data-bs-toggle='dropdown' aria-expanded='false'>Patient</a>
                    <ul class='dropdown-menu'>
                        <li><a class='dropdown-item' href='router.php?action=monCompte'>Mon Compte</a></li>
                        <li><a class='dropdown-item' href='router.php?action=listeMesRdv'>Liste de mes rendez vous</a></li>
                        <li><a class='dropdown-item' href='router.php?action=choisirPraticien'>Prendre rendez vous avec un praticien</a></li>
                        
                    </ul>
                </li>");  
                        
                }
                
               
            
                   
                   
                   ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Innovations</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="router.php?action=vinReadAll">Liste des spécialités</a></li>
                        <li><a class="dropdown-item" href="router.php?action=vinReadId">Sélection d'ubne spécialité par son id</a></li>
                        <li><a class="dropdown-item" href="router.php?action=vinCreate">Insertion d'une nouvelle spécialité</a></li> 
                        <li><hr></li> 
                        <li><a class="dropdown-item" href="router.php?action=vinCreate">Liste des praticiens avec leur spécialité</a></li> 
                        <li><a class="dropdown-item" href="router.php?action=vinCreate">Nombre de praticiens par patient</a></li> 
                        <li><hr></li>
                        <li><a class="dropdown-item" href="router.php?action=vinCreate">Info</a></li> 
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Se Connecter</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="router.php?action=readLoginInfos">Login</a></li>
                        <li><a class="dropdown-item" href="router.php?action=readSigninInfos">S'inscrire</a></li>
                        <li><a class="dropdown-item" href="router.php?action=userLogout">Deconnexion</a></li>

                    </ul>
                </li>

            </ul>
        </div>
    </div>
</nav> 

<!-- ----- fin fragmentCaveMenu -->

