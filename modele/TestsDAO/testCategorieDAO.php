
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/testsUnitaires.css">
    <title>TestChercherCategorie</title>
</head>

<body>
    <?php
        include_once "../DAO/categorieDAO.class.php";
        include_once "../categorie.class.php";

    ?>


    <table>
        <caption>Tests unitaires de la classe CategorieDAO</caption>
        <thead>
        <tr>
            <th>fonction appelée</th>
            <th>résultat</th>
        </tr>

        </thead>
        <tr>
            <th>Chercher</th>
            <td><?php echo CategorieDAO::chercher(4000); ?></td>
        </tr>
        <tr>
            <th>chercherAvecFiltre</th>
            <td><?php
                $liste = CategorieDAO::chercherAvecFiltre("WHERE idCategorie = 4000");
                foreach ($liste as $item){
                    echo "<p>". $item . "</p>";
                }?>
            </td>
        </tr>
        <tr>
            <th>chercherTous</th>
            <td><?php
                $liste = CategorieDAO::chercherTous();
                foreach ($liste as $item){
                    echo "<p>". $item . "</p>";
                }?>
            </td>
        </tr>
        <?php
            $nouveauCategorie = new Categorie(0, "James");
        ?>
        <tr>
            <th>inserer</th>
            <td><?php
                CategorieDAO::inserer($nouveauCategorie);
                echo "insertion";
                ?>
            </td>
        </tr>
        <tr>
            <th>modifier</th>
            <td><?php
                $nouveauCategorie = new Categorie(4001, "Bernhart");
                CategorieDAO::modifier($nouveauCategorie);
                echo "Modifier";
                ?>
            </td>
        </tr>
        <tr>
            <th>supprimer</th>
            <td><?php
                $nouveauCategorie = new Categorie(4001, "James");
                CategorieDAO::supprimer($nouveauCategorie);
                echo "Suppression";
                ?>
            </td>
        </tr>
    </table>



    </body>
</html>