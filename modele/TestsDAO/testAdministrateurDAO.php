<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/testsUnitaires.css">
    <title>TestChercherAdministrateur</title>
<?php
include_once "../DAO/administrateurDAO.class.php";
include_once "../administrateur.class.php";

?>

</head>
<body>
<table>
    <caption>Tests unitaires de la classe AdministrateurDAO</caption>
    <tr>
        <th>fonction appelée</th>
        <th>résultat</th>
    </tr>
    <tr>
        <td>Chercher</td>
        <td><?php echo AdministrateurDAO::chercher(3000); ?></td>
    </tr>
    <tr>
        <td>chercherAvecFiltre</td>
        <td><?php
            $liste = AdministrateurDAO::chercherAvecFiltre("WHERE idAdministrateur = 3000");
            foreach ($liste as $item){
                echo "<p>". $item . "</p>";
            }?>
        </td>
    </tr>
    <tr>
        <td>chercherTous</td>
        <td><?php
            $liste = AdministrateurDAO::chercherTous();
            foreach ($liste as $item){
                echo "<p>". $item . "</p>";
            }?>
        </td>
    </tr>
    <?php
    $nouveauAdministrateur = new Administrateur(0, "James", "Gilles-Bob","alloMaman");
    ?>
    <tr>
        <td>inserer</td>
        <td><?php
            AdministrateurDAO::inserer($nouveauAdministrateur);
            echo "insertion";
            ?>
        </td>
    </tr>
    <tr>
        <td>modifier</td>
        <td><?php
            $nouveauAdministrateur = new Administrateur(3008, "James", "Gilles-Peter","alloMaman");
            AdministrateurDAO::modifier($nouveauAdministrateur);
            echo "Modifier";
            ?>
        </td>
    </tr>
    <tr>
        <td>supprimer</td>
        <td><?php
            $nouveauAdministrateur = new Administrateur(3008, "James", "Gilles-Peter","alloMaman");
            AdministrateurDAO::supprimer($nouveauAdministrateur);
            echo "Suppression";
            ?>
        </td>
    </tr>
</table>

</body>
</html>