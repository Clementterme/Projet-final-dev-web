<?php

require_once __DIR__ . "/../Includes/header.php";

?>

<h1>Erreur 404 : Page introuvable</h1>

<div class="affichage404">
    <img class="image404" src="/assets/404.png" alt="logo">
    <button class="boutonRetourAccueil" onclick="location.href='<?= HOME_URL ?>'">Retourner à l'accueil</button>
</div>


<?php

require_once __DIR__ . "/../Includes/footer.php";
