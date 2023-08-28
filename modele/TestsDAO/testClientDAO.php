<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/testsUnitaires.css">
    <title>TestChercherClient</title>
</head>

<body>
    <?php
        include_once "../DAO/ClientDAO.class.php";
        include_once "../client.class.php";

    ?>


    <table>
        <caption>Tests unitaires de la classe ClientDAO</caption>
        <thead>
        <tr>
            <th>fonction appelée</th>
            <th>résultat</th>
        </tr>

        </thead>
        <tr>
            <th>Chercher</th>
            <td><?php echo ClientDAO::chercher(1000); ?></td>
        </tr>
        <tr>
            <th>chercherAvecFiltre</th>
            <td><?php
                $liste = ClientDAO::chercherAvecFiltre("WHERE idClient = 1000");
                foreach ($liste as $item){
                    echo "<p>". $item . "</p>";
                }?>
            </td>
        </tr>
        <tr>
            <th>chercherTous</th>
            <td><?php
                $liste = ClientDAO::chercherTous();
                foreach ($liste as $item){
                    echo "<p>". $item . "</p>";
                }?>
            </td>
        </tr>
        <?php
            $nouveauClient = new Client(0, "James", "Gilles-Bob","paf@aouch.slip","1231, rue du Désespoir", "1234","1975-03-03", "gbj","alloMaman");
        ?>
        <tr>
            <th>inserer</th>
            <td><?php
                ClientDAO::inserer($nouveauClient);
                echo "insertion";
                ?>
            </td>
        </tr>
        <tr>
            <th>modifier</th>
            <td><?php
                $nouveauClient = new Client(1001, "James", "Gilles-Peter","paf@aouch.slip","1231, rue du Désespoir", "1234","1975-03-03", "gpj", "alloMaman");
                ClientDAO::modifier($nouveauClient);
                echo "Modifier";
                ?>
            </td>
        </tr>
        <tr>
            <th>supprimer</th>
            <td><?php
               $nouveauClient = new Client(1001, "James", "Gilles-Peter","paf@aouch.slip","1231, rue du Désespoir", "1234","1975-03-03", "gpj","alloMaman");
                ClientDAO::supprimer($nouveauClient);
                echo "Suppression";
                ?>
            </td>
        </tr>
        <tr>
            <th>
                login
            </th>
            <td>
                <?php
                $nom_utilisateur = "jgg";
                $mot_passe = "password1234";
                $loginTest = ClientDAO::chercherAvecFiltre("WHERE username='jgg' AND mdPasse='password1234'");
                foreach ($loginTest as $item){
                    echo "<p>". $item->getUsername(). " " . $item->getMdPasse() . "</p>";
                }?>
            </td>
        </tr>
    </table>



    </body>
</html>