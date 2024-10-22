<?php

require_once __DIR__ . "/../Includes/header.php";

?>

<div>
    <div>
        <h1>Inscription</h1>

        <form class="formulaire" method="POST">
            <div class="champForm">
                <label for="inputEmail">E-mail</label>
                <input class="champ" type="email" id="inputEmail" name="email">
            </div>
            <div class="champForm">
                <label for="inputMdp">Mot de passe</label>
                <input class="champ" type="password" id="inputMdp" name="mdp">
            </div>
            <div class="champForm">
                <label for="inputMdp">Confirmation du mot de passe</label>
                <input class="champ" type="password" id="inputMdp" name="mdp2">
            </div>
            <div>
                <button type="submit" name="envoi">Inscription</button>
            </div>
        </form>
    </div>
</div>

<?php

require_once __DIR__ . "/../Includes/footer.php";
