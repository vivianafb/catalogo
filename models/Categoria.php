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

     public function getCategorias() {
        $sql = $this->db->prepare("SELECT * FROM categorias");
        $sql->execute();
        $result=$sql->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($result);
        
     }

     


}



?>