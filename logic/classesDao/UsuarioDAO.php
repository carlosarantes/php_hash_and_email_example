<?php 
    require_once '../connection/DB.php';
	require_once '../classes/Usuario.php';
	
	class UsuarioDAO{
		private $connection;
		private $tabela = "usuarios";
		
		public function __construct(){
			$this->connection = DB::getConnection();
		}
		
		public function inserir($usuario){
			$com = $this->connection->prepare("
				INSERT INTO ".$this->tabela." (usuario,nome,email,senha,situacao)values(?,?,?,?,?);
			");

			$com->bindValue(1,$usuario->usuario);
			$com->bindValue(2,$usuario->nome);
			$com->bindValue(3,$usuario->email);
			$com->bindValue(4,$usuario->senha);
			$com->bindValue(5,$usuario->situacao);
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
		public function verificaID($usuario){
			$varRet = FALSE;
			$verif = $this->connection->prepare("SELECT *FROM ".$this->tabela." WHERE usuario=?");
			$verif->bindValue(1,$usuario);
			$verif->execute();
			
			while ($verif->fetch(PDO::FETCH_ASSOC)) {
                 $varRet=TRUE;
            }
			return $varRet;
		}  
		/*---------------------------------------------------------------------------
		-----------------------------------------------------------------------------
		-----------------------------------------------------------------------------*/
		public function verificaEmail($email){
			$verifEmail = FALSE;
			$verif = $this->connection->prepare("SELECT *FROM ".$this->tabela." WHERE email = ?");
			$verif->bindValue(1,$email);
			$verif->execute();
			
			while ($verif->fetch(PDO::FETCH_ASSOC)){
                 $verifEmail=TRUE;
         }
			return $verifEmail;
		}
		
		public function retornaIdEmail($email){
		   $usuario = 0;
			$verif = $this->connection->prepare("SELECT *FROM ".$this->tabela." WHERE email = ?");
			$verif->bindValue(1,$email);
			$verif->execute();
			
			while ($linha = $verif->fetch(PDO::FETCH_ASSOC)){
			   $usuario = $linha['usuario'];
			}
			
			return $usuario;
		}
		
		public function validaAcesso($email, $senha){
		      //$logado = FALSE;
			  $usuario = NULL;
		      $verif = $this->connection->prepare("SELECT *FROM ".$this->tabela." WHERE email = ? AND senha = ?");
			  $verif->bindValue(1,$email);
			  $verif->bindValue(2,$senha);
			  $verif->execute();
			  
			  while ($stmt = $verif->fetch(PDO::FETCH_ASSOC)){
				  $usuario = new Usuario();
			      //$logado = TRUE;
				  $usuario->usuario = $stmt['usuario'];
				  $usuario->nome = $stmt['nome'];
				  $usuario->situacao = $stmt['situacao'];
			  }
			return $usuario;
		}
		
		public function alteraSituacao($usuario, $situacao){

		      $verif = $this->connection->prepare("UPDATE ".$this->tabela." SET situacao = ? WHERE usuario = ?");
			  $verif->bindValue(1,$situacao);
			  $verif->bindValue(2,$usuario);
			  $verif->execute();
		}
}
?>