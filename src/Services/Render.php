<?php

trait Render
{
    public function render($view, $data = null)
    {
        if (is_array($data) && !empty($data)) {
            extract($data);
        }

        // Inclut le fichier de la vue spécifiée par le paramètre $view
        include_once __DIR__ . '/../Views/' . $view . ".php";
    }
}