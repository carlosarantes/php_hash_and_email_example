<?php
   
   class Questao{
	    
		 private $questao;
		 private $subquestao;
		 private $descricao_questao;
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
		    return $this->questao.". ".$this->subquestao."-	".$this->descricao_questao;
		 }
	}
?>