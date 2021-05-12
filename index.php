<?php
    require_once("db/Conexion.php");
    require_once("models/Cliente.php");
    require_once("models/Categoria.php");

    include('./routes/Route.php');
    ;
    Route::add('/', function() {
        echo "<a href='index.php'>Ir a /inicio</a>";
        echo '<form action="/cliente/registrar.php" method="post">
       <label for="id">Nombre</label>
       <input type="text" name="id" id="id">
       <button type="submit">Registrar</button>
        </form>';
    });

    Route::add('/index.php', function(){
        $cliente = new Cliente();
        $cliente->getClientes();
    });

    Route::add('/cliente', function(){
        echo 'hola';
    },'get');

    Route::add('/cliente/registrar.php', function(){
        $cliente = new Cliente();
        $nombre="Eduardo";
        $correo="edu@gmail.com";
        $clave="123456";

        if($cliente->registrarClientes($nombre,$correo,$clave)){
            echo "registro exitoso";
        }else{
            echo "Error x.x";
        }

       
    },'post');
    
    Route::run("/");
  
?>
