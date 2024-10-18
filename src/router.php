<?php

// require_once __DIR__.'/Repositories/UsersRepository.php';
require_once __DIR__ . '/Controllers/HomeController.php';
require_once __DIR__ . '/Controllers/ConnexionController.php';
require_once __DIR__ . '/Controllers/BibliothequeController.php';

$methode = $_SERVER['REQUEST_METHOD'];

$homeController = new HomeController();
$connexionController = new ConnexionController();
$bibliothequeController = new BibliothequeController();
// $simplonController = new SimplonController();

$uri = $_SERVER['REQUEST_URI'];

switch ($uri) {
    case HOME_URL . "":
        $homeController->homepage();
        break;
    case HOME_URL . "connexion":
        if ($methode == 'GET') {
            $connexionController->homepage();
        } else if ($methode == 'POST') {
            $connexionController->handleFormSubmission();
        }
        break;
    case HOME_URL . "bibliotheque":
        if ($methode == 'GET') {
            $bibliothequeController->homepage();
        } else if ($methode == 'POST') {
            header("location: bibliotheque");
        }
        break;
    case HOME_URL . "dashboardFormateur":
        if ($methode == 'GET') {
            $connexionController->homepageFormateur();
        } else if ($methode == 'POST') {
            header("location: dashboardFormateur");
        }
        break;
    case HOME_URL . 'deconnexion':
        $homeController->quit();
        break;
    default:
        $homeController->pageNotFound();
        break;
}
