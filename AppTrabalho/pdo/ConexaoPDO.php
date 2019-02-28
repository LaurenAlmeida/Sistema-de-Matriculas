<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ConexaoPDO
 *
 * @author laurengoncalves
 */
final class ConexaoPDO {
   
    private static $conn = null;
    
    public function __construct() {}
 
    public static function getInstance(){
        if(self::$conn == null){
            try {
            self::$conn = new PDO('pgsql:dbname=app; user=postgres; password=tsi2016; host=localhost');
            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           // print_r(self::$conn);
            } catch (PDOException $ex) {
                echo $ex->getMessage();
            }
            return self::$conn;
        }
        return self::$conn;
    }
    
    
    public static function close(){
        self::$conn = null;
        echo "\n Recursos liberados.";
    }
}