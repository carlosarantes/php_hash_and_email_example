<?php
    
     require_once 'DB.php';
	 
     class UsuarioresDAO{
		private $connection;
		private $tabela = "usuarios_respostas";
		
		public function __construct(){
			$this->connection = DB::getConnection();
		}
     }
?> 