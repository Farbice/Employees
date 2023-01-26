<?php

require 'utils.php';

// Connexion à la base de données
require 'connection.php';
require 'models/employee_model.php';

// $db = getConnection();

// // Récupération de tous les employés
// $query = $db->prepare(
//     'SELECT emp.employeeNumber, emp.lastName, emp.firstName, emp.email, emp.jobTitle, off.city, man.firstName AS managerFirstName, man.lastName AS managerLastName
//     FROM employees emp
//     INNER JOIN offices off ON emp.officeCode = off.officeCode
//     LEFT JOIN employees man ON emp.reportsTo = man.employeeNumber
//     ORDER BY emp.firstName'
// );

// $query->execute();

// $employees = $query->fetchAll();

$employees = getEmployees();

// Affichage
// $template = 'employee.phtml';
// require 'layout.phtml';

showView('employee.phtml', ['employees' => $employees]);