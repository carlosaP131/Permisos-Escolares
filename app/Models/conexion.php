<?php
class Conexion{
    static public function conectar(){
        #Paranetros de PDO
        #0.- Indicar que es conexion Mysql
        #1.- Nombre del servidor
        #2.- Nombre de la BD
        #3.- Usuario de la BD
        #4.- Contraseña

        $con = new PDO("pgsql:host=localhost;dbname=PerEs","postgres","root");
        $con->exec("set names utf8");
        return $con;
    }
}
?>
