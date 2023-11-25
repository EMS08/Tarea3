<?php
class DBGestLib {

     private function getConexion(){
       $servidor = 'db4free.net';
       $dataBase = 'dblibreriafinal';
       $dns = "mysql:host=$servidor;dbname=$dataBase";
       $user = 'ems20220376';
       $password = 'esteban20220376';

        $obPDO = new PDO ($dns, $user, $password);
        return $obPDO;
     }

     public function getLibros(){
        $objBD = $this->getConexion();
        $sql = "SELECT `id_titulo`, `titulo`, `tipo`, `precio`, `notas` FROM titulos order by titulo";
        $consulta = $objBD->query($sql);
        return $consulta;
     }

     public function getAutores(){
        $objBD = $this->getConexion();
        $sql = "SELECT * FROM autores order by nombre";
        $consulta = $objBD->query($sql);
        return $consulta;
     }

     public function getTiendas(){
      $objBD = $this->getConexion();
      $sql = "SELECT * FROM tiendas order by nombre_tienda";
      $consulta = $objBD->query($sql);
      return $consulta;
   }

     public function insertContacto($nombre, $correo, $asunto, $comentario) {
        $objBD = $this->getConexion();
        $sql = "INSERT INTO contacto (nombre, correo, asunto, comentario) VALUES (:nombre, :correo, :asunto, :comentario)";
        $stmt = $objBD->prepare($sql);

        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':correo', $correo);
        $stmt->bindParam(':asunto', $asunto);
        $stmt->bindParam(':comentario', $comentario);

        try {
            $stmt->execute();
            return true; // Si se ejecuta con éxito, devuelve verdadero
        } catch (PDOException $e) {
            return false; // Si hay algún error, devuelve falso
        }
     }

}
?>