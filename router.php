<?php
   require_once'lib/payments.php';

    // definimos la base url de forma dinamica
    define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

    // define una acción por defecto
    if (empty($_GET['action'])) {
        $_GET['action'] = 'verpagos';
    } 

    // toma la acción que viene del usuario y parsea los parámetros
    $accion = $_GET['action']; 
    $parametros = explode('/', $accion);
    //var_dump($parametros); die; // like console.log();

    // decide que camino tomar según TABLA DE RUTEO
    switch ($parametros[0]) {
        case 'verpagos': //Muestra Lista de todos los pagos y el formulario
            showPayments();
        break;

        case 'agregar': // Agrega un pago generado mediante script
            if (count($parametros) == 5){
                addPayment($parametros[1],$parametros[2],$parametros[3],$parametros[4]);
            }
        break;

        case 'nuevo': // Agrega un pago desde el formulario
            newPayment();
        break;

        default: 
            echo "404 not found";
        break;
    }


?>

