<?php
    require_once("db/Conexion.php");
    require_once("models/Cliente.php");
    include('./routes/Route.php');

    Route::add('/proyecto-catalogo2/registrar.php', function(){
        $cliente = new Cliente();

        $nombre="Eduardo";
        $correo="edu@gmail.com";
        $clave="123456";

        if($cliente->registrarClientes($nombre,$correo,$clave)){
            echo "registro exitoso";
        }else{
            echo "Error x.x";
        }
    });
    
 
    Route::run("/");
    if($_SERVER['REQUEST_URI']== '/proyecto-catalogo2/clientes.php'){
        
    }
?>