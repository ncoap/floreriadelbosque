<?php

class util {
    public function getConexion(){
        $cnx=new PDO("mysql:host=localhost;dbname=fdelbosque","root","",array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES  \"UTF8\""));
        return $cnx;
    }
}

?>
