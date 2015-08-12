<?php 
    require_once '../connection/DB.php';
	require_once '../classes/Alternativa.php';
	
	class AlternativaDAO{
		private $connection;
		private $tabela = "alternativas";
		
		public function __construct(){
			$this->connection = DB::getConnection();
		}
		
		public function inserir($alternativa){
			$com = $this->connection->prepare("
				INSERT INTO ".$this->tabela." (questao,subquestao,alternativa,descricao_alternativa,data_criacao)values(?,?,?,?,?);
			");

			$com->bindValue(1,$alternativa->questao);
			$com->bindValue(2,$alternativa->subquestao);
			$com->bindValue(3,$alternativa->alternativa);
			$com->bindValue(4,$alternativa->descricao_alternativa);
			$com->bindValue(5,$alternativa->data_criacao);
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
		public function buscardescricao($questao,$subquestao,$alternativa){
			$verif = $this->connection->prepare("SELECT *FROM ".$this->tabela." WHERE questao = ? AND subquestao = ? AND alternativa = ?");
			$verif->bindValue(1,$questao);
			$verif->bindValue(2,$subquestao);
			$verif->bindValue(3,$alternativa);
			$verif->execute();
			$descricao = "";
			while ($linha = $verif->fetch(PDO::FETCH_ASSOC)) {
                 $descricao = $linha['descricao_alternativa'];
            }
			return $descricao;
		}
		
}
?>