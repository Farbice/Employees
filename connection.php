<?php

function getConnection(): PDO
{
    return new PDO(
        'mysql:host=db.3wa.io;dbname=fabricelouis_classicmodels;charset=UTF8',
        'fabricelouis',
        '4324892c41a6e8b6dcfcf4af4784287b', [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,        // Affichage d'erreurs
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC    // Mode de récupération des données
        ]
    );
}