<?php
session_start();
if (isset($_SESSION['tableauOeuvre'])) {

    $_SESSION['total'] -= $_POST['prix'];
    $_SESSION['tableauOeuvre'] = array_diff($_SESSION['tableauOeuvre'], [$_POST['id_oeuvre']]);
    $_SESSION['nbOeuvresPanier']--;
    echo $_SESSION['total'];
}

