<?php
class Database
{

    private static $dbName = 'dbName' ;
    private static $dbHost = 'localhost' ; //other hosts we just use localhost most often
    private static $dbUsername = 'username';
    private static $dbUserPassword = 'password';
     
    private static $cont  = null; //connection object
     
    public function __construct() {
        die('Init function is not allowed');
    }
     
    public static function connect()
    {
       // One connection through whole application
       if ( null == self::$cont )
       {     
        try
        {
          self::$cont =  new PDO( "mysql:host=".self::$dbHost.";"."dbname=".self::$dbName, self::$dbUsername, self::$dbUserPassword); 
        }
        catch(PDOException $e)
        {
          die($e->getMessage()); 
        }
       }
       return self::$cont;
    }
     
    public static function disconnect()
    {
        self::$cont = null;
    }
}
?>