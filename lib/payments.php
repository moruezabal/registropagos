<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de Pagos</title>
    <base href="C:\xampp\htdocs\registropagos\">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <?php

    require_once 'db.php';

    /*
    Aquí se verá la lista de pagos
    */
    function showPayments(){
        echo("<h1>Todos los pagos</h1>");

        $payments = getPayments();

        // arma la tabla con la información de la base de datos
        echo "<table class='table' style='width:450px'";
        echo "<tr><th scope='col'>Deudor</th><th scope='col'>Cuota</th><th scope='col'>Monto</th><th scope='col'>Fecha de Pago</th></tr>";

        foreach ($payments as $payment) {
            echo "<tr><td>" . $payment->deudor . "</td><td>" . $payment->cuota ."</td><td>" . $payment->cuota_capital . "</td><td>" . $payment->fecha_pago . "</td></tr>";
        }
        echo("</table>");
    }

    function saludar(){
        echo("Hola Mundo!");
    }

?>
    
</body>
</html>

