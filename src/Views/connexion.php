<?php

require_once __DIR__ . "/../Includes/header.php";

?>

<div class="d-flex justify-content-center">
    <div class="carregris">
        <h1>Connexion</h1>

        <form method="POST">
            <div class="mb-3">
                <label for="inputEmail" class="form-label">E-mail</label>
                <input type="email" class="form-control" id="inputEmail" name="email">
            </div>
            <div class="mb-3">
                <label for="inputMdp" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" id="inputMdp" name="mdp">
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary" name="envoi">Connexion</button>
            </div>
        </form>
    </div>
</div>

<?php

require_once __DIR__ . "/../Includes/footer.php";
