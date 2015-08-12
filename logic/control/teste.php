<?php
//echo date('Y-m-d h:m:s');
//echo microtime();

   if(isset($_POST['enviar'])){
	     require('../classes/Questao.php');
		 require('../classesDao/QuestaoDAO.php');
		 
		 $questao = new Questao();
		 $questaoDAO = new QuestaoDAO();
		 
		 $questao->questao = $_POST['questao'];
		 $questao->subquestao    = $_POST['subquestao'];
		 $questao->descricao_questao = $_POST['descricao_questao'];
		 $questao->data_criacao = date('Y-m-d');
		 
		 $erro = $questaoDAO->inserir($questao);
		 echo $erro;
   }
?>

<form method="post">
<label>ID: </label><br />
<input type="text" name="questao" maxlength="2" /><br />
<label>SubsQuestao: </label><br />
  <input type="text" name="subquestao" maxlength="4" /><br />
<label>Desc: </label><br />
  <input type="text" name="subquestao" maxlength="4" /><br />
<label>Questão: </label><br />
<textarea name="descricao_questao">
</textarea><br /><br />
<input type="submit" name="enviar" />
</form>