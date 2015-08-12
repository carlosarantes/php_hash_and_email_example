<?php

   class Resposta{
	   
		private $usuario;
		private $questao;
	    private $subquestao;
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
		
		public function __toString(){
		    return $questao;
		}
	}
?>