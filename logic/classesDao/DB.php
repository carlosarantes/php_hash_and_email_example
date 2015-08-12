<?php
	 class DB extends PDO{
		 
		 private static $database = "dbdidatico";
		 private static $server = "127.0.0.1";
		 private static $user = "root";
		 private static $password = "";
		 private static $connection;
		 
		 public function DB($server,$user,$password){
		     parent::__construct($server,$user,$password);
		 }
		 
		 public static function getConnection(){
		    if(!isset(self::$connection)){
		      try{
				self::$connection=new DB(
				"mysql:dbname=".self::$database.";".self::$server,self::$user,self::$password);
				}catch(Exception $e){
				   die("Erro ao conectar com a base de dados".$e->getMessage());
				}
			}
			return self::$connection;
		 }
	 
	 }
?>