<?php

class Cliente {

    public $db;
 
     public function __construct(){
        $this->db =  Conexion::ConectarDB();
     }
     
     public function registrarClientes( $nombre,$correo,$clave){
         $sql = "INSERT INTO clientes(nombre,correo,clave) VALUES (:nombre,:correo,:clave)";
         $result = $this->db->prepare($sql);
         $result->bindParam('nombre',$nombre, PDO::PARAM_STR, 12 );
         $result->bindParam ('correo',$correo, PDO::PARAM_STR, 12);
         $clave_hash=password_hash($clave,PASSWORD_DEFAULT);
         $result->bindParam ('clave',$clave_hash,PDO::PARAM_STR, 255);
         //$result->bindParam('clave',$clave);
         if($result->execute()){
            $json = $result->fetch(PDO::FETCH_ASSOC);
            return true;
            echo json_encode($json);
            
         }else{
            return false;
         }
     }

     public function ValidarCliente($correo,$clave){
      $sql = "SELECT * FROM clientes WHERE correo = :correo";
      $result = $this->db->prepare($sql);
      $result->bindParam('correo',$correo);
      $result->execute();
      $fila = $result->fetch(PDO::FETCH_ASSOC);
      if(password_verify($clave,$fila["clave"])){
         return true;
      }
      return false;
   }

     public function getClientes() {
        $sql = $this->db->prepare("select * from clientes");
        $sql->execute();
        $result=$sql->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($result);
        
     }

     


}



?>