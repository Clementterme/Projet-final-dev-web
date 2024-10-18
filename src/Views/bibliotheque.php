<?php

require_once __DIR__ . "/../Includes/header.php";

?>

<h1>Trouve l'anime de tes rêves !</h1>

        <div class="cartesAnimes">

            <?php
            // Afficher les animes existantes
            $bdd = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8;", DB_USER, DB_PWD);

            $requete = "SELECT * FROM anime;";
            $resultat = $bdd->query($requete);
            while ($ligne = $resultat->fetch()) {
                echo '
                <div class="carteAnime">
                    <img class="imageAnime" src=' . $ligne['image'] . '>
                    <p class="nomAnime">' . $ligne['nom'] . '</p>
                </div>';
            } ?>

        </div>

            <!-- <td>' . $ligne['synopsis'] . '</td> -->
            <!-- <td class="crudTableau"><a>Voir</a><a>Editer</a><a>Supprimer</a></td> -->
                <!-- <td>' . $ligne['date_sortie'] . '</td> -->

<?php

require_once __DIR__ . "/../Includes/footer.php";