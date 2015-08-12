<?php 
    ob_start();
	ob_clean(); 
	session_start();
	if(isset($_SESSION['logado']) && $_SESSION['logado'] == TRUE){
		    echo "<script language=javascript>alert('Você já está logado no sistema!');</script>";
			echo "<script language=javascript>window.location.href = 'enquete.php'</script>";
	}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Área De Acesso</title>
<link rel="stylesheet" type="text/css" href="../resources/css/style.css" />
<link rel="stylesheet" type="text/css" href="../resources/css/fonts-1.0.0.css" />
<script src="../resources/js/jquery-1.11.2.min.js"></script>
  <script>
      
    $(document).ready(function(){
	     $("#email").focus();
		  $("#botao").click(function(){
            $("#janelaModal").fadeIn(500);
				$("#nameCad").focus();
        });
	 
	     $("#fecha").click(function(){
            $("#janelaModal").fadeOut(500);
				$("input:text").val("");
				$("input:password").val("");
        });
		  
		  $("#bbb").click(function(){
            $("#janelaModal").fadeOut(500);
        });
	 });		
	  
  </script>
</head>

<body>

<div class="login">
    <form name="formLogin" method="post" action="../logic/control/validaLogin.php">
       <fieldset>
       <div class="acess"><a href="areaADM.php"><div class="link"><img src="../resources/icons/key.png" />Acesso Restrito</div></a></div><br />
          <div class="fields">
           <label for="email">Email</label>
           <input type="text" id="email" name="email" maxlength="100" placeholder="Informe seu email" />
           <label for="senha">Senha</label>
           <input type="password" name="senha" maxlength="16" placeholder="Informe sua senha" /><br />
           <input type="submit" name="valAcesso" value="Acessar" />
           
           </div>
       </fieldset>
    </form>
</div>

<div id="botao">
   <button>Cadastrar</button>
</div><!-- DIV QUE CONTERÁ O BOTÃO PARA A JANELA MODAL --->
<!-- ---------------------------------------------------------
-------------------------------------------------------------
-------------------------------------------------------------- --->
<div id="janelaModal">
	   <div id="fechaModal">
		    <div id="fecha"><center><b>X</b></center></div>
		</div>
		
	   <div id="modal">
		    <h2>Cadastre-se para responder o questionário</h2>
			 <form method="post" action="../logic/control/cadastro.php">
			    <label for="nomeCad">Nome Completo: </label>
			    <input id="nameCad" type="text" name="nomeCad" placeholder="Informe seu nome..." maxlength="100" onKeyUp="this.value=this.value.toUpperCase();"/>
				 <label for="emailCad">Email: </label>
				 <input type="text" name="emailCad" placeholder="Informe seu email..." maxlength="100" />
				 <label for="senhaCad">Senha: </label>
				 <input type="password" name="senhaCad" placeholder="Informe sua senha..." maxlength="15" />
				 <label for="resenhaCad">Repetir Senha: </label>
				 <input type="password" name="resenhaCad" placeholder="Repita sua senha..." maxlength="15" /><br /><br /> 
				 <input id="bbb" type="submit" name="cadastro" value="Cadastrar" />
			 </form>
		</div>
		
	</div> 
<!-- ---------------------------------------------------------
-------------------------------------------------------------
-------------------------------------------------------------- --->
</body>
</html>