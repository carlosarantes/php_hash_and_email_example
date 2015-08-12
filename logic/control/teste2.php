<?php
//echo date('Y-m-d h:m:s');
//echo microtime();

   if(isset($_POST['enviar'])){
	     require('../classes/Alternativa.php');
		 require('../classesDao/AlternativaDAO.php');
		 
		 $alternativa = new Alternativa();
		 $alternativaDAO = new AlternativaDAO();
		 
		 $alternativa->questao = $_POST['questao'];
		 $alternativa->subquestao = $_POST['subquestao'];
		 $alternativa->alternativa    = $_POST['alternativa'];
		 $alternativa->descricao_alternativa = $_POST['descricao_alternativa'];
		 $alternativa->data_criacao = date('Y-m-d');
		 
		 $erro = $alternativaDAO->inserir($alternativa);
		 echo $erro;
   }
?>

<form method="post">
<label>ID: </label><br />
<input type="text" name="questao" maxlength="2" /><br />
<label>subquestao: </label><br />
  <input type="text" name="subquestao" maxlength="4" /><br />
<label>Alternativa: </label><br />
  <input type="text" name="alternativa" maxlength="4" /><br />
<label>Alternativa: </label><br />
<textarea name="descricao_alternativa">
</textarea><br /><br />
<input type="submit" name="enviar" />
</form>