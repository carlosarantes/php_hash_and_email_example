<?php
    require_once('../classes/Administrador.php');
    require_once('../classesDao/AdministradorDAO.php');
    session_start();

    if(isset($_POST['altsenhaADM'])){
		$administrador = new Administrador();
		$administradorDAO = new AdministradorDAO();
		
		$administrador->email = $_POST['emailADM'];
		$administrador->senha = hash('sha512', $_POST['oldsenha']);
		
		$novaSenha = $_POST['newsenha'];
		$renovaSenha = $_POST['renewsenha'];
		
		if($administradorDAO->validaAcesso($administrador->email, $administrador->senha) == FALSE){
			echo "<script language=javascript>alert('Senha Invalida!');</script>";
		    echo "<script language=javascript>window.location.href = '../../pages/acessoADM.php'</script>";
		}else{
			if($novaSenha != $renovaSenha){
			   echo "<script language=javascript>alert('As novas senhas nao conferem!');</script>";
		       echo "<script language=javascript>window.location.href = '../../pages/acessoADM.php'</script>";
			}else{
				if(strlen($novaSenha) < 6){
					echo "<script language=javascript>alert('A nova senha deve conter pelo menos 6 digitos!');</script>";
		       		echo "<script language=javascript>window.location.href = '../../pages/acessoADM.php'</script>";
				}else{
					$novaSenhaHash = hash('sha512', $novaSenha);
			   		$administradorDAO->alteraSenha($administrador->email, $novaSenhaHash);
				    header('location:../../pages/acessoADM.php');
				}
			} 
		}
	}
?>

