<?php

function getPayments() {

// 1. abro la conexiÃ³n con MySQL 
$db = new PDO('mysql:host=localhost;'.'dbname=registro_deudas;charset=utf8', 'root', '');

// 2. enviamos la consulta (3 pasos)
$sentencia = $db->prepare("SELECT * FROM pagos"); // prepara la consulta
$sentencia->execute(); // ejecuta
$tareas = $sentencia->fetchAll(PDO::FETCH_OBJ); // obtiene la respuesta

return $tareas;
}