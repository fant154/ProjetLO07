
<!-- ----- début fragmentCaveMenu -->

<nav class="navbar navbar-expand-lg bg-success fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="router.php?action=viewAccueil">SCHMITT BESNARD <?php
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

