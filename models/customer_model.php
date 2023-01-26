<?php

function getCustomers(): array
{
    $db = getConnection();

    // Récupération des clients
    $query = $db->prepare(
        'SELECT customerNumber, customerName, phone, addressLine1, city, country, postalCode
        FROM customers
        ORDER BY customerName'
    );
    
    $query->execute();
    
    $customers = $query->fetchAll();
    
    return $customers;
}