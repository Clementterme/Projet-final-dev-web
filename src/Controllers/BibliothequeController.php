<?php

require_once __DIR__ . '/../Services/Render.php';

class BibliothequeController
{
    use Render;

    public function homepage()
    {
        $this->render("bibliotheque");
    }


}