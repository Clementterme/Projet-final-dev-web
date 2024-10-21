<?php

require_once __DIR__ . '/../Services/Render.php';

class ConnexionController {
    use Render;
    public function homepage() {
        $this->render("connexion");
    }

    public function homepageInscription() {
        $this->render("inscription");
    }

    public function connexion() {

        $bdd = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8;", DB_USER, DB_PWD);

        if (isset($_POST["envoi"])) {
            if (!empty($_POST["email"]) && !empty($_POST["mdp"])) {
                $email = htmlspecialchars($_POST['email']);
                $mdp = htmlspecialchars($_POST['mdp']);
                // $mdpsafe = password_verify($mdp);

                $selectUser = $bdd->prepare("SELECT * FROM utilisateur WHERE email = ? AND mdp = ?");
                $selectUser->execute(array($email, $mdp));

                if ($selectUser->rowCount() > 0) {
                    $_SESSION["email"] = $email;
                    $_SESSION["mdp"] = $mdp;

                    // Récupère les données de l'utilisateur qui se connecte pour les stocker dans la variable $_SESSION
                    $utilisateur = $selectUser->fetch();

                    $_SESSION["role"] = $utilisateur["id_1"];
                    $_SESSION["id"] = $utilisateur["id"];

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


    public function inscription() {

        $bdd = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8;", DB_USER, DB_PWD);

        if (isset($_POST["envoi"])) {
            if (!empty($_POST["email"]) && !empty($_POST["mdp"]) && !empty($_POST["mdp2"])) {
                if ($_POST["mdp"] == ($_POST["mdp2"])) {
                    $email = htmlspecialchars($_POST['email']);
                    // $mdp = htmlspecialchars($_POST['mdp']);
                    $mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
                    $insertUser = $bdd->prepare("INSERT INTO utilisateur(email, mdp) VALUES(?, ?)");
                    $insertUser->execute(array($email, $mdp));


                    // Récupérer l'utilisateur pour le connecter après son inscription
                    $selectUser = $bdd->prepare("SELECT * FROM utilisateur WHERE email = ? AND mdp = ?");
                    $selectUser->execute(array($email, $mdp));
                    if ($selectUser->rowCount() > 0) {
                        $_SESSION["email"] = $email;
                        $_SESSION["mdp"] = $mdp;

                        $utilisateur = $selectUser->fetch();

                        $_SESSION["role"] = $utilisateur["id_1"];
                        $_SESSION["id"] = $utilisateur["id"];

                        $_SESSION['connecté'] = TRUE;
                    }

                    header("location: " . HOME_URL);
                } else {
                    echo "Les deux mots de passe ne correspondent pas.";
                }
            } else {
                echo "Veuillez remplir tous les champs.";
            }
        }
        $this->render("inscription");
    }
}
