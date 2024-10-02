<?php

require_once __DIR__ . '/../Services/Render.php';

class HomeController
{
    use Render;

    public function homepage() {
        require_once __DIR__ . '/../Views/accueil.php';
    }

    public function pageNotFound() {
        require_once __DIR__ . '/../Views/404.php';
    }

    public function quit()
    {
      session_destroy();
      header('location: '.HOME_URL);
      die();
    }
}