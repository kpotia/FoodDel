<?php
session_start();

'INSERT INTO order(customerID, city, area 
,location) VALUES(1,"ACCRA","HEART AVENUE KOKOMLEMLE")'
$orderID = 2;
foreach ($_SESSION["cart"] as $item) {
 	var_dump($item);
 	printf("INSERT INTO orderDetails(orderID,prod_id,qty,subTot) Values(
 	'".$orderID."',
 	'".$item['prod_id']."',
 	'".$item['quantity']."',
 	'".($item['quantity']*$item['prod_price'])."') <br><br>");
                
            }


?>