<?php
     require_once 'DB.php';

     class UsuarioResDAO{
		private $connection;
		private $tabela = "usuarios_respostas";
		
		public function __construct(){
			$this->connection = DB::getConnection();
		}

		public function abrir($conec){
			$this->connection = $conec;
		}
		
		public function listarUsuarios(){
			$verif = $this->connection->prepare("SELECT *FROM ".$this->tabela." ORDER BY nome");
			$verif->execute();
			
			while($com = $verif->fetch(PDO::FETCH_ASSOC)) {
				$dataAux = explode("-", $com['data_resposta']);
				
				$dia = $dataAux[2];
				$mes = $dataAux[1];
				$ano = $dataAux[0];
				
                 echo $com['nome']."  -  ".$dia."/".$mes."/".$ano."<br />";
            }
			$this->connection = NULL;
		}
     }
?> 