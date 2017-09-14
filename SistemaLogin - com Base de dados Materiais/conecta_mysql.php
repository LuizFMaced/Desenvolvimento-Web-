<?php
	error_reporting (E_ALL & ~ E_NOTICE & ~ E_DEPRECATED);
   
   $conexao = mysql_connect ("localhost", "root", "");
   mysql_select_db ("bdadm");

	/*if(!$conexão){      
	echo "Ocorreu um erro na conexão com o banco de dados.";
	exit();
	 }*/

?>
