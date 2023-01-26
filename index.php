<?php

require 'utils.php';
require 'connection.php';

// Page d'accueil du site

// Affichage : layout + template
// $template = 'index.phtml';
// require 'layout.phtml';

$content = "Découverte du PHP à travers un petit projet d'application de gestion d'entreprise.";

showView('index.phtml', ['content' => $content]);