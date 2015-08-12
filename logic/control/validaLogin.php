<?php
    require_once('../connection/DB.php');
    require_once('../classes/Usuario.php');
    require_once('../classesDao/UsuarioDAO.php');
	require_once('../classes/Administrador.php');
    require_once('../classesDao/AdministradorDAO.php');
	 
	 session_start();
    if(isset($_POST['valAcesso'])){
		
		$usuario = new Usuario();
    	$usuarioDAO = new UsuarioDAO();
		
	      $_SESSION['logado'] = FALSE;
		  $_SESSION['qstrespondido'] = FALSE;
		  $_SESSION['usuarioid'] = 0;
			/*-------------------------------------*/
			/*-------DECLARAÇÃO DOS SALTS----------*/
			$salt1 = "";
			$saltvar = "";
		   $saltSha1 = "";
			$senhaSalt = "";
			$senhaFinal = "";
		  /*-------------------------------------*/
         $email = $_POST['email'];
		   $senha = $_POST['senha']; 
			
         $id = $usuarioDAO->retornaIdEmail($email);
			$salt1 = (string)$id;
			
			if($id == 0){
			   echo "<script language=javascript>alert('Email invalido!');</script>"; 
			   echo "<script language=javascript>window.location.href = '../../pages/index.php'</script>";
			}else{
			    $saltvar = $salt1[0]."".$salt1[1]."".$salt1[2]."#*#";
				 $saltSha1 = sha1($saltvar);
				 $senhaSalt = $saltSha1.$senha;
				 $senhaFinal = hash('sha512', $senhaSalt);
				 
				 $user = $usuarioDAO->validaAcesso($email, $senhaFinal);
				 if($user != NULL){
				     $_SESSION['logado'] = TRUE;
					 if($user->situacao != 'L'){
					     $_SESSION['qstrespondido'] = TRUE;
					 }else{
						 $_SESSION['usuarioid'] = $user->usuario;
						 setcookie("usuario", $id);
						 $_SESSION['qstrespondido'] = FALSE;
					  }
				     header('location:../../pages/enquete.php');
				 }else{
				     echo "<script language=javascript>alert('Senha incorreta!');</script>";
                     $_SESSION['logado'] = FALSE;					  
				     echo "<script language=javascript>window.location.href = '../../pages'</script>";
				 }
			}
    }
	
	if(isset($_POST['valAcessoAdm'])){
		 
    	 $administradorDAO = new AdministradorDAO();
		 $_SESSION['logadoADM'] = FALSE;
		 
		 $email = $_POST['emailADM'];
		 $senha = hash('sha512', $_POST['senhaADM']);
		 
		 $bool = $administradorDAO->verificaEmail($email);
		 if($bool == FALSE){
			 echo "<script language=javascript>alert('Email invalido!');</script>"; 
			 echo "<script language=javascript>window.location.href = '../../pages/areaADM.php'</script>";
		 }else{
			 
			 if($administradorDAO->validaAcesso($email, $senha)){
				 $_SESSION['logadoADM'] = TRUE;
				 $_SESSION['emailADM'] = $email;
				 header('location:../../pages/acessoADM.php');
			 }else{
				 echo "<script language=javascript>alert('Senha incorreta!');</script>"; 
			     echo "<script language=javascript>window.location.href = '../../pages/areaADM.php'</script>";
			 }
		 }
    }
?>