<?php
    require_once("db/Conexion.php");
    require_once("models/Cliente.php");
    include('./routes/Route.php');

    Route::add('/proyecto-catalogo2/validar.php', function(){
        $cliente = new Cliente();

        $correo="adadd@gmail.com";

        if($cliente->ValidarCliente($correo)){
            echo"cliente encontrado";
        }else{
            echo "no encontrado";
        }
    });
 
    Route::run("/");
    if($_SERVER['REQUEST_URI']== '/proyecto-catalogo2/clientes.php'){
        
    }
?>