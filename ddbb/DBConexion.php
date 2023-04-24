<?php
require_once('basededatos.php');

class DBConexion
{
    public static function connection()
    {
        $db = null;
        try {


            // We create an instance of msqli with the params :'server','user','password','database';
            // $connection = new mysqli('localhost', 'root', 'root', 'dwes');
            //  $connection = new mysqli(host, user, pass, dbname, 3306);
            // Call the instance and do a query to set default enconding
            $dsn = 'mysql:host=' . host . ';dbname=' . dbname;
            $db = new PDO($dsn, user, pass);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $db;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $db;
    }


}