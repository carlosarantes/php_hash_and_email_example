<?php
    require_once('../classesDao/RespostasUsuariosDAO.php');

	session_start();  
	
	$usuario = $_SESSION['usuario'];
	
	$resDAO = new RespostasUsuariosDAO();

	$array = $resDAO->retornaRespostasPorUsuario($usuario);
	$j = 0; 
	$imp8 = FALSE;
	
	$msg = "";
	$destino;
	$assunto = "O questinario foi respondodo	-	".date('d/m/Y');
	
	//echo "Tamanho do array: ".count($array);
	while($j < count($array)){
		if((int)$array[$j]->questao == 8){
			 if($imp8 == FALSE){
				 $msg .= "<b>".$array[$j]->questao."  ".$array[$j]->subquestao."</b> - ".$array[$j]->descricao_questao."<br />";
			     $imp8 = TRUE;
			 }
			 $msg .=  $array[$j]->resposta_descricao."<br />";
		}else{
		    $msg .=  "<b>".$array[$j]->questao."  ".$array[$j]->subquestao."</b> - ".$array[$j]->descricao_questao."<br />";
		    $msg .=  $array[$j]->resposta_descricao."<br />";
		}
		$j++;
	}
	$bool = mail($destino,$assunto,$msg);
	if($bool == TRUE){
		//enviado com sucesso
	}
	//echo $assunto."<br />";
	//echo $msg;
	header('location:../../pages/index.php');
?> 