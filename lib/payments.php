<?php

    echo('
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Tabla de Pagos</title>
            <base href="' . '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/' . '">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        </head>
        <body>'); 
    

    require_once 'db.php';

    /*
    Aquí se verá la lista de pagos
    */
    function showPayments(){

        echo ("<div class='pagos'>");
        echo("<h1>Todos los pagos</h1>");

        $payments = getPayments();

        // arma la tabla con la información de la base de datos
        echo "<table class='table' style='width:450px'";
        echo "<tr><th scope='col'>Deudor</th><th scope='col'>Cuota</th><th scope='col'>Monto</th><th scope='col'>Fecha de Pago</th></tr>";

        foreach ($payments as $payment) {
            echo "<tr><td>" . $payment->deudor . "</td><td>" . $payment->cuota ."</td><td>" . $payment->cuota_capital . "</td><td>" . $payment->fecha_pago . "</td></tr>";
        }
        echo("</table>");
        echo("</div>");

        echo('<form action="nuevo" method="post" class="my-4">
        <div class="row">
            <div class="col-9">
                <div class="form-group">
                    <label>Deudor</label>
                    <input name="deudor" type="text" class="form-control">
                </div>
            </div>

            <div class="col-3">
                <div class="form-group">
                    <label>Cuota</label>
                    <select name="cuota" class="form-control">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>     
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            
            <div class="col-6">
                <div class="form-group">
                    <label>Monto</label>
                    <input name="monto" type="number" class="form-control">
                </div>
            </div>

            <div class="col-6">
                <div class="form-group">
                    <label>Fecha de pago</label>
                    <input name="fecha_pago" type="text" class="form-control">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>');
    }
    //Pago agregado desde script
    function addPayment($deudor, $cuota, $cuota_capital, $fecha_pago){

        // inserta en la DB y redirige
        insertPayment($deudor, $cuota, $cuota_capital, $fecha_pago);
        header('Location: ' . BASE_URL . "verpagos");
    }

    //Pago agregado desde el formulario
    function newPayment(){
        // toma los valores enviados por el usuario
        $deudor = $_POST['deudor'];
        $cuota = $_POST['cuota'];
        $monto = $_POST['monto'];
        $fechaPago = $_POST['fecha_pago'];

        // verifica los datos obligatorios
        if (!empty($deudor) && !empty($cuota) && !empty($monto) && !empty($fechaPago)) {

            // inserta en la DB y redirige
            insertPayment($deudor, $cuota, $monto, $fechaPago);
            header('Location: ' . BASE_URL . "verpagos");
        } else {
            echo "<h2>ERROR! Faltan datos obligatorios</h2>";
        }


    }

?>
    
</body>
</html>

