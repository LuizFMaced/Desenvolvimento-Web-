<?php
	session_start();
  		if($_SESSION['statusLogin'] == 0)
	   		header('location:index.php');
 	
 	echo '<link rel="stylesheet" type="text/css" href="css/gerencia.css"></link>';
	
	header('Content-type: text/html; charset=ISO-8859-1');
	include "conecta_mysql.php";	
	if (isset($_POST["excluir"]))
	{
		$codigo = $_POST["codigo"];
		$sql = "DELETE FROM materiais WHERE cod_material=$codigo";
		$resultado = mysql_query ($sql); 
		$linhas = mysql_affected_rows();
		if($linhas==1)
		{ echo "Produto excluído com sucesso!"; }
		else
		{ echo "Produto NÃO encontrado!"; }
	}
	mysql_close($conexao);
	echo '<script type="text/javascript" src="js/cadastra.js"></script>';
	echo '<p>
			<input id="voltar" type="button" value="Voltar" onClick="Nova()"/>
			<input id="sair" type="button" value="Sair" onClick="Sair()"/>
		 </p>';
?>
