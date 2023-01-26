<?php

require 'utils.php';

// Connexion
require 'connection.php';
require 'models/customer_model.php';

// $db = getConnection();

// // Récupération des clients
// $query = $db->prepare(
//     'SELECT customerNumber, customerName, phone, addressLine1, city, country, postalCode
//     FROM customers
//     ORDER BY customerName'
// );

// $query->execute();

// $customers = $query->fetchAll();

$customers = getCustomers();

// Affichage
// $template = 'customers.phtml';
// require 'layout.phtml';

showView('customers.phtml', ['customers' => $customers]);