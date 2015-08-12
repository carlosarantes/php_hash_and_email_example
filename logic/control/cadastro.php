 <?php
    require_once('../classes/Usuario.php');
    require_once('../classesDao/UsuarioDAO.php');
	 
    if(isset($_POST['cadastro'])){
		
		$usuario = new Usuario();
        $usuarioDAO = new UsuarioDAO();
	     /*---Salt criado para realizar criptografia de senhas --
	 	     será gerado um ID totalmente aleatório para o usuário--
        	  e a partir do ID será gerado um salt, aonde concatena-se os 3 primeiros
			   digitos do ID com #*# por ex: ID:998745 gerará um salt 998#*# ----
				esse salt será criptografado e gerará um salt final ex:azjjnmkd98djkjss98hff....*/
		  $salt = "";
		  $saltAux = "";
		  $saltSha1 = "";
		  /* GERA O ID RANDOMICO*/
		  $randomId = 0;
		  do{
		      $randomId = rand(100000, 999999);
		  }while($usuarioDAO->verificaID($randomId) == TRUE);
		  
		  /* Criptografa a senha final --- salt + senha
		  com a chave de criptografia sha512*/
		  
		  $saltAux = (string)$randomId;
		  $salt = $saltAux[0].$saltAux[1].$saltAux[2]."#*#";
		  $saltSha1 = sha1($salt);
		  $saltSha1Senha = "";	
		  $saltSha1Senha = $saltSha1.$_POST['senhaCad'];
		  $senhaFinal = hash('sha512', $saltSha1Senha);
		  
		  /*echo "<script language=javascript>alert('O valor do salt é: ".$salt."');</script>";
		  echo "<script language=javascript>alert('Salt criptografado é: ".$saltSha1."');</script>";
		  echo "<script language=javascript>alert('Senha quase final é: ".$saltSha1Senha."');</script>";
		  echo "<script language=javascript>alert('Senha final é: ".$senhaFinal."');</script>";*/
		  
		   $usuario->usuario = $randomId; 
		   $usuario->nome = $_POST['nomeCad'];
		   $usuario->email = $_POST['emailCad'];
		   $usuario->senha = $senhaFinal;
		   $usuario->situacao = "L";
           
		   $qtdErros = 0;
		   $erro = "";
		   //Situacao, L para Liberado e B para Bloqueado
		    $bool = $usuarioDAO->verificaEmail($usuario->email);
			if($bool == TRUE){
			    echo "<script language=javascript>alert('Já existe um cadastro com este email!');</script>";
			}else{
			
				if (!filter_var($usuario->email, FILTER_VALIDATE_EMAIL) === false) {
			
				} else {
					$erro .= "Você informou um email no formato inválido!\\n";
					$qtdErros++;					
				}
			
			    if(strlen($usuario->nome) < 8){
				     //É necessário informar o nome completo				
					$erro .= "É necessário informar o nome completo!\\n";
					$qtdErros++;
				}
				
				if($_POST['senhaCad'] != $_POST['resenhaCad']){
					$erro .= "Senhas não conferem!";
					$qtdErros++;
			    }
				
				if(strlen($_POST['senhaCad']) < 6){
					$erro .= "Senhas deve conter no minimo 6 digitos!";
					$qtdErros++;
			    }
			}
			
			if($bool == FALSE && $qtdErros == 0){
			   $usuarioDAO->inserir($usuario);
			}else{
			    echo "<script language=javascript>alert('".$erro."');</script>";
			}
			echo "<script language=javascript>window.location.href = '../../pages/index.php'</script>";
	 }
?>