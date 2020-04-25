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

function insertPayment($deudor, $cuota, $cuota_capital, $fecha_pago) {
    // 1. abro la conexión con MySQL 
    $db = new PDO('mysql:host=localhost;'.'dbname=registro_deudas;charset=utf8', 'root', '');

    // 2. enviamos la consulta
   $sentencia = $db->prepare("INSERT INTO pagos(deudor, cuota, cuota_capital, fecha_pago) VALUES(?, ?, ?, ?)"); // prepara la consulta
   $sentencia->execute([$deudor, $cuota, $cuota_capital, $fecha_pago]); // ejecuta

}

function isUnique($deudor, $cuota){

    // 1. abro la conexiÃ³n con MySQL 
    $db = new PDO('mysql:host=localhost;'.'dbname=registro_deudas;charset=utf8', 'root', '');

    // 2. enviamos la consulta (3 pasos)
    $sentencia = $db->prepare("SELECT * FROM pagos WHERE cuota = " . $cuota . " AND  deudor = '" . $deudor . "'"); // prepara la consulta
    $sentencia->execute(); // ejecuta
    $consulta = $sentencia->fetchAll(PDO::FETCH_OBJ); // obtiene la respuesta
    return empty($consulta); // Si no existía níngun registro así, la consulta está vacía. Empty() Devuelve V/F
       
}