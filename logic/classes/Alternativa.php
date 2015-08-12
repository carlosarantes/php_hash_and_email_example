<?php
   
   class Alternativa{
	    
		 private $questao;
		 private $subquestao;
		 private $alternativa;
		 private $descricao_alternativa;
		 private $data_criacao;
		 
		 public function __construct(){
		 }
		 
		 public function __get($nome){
		     return $this->$nome;
		 }
	    
		 public function __set($nome,$valor){
		     $this->$nome = $valor;
		 }
		 
		 public function __toString(){
		    return $this->questao.". ".$this->subquestao.". ".$this->alternativa."-	".$this->descricao_alternativa;
		 }
	}
?>