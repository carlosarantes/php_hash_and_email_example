<?php
   require_once('../classes/Administrador.php');
   require_once('../classesDao/AdministradorDAO.php');
   session_start();
    
	if(isset($_POST['cadastrar'])){
	    
		$administrador = new Administrador();
		$administradorDAO = new AdministradorDAO();
		
		 $randomId = 0;
		 do{
		    $randomId = rand(100000, 999999);
		 }while($administradorDAO->verificaID($randomId) == TRUE);
		 
		 $administrador->administrador = $randomId;
		 $administrador->nome = $_POST['nomeADM'];
		 $administrador->email = $_POST['emailADM'];
		 $administrador->senha = hash('sha512', $_POST['senhaADM']);
		 $administrador->situacao = "P";
		 
		 //Situações
		 //P = primeiro acesso
		 //L = liberado
		 //B = bloqueado
	     $qtdErros = 0;
		 $erro = "";
		 
		 $bool = $administradorDAO->verificaEmail($administrador->email);
		 if($bool == TRUE){
	         echo "<script language=javascript>alert('Ja existe um cadastro com este email!');</script>";
		 }else{
		 if(strlen($administrador->nome) < 8){
			 //Nome invalido
			 $erro .= "E necessario informar o nome completo!\\n";
			 $qtdErros++;
		 }
		 
		 if(!filter_var($administrador->email, FILTER_VALIDATE_EMAIL) === false) {
		 }else {
			 $erro .= "Voce informou um email no formato invalido!\\n";
			 //Email inválido
			 $qtdErros++;					
		 }
		 
		 if($_POST['senhaADM'] != $_POST['resenhaADM']){
			$erro .= "Senhas nao conferem!\\n";
			$qtdErros++;
	     }
				
		if(strlen($_POST['senhaADM']) < 6){
			$erro .= "Senhas deve conter no minimo 6 digitos!";
			$qtdErros++;
		}
		 
		if($qtdErros == 0){
			$administradorDAO->inserir($administrador);
		}else{
			echo "<script language=javascript>alert('".$erro."');</script>";
		}
	 }
	   echo "<script language=javascript>window.location.href = '../../pages/primeiroADM.php'</script>";
	}
?>