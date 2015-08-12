<html>
<head>
<title>Primeiro ADM</title>
<link rel="stylesheet" type="text/css" href="../resources/css/fonts-1.0.0.css">
</head>
<body>
<form method="post" action="../logic/control/cadastroADM.php">
   <label for="nomeADM">Nome:</label><br /> 
   <input type="text" name="nomeADM" maxlength="100" placeholder="Informe o nome do Administrador..." /><br />
   <label for="emailADM">Email:</label><br />  
   <input type="text" name="emailADM" maxlength="100" placeholder="Informe o email do Administrador..." /><br /> 
   <label for="senhaADM">Senha:</label><br />  
   <input type="password" name="senhaADM" maxlength="16" placeholder="Informe a senha do Administrador..." /><br /> 
   <label for="resenhaADM">Repetir senha:</label><br />  
   <input type="password" name="resenhaADM" maxlength="16" placeholder="Informe a senha novamente..." /><br /><br /> 
   <input type="submit" name="cadastrar" value="Cadastrar" />  
</form>
</body>
</html>