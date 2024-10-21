<?php

// require_once __DIR__.'/Repositories/UsersRepository.php';
require_once __DIR__ . '/Controllers/HomeController.php';
require_once __DIR__ . '/Controllers/ConnexionController.php';
require_once __DIR__ . '/Controllers/BibliothequeController.php';
require_once __DIR__ . '/Controllers/DetailsController.php';

$methode = $_SERVER['REQUEST_METHOD'];

$homeController = new HomeController();
$connexionController = new ConnexionController();
$bibliothequeController = new BibliothequeController();
$detailsController = new DetailsController();
// $simplonController = new SimplonController();

$uri = $_SERVER['REQUEST_URI'];

// Extraire le chemin et les paramètres de l'URL
$parsedUri = parse_url($uri, PHP_URL_PATH);

// Vérifier si l'URI contient le mot "details" suivi d'un paramètre id
if (strpos($parsedUri, HOME_URL . "details") !== false) {
    if ($methode == 'GET') {
        // Extraire l'id depuis les paramètres de l'URL
        $id = isset($_GET['id']) ? intval($_GET['id']) : null;
        if ($id) {
            $detailsController->homepage($id);
        } else {
            $homeController->pageNotFound();
        }
    } else if ($methode == 'POST') {
        header("location: details");
    }
} else {
    switch ($parsedUri) {
        case HOME_URL . "":
            $homeController->homepage();
            break;
        case HOME_URL . "connexion":
            if ($methode == 'GET') {
                if (!isset($_SESSION['connecté'])) {
                    $connexionController->homepage();
                } else {
                    $homeController->pageNotFound();
                }
            } else if ($methode == 'POST') {
                $connexionController->connexion();
            }
            break;
        case HOME_URL . "inscription":
            if ($methode == 'GET') {
                if (!isset($_SESSION['connecté'])) {
                    $connexionController->homepageInscription();
                } else {
                    $homeController->pageNotFound();
                }
            } else if ($methode == 'POST') {
                $connexionController->inscription();
            }
            break;
        case HOME_URL . "bibliotheque":
            $bibliothequeController->homepage();
            break;
        case HOME_URL . "liste":
            if (isset($_SESSION['connecté'])) {
                $bibliothequeController->afficherListe();
            } else {
                $homeController->pageNotFound();
            }
            break;
        case HOME_URL . 'deconnexion':
            $homeController->quit();
            break;
        default:
            $homeController->pageNotFound();
            break;
    }
}
