<?php
   session_start();
	if(isset($_SESSION['logadoADM'])){
	   if($_SESSION['logadoADM'] == TRUE){
		    echo "<script language=javascript>alert('Você já está logado no sistema!');</script>";
			echo "<script language=javascript>window.location.href = 'acessoADM.php'</script>";
		}
	}else{
	      $_SESSION['logadoADM'] = FALSE;
	}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Área Administrativa</title>
<link rel="stylesheet" type="text/css" href="../resources/css/style.css">
<link rel="stylesheet" type="text/css" href="../resources/css/fonts-1.0.0.css">
<script src="../resources/js/jquery-1.11.2.min.js"></script>
  <script>
    $(document).ready(function(){
	     $("#email").focus();
	 });		
  </script>
</head>
<body>

<div class="login">
    <form name="formLogin" method="post" action="../logic/control/validaLogin.php">
       <fieldset>
       <div class="acess"><a href="index.php"><div class="link"><img src="../resources/icons/left.png" />Voltar</div></a></div><br />
          <div class="fields">
           <label for="emailADM">Email</label>
           <input type="text" id="email" name="emailADM" maxlength="100" placeholder="Informe seu email" />
           <label for="senhaADM">Senha</label>
           <input type="password" name="senhaADM" maxlength="16" placeholder="Informe sua senha" /><br />
           <input type="submit" name="valAcessoAdm" value="Acessar" />
           </div>
       </fieldset>
    </form>
</div>

</body>
</html>