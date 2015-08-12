<?php
   session_start();
   if(isset($_POST['sair'])){
	   $_SESSION['logado'] = FALSE;
	   header('location:../../pages/index.php');
   }
   
   if(isset($_POST['sairADM'])){
	   $_SESSION['logadoADM'] = FALSE;
	   header('location:../../pages/areaADM.php');
   }
?>