<?php
   require_once('../classes/Resposta.php');
   require_once('../classesDao/RespostaDAO.php');
   require_once('../classesDao/AlternativaDAO.php');
   require_once('../classesDao/UsuarioDAO.php');
   session_start();
    /*if(isset($_POST['usuario'])){
	   echo $_POST['usuario'];
	 }*/
	 if(isset($_POST['okForm'])){
	      // echo $_POST['usuario'];
		  
		  $respostaDAO = new RespostaDAO();
		  $alternativaDAO = new AlternativaDAO();
		  $usuarioDAO = new UsuarioDAO();
		  
		  $usuario = $_POST['usuario'];
		  $i = 1;
		  $j = 1;
		  while($i <= 10){
			$resposta = new Resposta();
			
			   if($i>=9){
				    $resposta->usuario = $usuario;
					$resposta->questao = $i;
					$resposta->subquestao = "";
					$resposta->alternativa = "";
					$resposta->resposta_descricao = $_POST['questao'.$i];
					$resposta->data_resposta = date('Y-m-d');
					
					$respostaDAO->inserir($resposta);
			   }else{
			   		if($i == 8){
				         while($j <= 13){
							 if(isset($_POST['questao8'.$j])){
								$resposta8 = new Resposta();
								 
								$descricao_alternativa = $alternativaDAO->buscardescricao($i, "", $_POST['questao8'.$j]);
								 
								$resposta8->usuario = $usuario;
								$resposta8->questao = $i;
								$resposta8->subquestao = "";
								$resposta8->alternativa = $_POST['questao8'.$j];;
								$resposta8->resposta_descricao = $descricao_alternativa;
								$resposta8->data_resposta = date('Y-m-d');
								
								$respostaDAO->inserir($resposta8);
							 }
							 $j++;
						 }
			   		}else{
						
						$descricao_alternativa = $alternativaDAO->buscardescricao($i, "", $_POST['questao'.$i]);
						
						$resposta->usuario = $usuario;
						$resposta->questao = $i;
						$resposta->subquestao = "";
						$resposta->alternativa = $_POST['questao'.$i];
						$resposta->resposta_descricao = $descricao_alternativa;
						$resposta->data_resposta = date('Y-m-d');
						
						$respostaDAO->inserir($resposta);
						if($i == 6){
				            if($_POST['questao61']){
								$resposta6 = new Resposta();
								
								$descricao_alternativa = $alternativaDAO->buscardescricao($i, "6.1", $_POST['questao61']);
								
								$resposta6->usuario = $usuario;
								$resposta6->questao = $i;
								$resposta6->subquestao = "6.1";
								$resposta6->alternativa = $_POST['questao61'];;
								$resposta6->resposta_descricao = $descricao_alternativa;
								$resposta6->data_resposta = date('Y-m-d');
								
								$respostaDAO->inserir($resposta6);
							}
			   			}
					}
			   }
			   /*-----------------------------
			   -------------------------------*/
			  $i++;
		  }
		  $usuarioDAO->alteraSituacao($usuario,"B");
		  $_SESSION['qstrespondido'] = TRUE;
		  $_SESSION['usuario'] = $usuario;
		  header('location:enviaEmail.php');
	 } 
?>