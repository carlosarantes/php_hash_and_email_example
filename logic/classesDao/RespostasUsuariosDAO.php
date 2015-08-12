<?php
	require_once 'RespostasUsuarios.php';
    require_once 'DB.php'; 
	
	class RespostasUsuariosDAO{
		private $connection;
		private $tabela = "usuarios_respostas_alternativas";
		
		public function __construct(){
			$this->connection = DB::getConnection();
		}
		
		public function abrir($conec){
			$this->connection = $conec;
		}
		/*----------------------------------------------------------------------------*/
		public function retornaRespostas(){
			$verif = $this->connection->prepare("SELECT *FROM ".$this->tabela."");
			$verif->execute();
			
			$todasRespostas = array();
			while ($con = $verif->fetch(PDO::FETCH_ASSOC)) {
				
				 $res = new RespostasUsuarios();
				 
				 $res->usuario = $con['usuario'];
				 $res->nome = $con['nome'];
				 $res->questao = $con['questao'];
				 $res->subquestao = $con['subquestao'];
				 $res->descricao_questao = $con['descricao_questao'];
				 $res->alternativa = $con['alternativa'];
				 $res->resposta_descricao = $con['resposta_descricao'];
				 $res->data_resposta = $con['data_resposta'];
			
				 $todasRespostas[] = $res;
            }
			return $todasRespostas;
		}
		/*-----------------------------------------------------------------------------*/
		public function retornaRespostasPorUsuario($id){
			$verif = $this->connection->prepare("SELECT *FROM ".$this->tabela." WHERE usuario = ? ORDER BY questao");
			$verif->bindValue(1,$id);
			$verif->execute();
			
			$respostas = array();
			while ($con = $verif->fetch(PDO::FETCH_ASSOC)) {
				
				 $res = new RespostasUsuarios();
				 
				 $res->usuario = $con['usuario'];
				 $res->nome = $con['nome'];
				 $res->questao = $con['questao'];
				 $res->subquestao = $con['subquestao'];
				 $res->descricao_questao = $con['descricao_questao'];
				 $res->alternativa = $con['alternativa'];
				 $res->resposta_descricao = $con['resposta_descricao'];
				 $res->data_resposta = $con['data_resposta'];
			
				 $respostas[] = $res;
            }
			return $respostas;
		}
	}
?>