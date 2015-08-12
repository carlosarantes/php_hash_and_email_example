<?php 
    require_once '../connection/DB.php';
	require_once '../classes/Resposta.php';
	
	class RespostaDAO{
		private $connection;
		private $tabela = "respostas_usuario";
		
		public function __construct(){
			$this->connection = DB::getConnection();
		}
		
		public function inserir($resposta){
			$com = $this->connection->prepare("
				INSERT INTO ".$this->tabela." (usuario,questao,subquestao,alternativa,resposta_descricao,data_resposta)values(?,?,?,?,?,?);
			");

			$com->bindValue(1,$resposta->usuario);
			$com->bindValue(2,$resposta->questao);
			$com->bindValue(3,$resposta->subquestao);
			$com->bindValue(4,$resposta->alternativa);
			$com->bindValue(5,$resposta->resposta_descricao);
			$com->bindValue(6,$resposta->data_resposta);
			try{
			    $com->execute();
			}catch(Exception $e){
			    die("Não foi possível inserir na base de dados. ".$e->getMessage());
			}
			//$this->connection=null;
			return $com->errorCode();
		}
		/*---------------------------------------------------------------------------
		-----------------------------------------------------------------------------
		-----------------------------------------------------------------------------*/
		
}
?>