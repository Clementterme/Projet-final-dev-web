<?php

require_once __DIR__ . '/../Services/Render.php';

class ConnexionController {
    use Render;
    public function homepage() {
        $this->render("connexion");
    }

    public function homepageFormateur() {
        $this->render("dashboardFormateur");
    }

    public function test() {
        $this->render("test");
    }

    public function handleFormSubmission() {

        $bdd = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8;", DB_USER, DB_PWD);

        if (isset($_POST["envoi"])) {
            if (!empty($_POST["email"]) && !empty($_POST["mdp"])) {
                $email = htmlspecialchars($_POST['email']);
                $mdp = htmlspecialchars($_POST['mdp']);

                $selectUser = $bdd->prepare("SELECT * FROM utilisateur WHERE email = ? AND mdp = ?");
                $selectUser->execute(array($email, $mdp));

                if ($selectUser->rowCount() > 0) {
                    $_SESSION["email"] = $email;
                    $_SESSION["mdp"] = $mdp;

                    $_SESSION["role"] = $selectUser->fetch()["id_1"];

                    $_SESSION['connecté'] = TRUE;

                    if ($_SESSION["role"] == 0) {
                        $_SESSION["role"] = "Utilisateur";
                        header("location: " . HOME_URL);
                        exit();
                    } else if ($_SESSION["role"] == 1) {
                        $_SESSION["role"] = "Administrateur";
                        header("location: " . HOME_URL);
                        exit();
                    }
                } else {
                    echo "Email ou mot de passe incorrect";
                }
            } else {
                echo "Veuillez remplir tous les champs.";
            }
        }

        $this->render("connexion");
    }
}
