<?php
  class RespostasUsuarios{
	  
	 	private $usuario; 	
	 	private $nome;
	 	private $questao; 	
	 	private $subquestao; 	
	 	private $descricao_questao; 	
	 	private $alternativa; 	
	 	private $resposta_descricao; 	
	 	private $data_resposta; 
		
		 public function __construct(){
		 }
		 
		 public function __get($nome){
		     return $this->$nome;
		 }
	    
		 public function __set($nome,$valor){
		     $this->$nome = $valor;
		 }  
  }
?>