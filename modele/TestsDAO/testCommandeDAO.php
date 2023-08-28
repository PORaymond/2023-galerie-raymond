
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/testsUnitaires.css">
    <title>TestChercherCommande</title>
</head>

<body>
    <?php
        include_once "../DAO/commandeDAO.class.php";
        include_once "../commande.class.php";

    ?>


    <table>
        <caption>Tests unitaires de la classe CommandeDAO</caption>
        <thead>
        <tr>
            <th>fonction appelée</th>
            <th>résultat</th>
        </tr>

        </thead>
        <tr>
            <th>Chercher</th>
            <td><?php echo CommandeDAO::chercher(2000); ?></td>
        </tr>
        <tr>
            <th>chercherAvecFiltre</th>
            <td><?php
                $liste = CommandeDAO::chercherAvecFiltre("WHERE idCommande = 2000");
                foreach ($liste as $item){
                    echo "<p>". $item . "</p>";
                }?>
            </td>
        </tr>
        <tr>
            <th>chercherTous</th>
            <td><?php
                $liste = CommandeDAO::chercherTous();
                foreach ($liste as $item){
                    echo "<p>". $item . "</p>";
                }?>
            </td>
        </tr>
        <?php
            $nouveauCommande = new Commande(0, "2000-12-12",1000);
        ?>
        <tr>
            <th>inserer</th>
            <td><?php
                CommandeDAO::inserer($nouveauCommande);
                echo "insertion";
                ?>
            </td>
        </tr>
        <tr>
            <th>modifier</th>
            <td><?php
                $nouveauCommande = new Commande(2002, "2022-09-29",1000);
                CommandeDAO::modifier($nouveauCommande);
                echo "Modifier";
                ?>
            </td>
        </tr>
        <tr>
            <th>supprimer</th>
            <td><?php
                $nouveauCommande = new Commande(2001, "2022-09-13",1000);
                CommandeDAO::supprimer($nouveauCommande);
                echo "Suppression";
                ?>
            </td>
        </tr>

    </table>



    </body>
</html>