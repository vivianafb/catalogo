<?php
    require_once("db/Conexion.php");
    require_once("models/Cliente.php");
    include('./routes/Route.php');

    Route::add('/validar.php', function(){
        $cliente = new Cliente();

        $correo="edu@gmail.com";
        $clave="123456";
        if($cliente->ValidarCliente($correo,$clave)){
            echo"cliente encontrado";
        }else{
            echo "no encontrado";
        }
    });
 
    Route::run("/");
    if($_SERVER['REQUEST_URI']== '/clientes.php'){
        
    }
?>