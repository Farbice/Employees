<?php

function getOrders(): array
{
    $db = getConnection();

    // Récupération de tous les orders
    $query = $db->prepare(
        'SELECT ord.orderNumber, ord.orderDate, ord.status, ord.customerNumber, cust.customerName
        FROM orders ord
        INNER JOIN customers cust ON ord.customerNumber = cust.customerNumber
        ORDER BY ord.orderNumber'
    );
    
    $query->execute();
    
    $orders = $query->fetchAll();
    
    return $orders;
}




/* Récupération du détail d'une commande selon son id
*
*   @param int $orderId : id de la commande
*   @return array : retourne les produits correspondants à cette commande
*/

function getOrder(int $orderId): array|false
{
    $db = getConnection();
    
    
    
    // Récupération de l'order
    $query = $db->prepare(
        'SELECT orddet.orderNumber, orddet.productCode, prdct.productName, orddet.quantityOrdered, orddet.priceEach, (orddet.quantityOrdered * orddet.priceEach) AS subTotal
        FROM orderdetails orddet
        INNER JOIN products prdct ON orddet.productCode = prdct.productCode
        WHERE orddet.orderNumber = :orderId
        ORDER BY orddet.orderNumber'
    );
    
    $query->bindParam(':orderId', $orderId, PDO::PARAM_STR);
    
    $query->execute();
    
    $order = $query->fetchAll();
    
    return $order;
}




/* Récupération du prix total d'une commande selon son id
*
*   @param int $orderId : id de la commande
*   @return float : retourne la somme des sous-totaux de chaque produit
*/

function getTotal(int $orderId): float
{
    $db = getConnection();
    
    $query = $db->prepare(
        'SELECT SUM(priceEach * quantityOrdered) AS total
        FROM orderdetails
        WHERE orderNumber = :orderId
        '
    );
    
    $query->execute([
        'orderId' => $orderId
    ]);
    
    $result = $query->fetch();
    return $result['total'];
    
}