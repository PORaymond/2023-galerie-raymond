<?php
if(session_status() == PHP_SESSION_NONE){
    session_start();
}
if (!isset($_SESSION['tableauOeuvre'])){
    $_SESSION['tableauOeuvre'] = array();
}
if (isset($_SESSION['nbOeuvresPanier'])){
    $_SESSION['nbOeuvresPanier']++;
} else {
    $_SESSION['nbOeuvresPanier'] = 1;
}

array_push($_SESSION['tableauOeuvre'], $_POST['id_oeuvre'] );
echo $_SESSION['nbOeuvresPanier'];