<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/testsUnitaires.css">
    <title>TestChercherOeuvre</title>
</head>

<body>
<h1>Test pour la classe OeuvreDAO</h1>
<?php
include_once __DIR__."/../DAO/OeuvreDAO.class.php";
include_once __DIR__."/../oeuvre.class.php";
?>
<table>
    <caption>Tests unitaires de la classe OeuvreDAO</caption>
    <thead>
    <tr>
        <th>fonction appelée</th>
        <th>résultat</th>
    </tr>

    </thead>
    <tr>
        <th>Chercher</th>
        <td><?php echo OeuvreDAO::chercher(5000); ?></td>
    </tr>
    <tr>
        <th>chercherAvecFiltre</th>
        <td><?php
            $liste = OeuvreDAO::chercherAvecFiltre("WHERE idOeuvre = 5000");
            foreach ($liste as $item){
                echo "<p>". $item . "</p>";
            }?>
        </td>
    </tr>
    <tr>
        <th>chercherTous</th>
        <td><?php
            $liste = OeuvreDAO::chercherTous();
            foreach ($liste as $item){
                echo "<p>". $item . "</p>";
            }?>
        </td>
    </tr>
    <?php
    $uneOeuvre = new Oeuvre(0, "James","une oeuvre chère à mon coeur", "100", "2022-02-02","patate.jpg","100", "200" );
    ?>
    <tr>
        <th>inserer</th>
        <td><?php
            OeuvreDAO::inserer($uneOeuvre);
            echo "insertion";
            ?>
        </td>
    </tr>
    <tr>
        <th>modifier</th>
        <td><?php
            $uneOeuvre = new Oeuvre("5014", "Bryce","une oeuvre chère à mon coeur", 100, "2022-02-02","patate.jpg",null, 200 );
            $patate = OeuvreDAO::modifier($uneOeuvre);
            if($patate){

                echo "Modifier";
            }
            ?>
        </td>
    </tr>
    <tr>
        <th>supprimer</th>
        <td><?php
            $uneOeuvre = new Oeuvre(5013, "James","une oeuvre chère à mon coeur", 100, "2022-02-02","patate.jpg",null, 200 );
            OeuvreDAO::supprimer($uneOeuvre);
            echo "Suppression";
            ?>
        </td>
    </tr>
</table>

</body>
</html>
