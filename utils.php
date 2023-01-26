<?php

/*
    Contient les fonctions utilitaires du projet (bibliothèque de fonctions)
*/

function showView(string $viewName, array $data = []): void
{
    // On crée des variables à partir du tableau $data
    extract($data);
    
    $template = $viewName;
    require 'views/layout.phtml';
}