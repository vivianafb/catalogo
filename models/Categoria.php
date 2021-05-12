<?php

class Categoria {

    public $db;
 
     public function __construct(){
        $this->db =  Conexion::ConectarDB();
     }
     
     public function registrarCategoria($nombre){
         $sql = "INSERT INTO categorias(nombre) VALUES (:nombre)";
         $result = $this->db->prepare($sql);
         $result->bindParam('nombre',$nombre, PDO::PARAM_STR, 12 );    
         if($result->execute()){
            $json = $result->fetch(PDO::FETCH_ASSOC);
            return true;
            echo json_encode($json);  
         }else{
            return false;
         }
     }

     public function modificarCategoria($id){
      $sql = "UPDATE categorias SET nombre=:nombre WHERE id = $id";
      $result = $this->db->prepare($sql);
      $result->bindParam(':nombre',$nombre, PDO::PARAM_STR, 12 );    
      if($result->execute()){
         $json = $result->fetch(PDO::FETCH_ASSOC);
         return true;
         echo json_encode($json);  
      }else{
         return false;
      }
  }

      public function buscarCategorias($id) {
         $sql = $this->db->prepare("SELECT * FROM categorias WHERE id = $id ");
         $sql->execute();
         $result=$sql->fetch(PDO::FETCH_ASSOC);
         if($result){
            echo json_encode($result);
            return true;
         }
      }

     public function getCategorias() {
        $sql = $this->db->prepare("SELECT * FROM categorias");
        $sql->execute();
        $result=$sql->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($result);
        
     }

     
     


}



?>