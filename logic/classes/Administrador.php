<?php 
    
   class Administrador {
	
	     private $administrador;
		 private $nome;
		 private $email;
		 private $senha;
		 private $situacao;
		 
		 public function __construct(){
		 }
		 
		 public function __get($nome){
		     return $this->$nome;
		 }
	    
		 public function __set($nome,$valor){
		     $this->$nome = $valor;
		 }
		 
		 public function __toString(){
		    return $this->nome.", ".$this->email;
		 }
	}
	
?>