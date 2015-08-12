<?php
    require_once '../connection/DB.php';
	require_once '../classes/Administrador.php';
	
	class AdministradorDAO{
		private $connection;
		private $tabela = "administradores";
		
		public function __construct(){
			$this->connection = DB::getConnection();
		}
		
		public function inserir($administrador){
			$com = $this->connection->prepare("
				INSERT INTO ".$this->tabela." (administrador,nome,email,senha,situacao)values(?,?,?,?,?);
			");

			$com->bindValue(1,$administrador->administrador);
			$com->bindValue(2,$administrador->nome);
			$com->bindValue(3,$administrador->email);
			$com->bindValue(4,$administrador->senha);
			$com->bindValue(5,$administrador->situacao);
			try{
			    $com->execute();
			}catch(Exception $e){
			    die("Não foi possível inserir na base de dados. ".$e->getMessage());
			}
			//$this->connection=null;
			return $com->errorCode();
		}
		/*----------------------------------------------------------------------------*/
		public function verificaID($adm){
			$varRet = FALSE;
			$verif = $this->connection->prepare("SELECT *FROM ".$this->tabela." WHERE administrador=?");
			$verif->bindValue(1,$adm);
			$verif->execute();
			
			while ($verif->fetch(PDO::FETCH_ASSOC)) {
                 $varRet=TRUE;
            }
			return $varRet;
		}
		/*-----------------------------------------------------------------------------*/
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
		
		
		public function validaAcesso($email, $senha){
			$validaAcesso = FALSE;
			$verif = $this->connection->prepare("SELECT *FROM ".$this->tabela." WHERE email = ? AND senha = ?");
			$verif->bindValue(1,$email);
			$verif->bindValue(2,$senha);
			$verif->execute();
			
			while ($verif->fetch(PDO::FETCH_ASSOC)){
                 $validaAcesso=TRUE;
         }
			return $validaAcesso;
		}
		
		public function alteraSenha($email, $senha){
			$verif = $this->connection->prepare("UPDATE ".$this->tabela." SET senha = ? WHERE email = ?");
			$verif->bindValue(1,$senha);
			$verif->bindValue(2,$email);
			$verif->execute();
		}
	}
?>