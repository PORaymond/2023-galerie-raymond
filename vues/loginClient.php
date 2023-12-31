<?php

if (session_status() != PHP_SESSION_ACTIVE)
    session_start();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>LOGIN</title>
    <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/style_admin.css">
</head>

<body>
<section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-dark text-white" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">

                        <div class="mb-md-5 mt-md-4 pb-5">

                            <h2 class="fw-bold mb-2">Connexion</h2>
                            <p class="text-white-50 mb-5">Compte client</p>
                            <form action="?action=seConnecter" method="post" class="form-outline mb-4">


                                <input type="text" id="nom_utilisateur" name="nom_utilisateur"
                                       placeholder="Nom d'utilisateur" class="form-control form-control-lg text-center" required="required"><br>
                                <input type="password" name="mot_passe" placeholder="Mot de passe"
                                       class="form-control form-control-lg text-center" required="required"><br>

                                <button class="btn btn-outline-light btn-lg px-5" type="submit" href="?action=seConnecter">Entrer</button>
                                <p><?php include_once "vues/inclusions/fonctions.inc.php";
                                afficherErreurs($controleur->getMessagesErreur());?>
                                </p>
                            </form>
                        </div>

                        <div>
                            <p class="mb-0">Nouvel utilisateur? <a href="?action=nouveauClient" class="text-white-50 fw-bold">Créer un
                                    compte</a>
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


</body>
</html>
