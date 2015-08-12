<?php 
    require_once '../connection/DB.php';
	require_once '../classes/Questao.php';
	
	class QuestaoDAO{
		private $connection;
		private $tabela = "questoes";
		
		public function __construct(){
			$this->connection = DB::getConnection();
		}
		
		public function inserir($questao){
			$com = $this->connection->prepare("
				INSERT INTO ".$this->tabela." (questao,subquestao,descricao_questao,data_criacao)values(?,?,?,?);
			");

			$com->bindValue(1,$questao->questao);
			$com->bindValue(2,$questao->subquestao);
			$com->bindValue(3,$questao->descricao_questao);
			$com->bindValue(4,$questao->data_criacao);
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