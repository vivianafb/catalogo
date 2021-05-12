<?php
    require_once("db/Conexion.php");
    require_once("models/Cliente.php");
    require_once("models/Categoria.php");
    require_once("models/Producto.php");
    require_once("models/EmpresaCliente.php");

    include('./routes/Route.php');
    ;
    Route::add('/', function() {
        echo "<a href='index.php'>Ir a /inicio</a>";
        echo '<form action="/categoria/modificar.php" method="post">
       <label for="id">Id</label>
       <input type="text" name="id">
       <button type="submit">Registrar</button>
        </form>';
    });

    Route::add('/index.php', function(){
        $empresaCliente = new EmpresaCliente();
        $empresaCliente->getEmpresa();
    });

    Route::add('/cliente', function(){},'get');

    Route::add('/cliente/registrar.php', function(){
        $cliente = new Cliente();
        $nombre="Eduardo";
        $correo="edu@gmail.com";
        $clave="123456";

        if($cliente->registrarClientes($nombre,$correo,$clave)){
            echo "Registro cliente exitoso";
        }else{
            echo "Error al registrar cliente x.x";
        }
    },'post');

    Route::add('/cliente/validar.php', function(){
        $cliente = new Cliente();

        $correo="edu@gmail.com";
        $clave="123456";
        if($cliente->ValidarCliente($correo,$clave)){
            echo"Cliente encontrado!";
        }else{
            echo "Cliente no encontrado";
        }
    });

    Route::add('/empresa_cliente/registrar.php', function(){
        $empresaCliente = new EmpresaCliente();
        $nombre="Eduardo";
        $correo="edu@gmail.com";
        $descripcion="adkadjadkajdadadadadadd";
        $clave="123456";

        if($empresaCliente->registrarEmpresa($nombre,$correo,$descripcion,$clave)){
            echo "Registro empresaa exitoso";
        }else{
            echo "Error al registrar empresa x.x";
        }
    },'post');

    Route::add('/empresa_cliente/validar.php', function(){
        $empresaCliente = new EmpresaCliente();

        $correo="edu@gmail.com";
        $clave="123456";
        if($empresaCliente->ValidarEmpresa($correo,$clave)){
            echo"Empresa encontrada!";
        }else{
            echo "Empresa no encontrada";
        }
    });

    Route::add('/categoria/registrar.php', function(){
        $categoria = new Categoria();
        $nombre="Mascotas";

        if($categoria->registrarCategoria($nombre)){
            echo "Registro categoria exitoso";
        }else{
            echo "Error al registrar categoria x.x";
        }
    },'post');

    Route::add('/categoria/listar.php', function(){
        $categoria = new Categoria();
        $categoria->getCategorias();
    });

    Route::add('/categoria/modificar.php', function(){
        $categoria = new Categoria();
        $id=$_GET['id'];

        if($categoria->modificarCategoria($id)){
            echo "Modificar categoria exitoso";
        }else{
            echo "Error al mod categoria x.x";
        }
    },'post');

    Route::add('/categoria/buscar.php', function(){
        $categoria = new Categoria();
        $id="3";

        if($categoria->buscarCategorias($id)){
            echo "Categoria encontrada";
        }else{
            echo "No se encontró la categoria x.x";
        }
    });

    Route::add('/producto/registrar.php', function(){
        $producto = new Producto();
        $nombre="Pizza";
        $precio="1000";
        $stock="1";
        $categoria_id="2";

        if($producto->registrarProducto($nombre,$precio,$stock,$categoria_id)){
            echo "Registro producto exitoso";
        }else{
            echo "Error al registrar producto x.x";
        }
    },'post');

    Route::add('/producto/listar.php', function(){
        $producto = new Producto();
        $producto->getProducto();
    });
    
    Route::add('/producto/modificar.php', function(){
        $producto = new Producto();
        $id=$_POST['id'];

        if($producto->modificarProducto($id)){
            echo "Modificar producto exitoso";
        }else{
            echo "Error al mod producto x.x";
        }
    },'post');

    Route::add('/producto/buscar.php', function(){
        $producto = new Producto();
        $id="1";

        if($producto->buscarProductos($id)){
            echo "Producto encontrado";
        }else{
            echo "No se encontró el producto x.x";
        }
    });


    Route::run("/");
  
?>
