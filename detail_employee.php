<?php

// Récupérer du numéro de l'employé dans l'url
// var_dump($_GET['id']);

// Import de la bibliothèque
require 'utils.php';

// Connexion à la base de données
require 'connection.php';
require 'models/employee_model.php';

$employee = getEmployeeById($_GET['id']);

if ($employee === false) {
    // Affichage d'une page 404
    showView('404.phtml');
    http_response_code(404);
    exit();
}

// $db = getConnection();

// // Récupération des informations de l'employé à partir du numéro dans l'url (requête SQL)
// $query = $db->prepare(
//     'SELECT emp.employeeNumber, emp.extension, emp.lastName, emp.firstName, emp.email, emp.jobTitle, off.city, man.firstName AS managerFirstName, man.lastName AS managerLastName
//     FROM employees emp
//     INNER JOIN offices off ON emp.officeCode = off.officeCode
//     LEFT JOIN employees man ON emp.reportsTo = man.employeeNumber
//     WHERE emp.employeeNumber = :employeeNumber'
// );

// $query->execute([
//     'employeeNumber' => $_GET['id']
// ]);

// $employee = $query->fetch();

// Affichage des informations sur la page
showView('detail_employee.phtml', ['employee' => $employee]);