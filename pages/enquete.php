<?php 
	  session_start();
	  if(isset($_SESSION['qstrespondido']) && $_SESSION['qstrespondido'] == TRUE){
		  echo "<script language=javascript>alert('Você ja respondeu o questionário!');</script>";
		  session_unset();
		  echo "<script language=javascript>window.location.href = 'index.php'</script>";
	  } 
	  
	  if(isset($_SESSION['logado'])){
	       if($_SESSION['logado'] == FALSE){
				echo "<script language=javascript>alert('Você deve estar logado em sua conta!!!');</script>";
				session_unset();
				echo "<script language=javascript>window.location.href = 'index.php'</script>";
			 }else{
	
			      /*--- Verificação para expirar a sessão caso o tempo de acesso na página ultrapasse 30 minutos --*/
					if((!isset($_SESSION['inicio'])) || $_SESSION['inicio'] == 0){
						$_SESSION['inicio'] = time();
					}
					if(time() >= ($_SESSION['inicio']+1800)){
						session_unset();
						echo "<script language=>alert('Sua sessão expirou! Acesse novamente!');</script>";
						echo "<script language=javascript>window.location.href = 'index.php'</script>";
					}
			 }
			 
	  }else{
	      echo "<script language=javascript>alert('Houve problemas no acesso ao Sistema, contate o Administrador!');</script>";
			session_unset();
			echo "<script language=javascript>window.location.href = 'index.php'</script>";
	  }
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Levantamento Didático</title>
<link rel="stylesheet" type="text/css" href="../resources/css/style2.css">
<link rel="stylesheet" type="text/css" href="../resources/css/fonts-1.0.0.css">
</head>
<body>

<div class="enquete">

      <div id="sair">
        <form name="fsair" method="post" action="../logic/control/loggout.php">
          <button name="sair">Sair</button>
        </form>
      </div>

<div class="enqueteForm">
<form method="post" action="../logic/control/responder.php" >
<fieldset>
<h2>FORMULÁRIO VIRTUAL / AVALIADORES</h2>
<br />
<label for="questao1">1.	Titulação acadêmica: </label>
<ul>
    <li><input type="radio" name="questao1" id="rd" checked="checked" value="1" />Pós-doutorado</li>
	<li><input type="radio" name="questao1" id="rd" value="2" />Doutor(a)</li>
	<li><input type="radio" name="questao1" id="rd" value="3" />Mestre(a)</li>
	<li><input type="radio" name="questao1" id="rd" value="4" />Especialista</li>
	<li><input type="radio" name="questao1" id="rd" value="5" />Graduado</li>
</ul>
<br />
<label for="questao2">2.	Quantas vezes participou da Equipe Técnica que avalia os livros de Química para o PNLD?</label>
<ul>
    <li><input type="radio" name="questao2" id="rd" checked="checked" value="1" />1</li>
	<li><input type="radio" name="questao2" id="rd" value="2" />2</li>
	<li><input type="radio" name="questao2" id="rd" value="3" />3</li>
</ul>
<br />
<label for="questao3">3.	Você é autor, ou é participante de grupo de autores de livro didático?</label>
<ul>
    <li><input type="radio" name="questao3" id="rd" checked="checked" value="1" />Sim</li>
	<li><input type="radio" name="questao3" id="rd" value="2" />Não</li>
</ul>
<br />
<label for="questao4">4.	Avalie a importância do livro didático como material de ensino de Química em aula.</label>
<ul>
    <li><input type="radio" name="questao4" id="rd" checked="checked" value="1" />Muito importante</li>
	<li><input type="radio" name="questao4" id="rd" value="2" />De regular importância</li>
	<li><input type="radio" name="questao4" id="rd" value="3" />Pouco importante</li>
	<li><input type="radio" name="questao4" id="rd" value="4" />De nenhuma importância</li>
	<li><input type="radio" name="questao4" id="rd" value="5" />Não sei</li>
</ul>
<br />
<label for="questao5">5.	Avalie a importância da avaliação do livro didádico pelo PNLD.</label>
<ul>
   <li><input type="radio" name="questao5" id="rd" checked="checked" value="1" />Muito importante</li>
	<li><input type="radio" name="questao5" id="rd" value="2" />De regular importância</li>
	<li><input type="radio" name="questao5" id="rd" value="3" />Pouco importante</li>
	<li><input type="radio" name="questao5" id="rd" value="4" />De nenhuma importância</li>
	<li><input type="radio" name="questao5" id="rd" value="5" />Não sei</li>
</ul>
<br />
<label for="questao6">6.	Os critérios norteadores na elaboração dos livros didáticos aprovados visam desenvolver competências 
e habilidades, dentro de uma visão crítica, dinâmica, contextualizada e interdisciplinar. Qual deles exerce maior peso
no processo de avaliação do Livro Didático para o ensino de Química?</label>
<ul>
    <li><input type="radio" name="questao6" id="rd" checked="checked" value="1" />contextualização</li>
	<li><input type="radio" name="questao6" id="rd" value="2" />interdisciplinaridade</li>
	<li><input type="radio" name="questao6" id="rd" value="3" />valorização dos conhecimentos prévios dos alunos</li>
	<li><input type="radio" name="questao6" id="rd" value="4" />participação concernente ao exercício pleno da cidadania</li>
	<li><input type="radio" name="questao6" id="rd" value="5" />nenhum</li>
	<li><input type="radio" name="questao6" id="rd" value="6" />todos</li>
</ul>
<label for="questao61">No bloco B de critérios usados para avaliar as obras, qual você julga o mais importante?</label>
<ul>
    <li><input type="radio" name="questao61" id="rd" checked="checked" value="1" />BLOCO 1 - EXTRUTURA EDITORIAL E PROJETO GRÁFICO</li>
	<li><input type="radio" name="questao61" id="rd" value="2" />BLOCO 2 - LEGISLAÇÃO E CIDADANIA<br /> ABORDAGEM TEÓRICO-METODOLÓGICA</li>
	<li><input type="radio" name="questao61" id="rd" value="3" />BLOCO 3 - PROPOSTA DIDÁTICOPEDAGÓGICA<br /> CORREÇÃO E ATUALIZAÇÃO DE CONCEITOS</li>
	<li><input type="radio" name="questao61" id="rd" value="4" />BLOCO 4 - INFORMAÇÕES E PROCEDIMENTOS</li>
	<li><input type="radio" name="questao61" id="rd" value="5" />BLOCO 5 - MANUAL DO PROFESSOR</li>
</ul>
<br />
<label for="questao7">7.	Avalie a importância de conhecer a Matriz de Referência de Ciências da Natureza do ENEM, e os 
Objetos de Conhecimentos associados à essa Matriz de Referência, na análise do Livro Didático para o ensino de Química.</label>
<ul>
   <li><input type="radio" name="questao7" id="rd" checked="checked" value="1" />Muito importante</li>
	<li><input type="radio" name="questao7" id="rd" value="2" />De regular importância</li>
	<li><input type="radio" name="questao7" id="rd" value="3" />Pouco importante</li>
	<li><input type="radio" name="questao7" id="rd" value="4" />De nenhuma importância</li>
	<li><input type="radio" name="questao7" id="rd" value="5" />Não sei</li>
</ul>
<br />
<label for="questao8">8.	Assinale os critérios que você acredita aproximar o livro didático para o ensino de Química como material de ensino do ENEM, a partir da FICHA PARA AVALIAÇÃO DA OBRA- PNLD – QUÍMICA 2015/Bloco 3 - Coerência e adequação da abordagem teórico-metodológica em relação ao conhecimento químico escolar destinado ao Ensino Médio:</label>
<ul>
    <li><input type="checkbox" name="questao81" id="ck" checked="checked" value="3.1" >3.1 A obra organiza seus volumes de forma a garantir uma progressão no processo de ensino-aprendizagem?</li>
	<li><input type="checkbox" name="questao83" id="ck" value="3.3" >3.3 A obra propõe atividades que articulem diferentes disciplinas, aprofundando as possibilidades de abordagem e compreensão de questões relevantes para o alunado do Ensino Médio?</li>
    <li><input type="checkbox" name="questao84" id="ck" value="3.4" >3.4 A obra oportuniza o contato com diferentes linguagens e formas de expressão?</li>
    <li><input type="checkbox" name="questao85" id="ck" value="3.5" >3.5 A obra evita a compartimentalização dos conceitos centrais da Química, abordando-os em diferentes contextos e/ou situações do cotidiano?</li>
    <li><input type="checkbox" name="questao86" id="ck" value="3.6" >3.6 A obra considera, para a aprendizagem, a linguagem como constitutiva do pensamento científico por meio de códigos próprios (símbolos, nomes científicos, diagramas e imagens)?</li>
    <li><input type="checkbox" name="questao87" id="ck" value="3.7" >3.7 A obra estimula o aluno para que desenvolva habilidades de comunicação científica, inclusive na forma oral, propiciando leitura e produção de textos diversificados, bem como, gráficos, tabelas, mapas, cartazes etc.?</li>
    <li><input type="checkbox" name="questao88" id="ck" value="3.8" >3.8 A obra apresenta a Química na dimensão ambiental dos problemas contemporâneos, levando em conta não somente situações e conceitos que envolvem as transformações da matéria e os artefatos tecnológicos em si, mas também os processos humanos subjacentes aos modos de produção do mundo do trabalho?</li>
    <li><input type="checkbox" name="questao89" id="ck" value="3.9" >3.9 A obra evita discursos maniqueístas a respeito da Química, calcados em crenças de que essa ciência é permanentemente responsável pelas catástrofes ambientais, pelos fenômenos de poluição, bem como pela artificialidade de produtos, principalmente aqueles relacionados com alimentação e saúde?</li>
    <li><input type="checkbox" name="questao810" id="ck" value="3.10" >3.10 A obra apresenta uma visão de ciência de natureza humana marcada pelo seu caráter provisório, enfatizando as limitações de cada modelo explicativo, por meio da exposição de suas diferentes possibilidades de aplicação?</li>
    <li><input type="checkbox" name="questao811" id="ck" value="3.11" >3.11 A obra propõe atividades que evitam promover, principalmente, aprendizagem mecânica com mera memorização de fórmulas, nomes e regras?</li>
    <li><input type="checkbox" name="questao812" id="ck" value="3.12" >3.12 A obra apresenta experimentos adequados à realidade escolar, com periculosidade controlada, alertando acerca dos cuidados específicos para os procedimentos experimentais, bem como para o descarte adequado dos resíduos?</li>
    <li><input type="checkbox" name="questao813" id="ck" value="3.13" >3.13 A obra apresenta, em suas atividades, uma visão de experimentação que se alinha com uma perspectiva investigativa, favorecendo a apresentação de situações-problema que fomentem a compreensão dos fenômenos, bem como a construção de argumentações?</li>
</ul>
<br />
<label for="questao9">9.	Qual é a sua opnião em relação ao ENEM, desde sua origem, suas características e suas mudanças?</label>
     <textarea name="questao9" placeholder="Seu texto aqui" maxlength="800"></textarea>
<br />
<label for="questao10">10.	Em sua opinião, qual é o peso do ENEM no momento da avaliação dos Livros Didáticos para o ensino de Química?</label>
      <textarea name="questao10" placeholder="Seu texto aqui" maxlength="800"></textarea>
<br />
<input type="hidden" name="usuario" value="<?php echo $_SESSION['usuarioid'];?>" />
<center>
<input type="submit" name="okForm" value="Confirmar" />
<input type="reset" value="Limpar Campos" />
</center>
</fieldset>
</form>
</div>

</div>

</body>
</html>