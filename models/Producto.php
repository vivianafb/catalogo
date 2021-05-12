<?php

class Producto {

    public $db;
 
     public function __construct(){
        $this->db =  Conexion::ConectarDB();
     }
     
     public function registrarProducto($nombre,$precio,$stock,$categoria_id){
         $sql = "INSERT INTO productos(nombre,precio,stock,categoria_id) VALUES (:nombre,:precio,:stock,:categoria_id)";
         $result = $this->db->prepare($sql);
         $result->bindParam('nombre',$nombre, PDO::PARAM_STR, 250);   
         $result->bindParam('precio',$precio, PDO::PARAM_INT );   
         $result->bindParam('stock',$stock, PDO::PARAM_INT);   
         $result->bindParam('categoria_id',$categoria_id, PDO::PARAM_INT );    
         if($result->execute()){
            $json = $result->fetch(PDO::FETCH_ASSOC);
            return true;
            echo json_encode($json);  
         }else{
            return false;
         }
     }

     public function modificarProducto($id){
      $sql = "UPDATE productos SET nombre=:nombre, precio=:precio,stock=:stock,categorias_id=:categorias_id WHERE id = $id";
      $result = $this->db->prepare($sql);
      $result->bindParam(':nombre',$nombre, PDO::PARAM_STR, 250);   
      $result->bindParam(':precio',$precio, PDO::PARAM_INT );   
      $result->bindParam(':stock',$stock, PDO::PARAM_INT);   
      $result->bindParam(':categoria_id',$categoria_id, PDO::PARAM_INT );    
      if($result->execute()){
         $json = $result->fetch(PDO::FETCH_ASSOC);
         return true;
         echo json_encode($json);  
      }else{
         return false;
      }
  }

      public function buscarProductos($id) {
         $sql = $this->db->prepare("SELECT * FROM productos WHERE id = $id ");
         $sql->execute();
         $result=$sql->fetch(PDO::FETCH_ASSOC);
         if($result){
            echo json_encode($result);
            return true;
         }
      }

     public function getProducto() {
        $sql = $this->db->prepare("SELECT * FROM productos");
        $sql->execute();
        $result=$sql->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($result);
        
     }

     
     


}



?>