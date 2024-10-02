<?php

require_once __DIR__ . '/../Services/Render.php';

class ConnexionController {
    use Render;
    public function homepage() {
        $this->render("dashboard");
    }

    public function homepageFormateur() {
        $this->render("dashboardFormateur");
    }

    public function handleFormSubmission() {
        // if (
        //     !empty($_POST) &&
        //     isset(
        //         $_POST['nom'],
        //         $_POST['prenom'],
        //         $_POST['email'],
        //         $_POST['telephone'],
        //         $_POST['adressePostale']
        //     )
        // ) {
        //     $name = htmlspecialchars($_POST['nom']);
        //     $surname = htmlspecialchars($_POST['prenom']);
        //     $email = htmlspecialchars($_POST['email']);
        //     $phone = htmlspecialchars($_POST['telephone']);
        //     $address = htmlspecialchars($_POST['adressePostale']);

        //     $userRepository = new UtilisateurRepository();
        //     $userRepository->create($name, $surname, $email, $phone, $address);

        header('location:' . HOME_URL . '/connexion');
        // }
    }
}
