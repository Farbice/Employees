<?php

function getEmployees(): array
{
    $db = getConnection();

    // Récupération de tous les employés
    $query = $db->prepare(
        'SELECT emp.employeeNumber, emp.lastName, emp.firstName, emp.email, emp.jobTitle, off.city, man.firstName AS managerFirstName, man.lastName AS managerLastName
        FROM employees emp
        INNER JOIN offices off ON emp.officeCode = off.officeCode
        LEFT JOIN employees man ON emp.reportsTo = man.employeeNumber
        ORDER BY emp.firstName'
    );
    
    $query->execute();
    
    $employees = $query->fetchAll();
    
    return $employees;
}

function getEmployeeById(int $id): array|false
{
    $db = getConnection();

    // Récupération des informations de l'employé à partir du numéro dans l'url (requête SQL)
    $query = $db->prepare(
        'SELECT emp.employeeNumber, emp.extension, emp.lastName, emp.firstName, emp.email, emp.jobTitle, off.city, man.firstName AS managerFirstName, man.lastName AS managerLastName
        FROM employees emp
        INNER JOIN offices off ON emp.officeCode = off.officeCode
        LEFT JOIN employees man ON emp.reportsTo = man.employeeNumber
        WHERE emp.employeeNumber = :employeeNumber'
    );
    
    $query->execute([
        'employeeNumber' => $id
    ]);
    
    $employee = $query->fetch();
    
    return $employee;
}