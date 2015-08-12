<?php
	session_start();
    if($_SESSION['logadoADM'] == FALSE){
		 echo "<script language=javascript>alert('Você deve estar logado para acessar a área administrativa!');</script>"; 
		 echo "<script language=javascript>window.location.href = 'areaADM.php'</script>";
	}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<title>Área Administrativa</title>
<link rel="stylesheet" type="text/css" href="../resources/css/style.css">
<link rel="stylesheet" type="text/css" href="../resources/css/fonts-1.0.0.css">
<script src="../resources/js/jquery-1.11.2.min.js"></script>
  <script type="text/livescript" language="javascript">
      
    $(function(){
	   $(".aba:first").show();
	   $("#nav-aba a").click(function(){
		   $(".aba").hide();
		   var div = $(this).attr('href');
		   $(div).show();
		   return false;
		   });
    });	
	
	
	$(function(){
	     $(".clica").click(function() {
			var div = $(this).attr('id');
			div = div+"div"; 
		    $("#"+div).slideToggle(500);
         });
    });	
	
  </script>
</head>
<body>


<div class="areaADM">

<div id="header">
      <center>
		<ul id="nav-aba">
			<li>
                 <a href="#usuariosResp">
			       Usuarios</a>
			</li>
            
            <li>
               <a href="#respostas">
				Respostas
                </a>
			</li>
            
            <li>
                 <a href="#altsenha">
					Alterar Senha
                </a>
			</li>
            
		</ul>
        </center>
	</div><!-------------FEXA A TAG header--------------->
<div id="sair">
<form name="fsair" method="post" action="../logic/control/loggout.php">
   <button name="sairADM">Sair</button>
</form>
</div>

<div id="main" >
    <div id="usuariosResp" class="aba">
       <h3>USUÁRIOS QUE RESPONDERAM O FORMULÁRIO: </h3><br />
    <?php
      require_once('../logic/classesDao/UsuarioResDAO.php');  
	  
	  $usuarioResDAO = new UsuarioResDAO();
      $usuarioResDAO->listarUsuarios();
    ?>
    </div>
    
    <div id="respostas" class="aba">
      <?php
          require_once('../logic/classesDao/RespostasUsuariosDAO.php');
	     
		  $resDAO = new RespostasUsuariosDAO();
		  $array = $resDAO->retornaRespostas();
		  $i = 0;
		  $j = 0;
		  
		  $imp = FALSE;
		while($i < count($array)){
			echo '<div class="clica" id="mostra'.$j.'" >';
			   $data = explode("-", $array[$i]->data_resposta);
			   echo $array[$i]->nome." - ".$data[2]."/".$data[1]."/".$data[0]."<br />";
			echo '</div>'; 
			
			echo '<div class="mostra" id="mostra'.$j.'div" >';  
			while(($j<count($array)) && ($array[$i]->nome==$array[$j]->nome)){
				if($array[$i]->questao == 8){ 
					if($imp == FALSE){
						$imp = TRUE;
						echo "<b>".$array[$j]->questao."  ".$array[$j]->subquestao."</b>"." - ".$array[$j]->descricao_questao."<br />";
					}
				}else{  
					echo "<b>".$array[$j]->questao."  ".$array[$j]->subquestao."</b>"." - ".$array[$j]->descricao_questao."<br />";
				}
				echo $array[$j]->resposta_descricao."<br />";
				$j++;
			}
			echo '</div>';
			$i = $j;
		}
		 /*echo "<br />TAMANHO: ".count($array);
		 echo "<br />TAMANHO pos: ".$j;*/
	  ?>
    </div>
    
    <div id="altsenha" class="aba">
         <div class="altsenha">
            <form method="post" action="../logic/control/alteraSenhaADM.php">
            <label for="oldsenha">Senha Antiga:</label>
            <input type="password" name="oldsenha" />
            <label for="newsenha">Nova Senha:</label>
            <input type="password" name="newsenha" />
            <label for="renewsenha">Repetir Nova Senha:</label>
            <input type="password" name="renewsenha" /><br /><br />
            <input type="hidden" name="emailADM" value="<?php echo $_SESSION['emailADM'];?>" />
            <input type="submit" name="altsenhaADM" value="Alterar Senha" />
            </form>
         </div>
    </div>
</div>

</div>

</body>
</html>