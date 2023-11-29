<?php
/****************************************************************************************
 * Description : Page cachée qui permet à un Administrateur de se connecter à son compte
 *
 * Date : 3 octobre 2022
 * Auteurs : Elisabeth Tremblay, Olivier Raymond
 ****************************************************************************************/

if (session_status() == PHP_SESSION_NONE)
    session_start();

?>   
    
<title>Admin</title>
</head>

<body>

<section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card couleur-fond-clair text-fonce" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                        <div class="mb-md-5 mt-md-4 pb-5">

                            <h2 class="fw-bold mb-2">Connexion</h2>

                            <p class="text-fonce mb-5">Administrateur</p>
                            
                            <form action="?action=seConnecterAdmin" method="post" class="form-outline mb-4">
                                <input type="text" id="nom_admin" name="nom_admin"
                                       placeholder="Nom d'utilisateur" class="form-control form-control-lg text-center"><br>
                                <input type="password" name="mot_passe" placeholder="Mot de passe"
                                       class="form-control form-control-lg text-center"><br>
                                <button class="btn btn-outline-light btn-lg px-5 text-fonce contour-fonce" type="submit">Entrer</button>
                                <p><?php include_once "vues/inclusions/fonctions.inc.php";
                                    afficherErreurs($controleur->getMessagesErreur());?>
                                </p>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


</body>
</html>
