<?php

require_once __DIR__ . '/../Services/Render.php';

class DetailsController
{
    use Render;

    public function homepage()
    {
        $this->render("details");
    }


}