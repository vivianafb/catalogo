<?php
    require_once("db/Conexion.php");
    require_once("models/Cliente.php");
    include('./routes/Route.php');
    // require_once("controllers/personas_controller.php");
    Route::add('/proyecto-catalogo2/index.php', function(){
        $cliente = new Cliente();
        $cliente->getClientes();
    });

    
    
    
    Route::run("/");
    if($_SERVER['REQUEST_URI']== '/proyecto-catalogo2/clientes.php'){
        
    }
?>
