<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TrouvAnime</title>
    <link rel="stylesheet" href="/assets/style.css">
</head>
<nav class="navbar">
    <a href="/"><img class="logo" src="/assets/logo.svg" alt="logo"></a>
    <div class="navbar-links">
        <a class="navbar-item" href="/bibliotheque">Bibliothèque</a>
        <?php if (isset($_SESSION['connecté'])) { ?>
            <a class="navbar-item" href="/liste">Ma liste</a>
            <a class="navbar-item" href="/deconnexion">Déconnexion</a>
        <?php } else { ?>
            <a class="navbar-item" href="/connexion">Se connecter</a>
            <a class="navbar-item" href="/inscription">Créer un compte</a>
        <?php } ?>
    </div>
    <div class="burger">
        <span></span>
        <span></span>
        <span></span>
</nav>

<body>