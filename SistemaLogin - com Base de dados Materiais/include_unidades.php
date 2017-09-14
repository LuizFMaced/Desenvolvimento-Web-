<?php
	session_start();
  		if($_SESSION['statusLogin'] == 0)
	   		header('location:index.php');
 	
 	echo '<link rel="stylesheet" type="text/css" href="css/gerencia.css"></link>';
	header('Content-type: text/html; charset=ISO-8859-1');

	include "conecta_mysql.php";
	if (isset($_POST["incluir_unidade"]))
	{
		$codigo = $_POST["codigo"];
		$dsc = $_POST["descricao"];
		$desc = strtoupper($dsc);
		
		$sql = "INSERT INTO unidades_medidas VALUES ";
		$sql .= "($codigo,'$desc')";

		$resultado = mysql_query ($sql); 
		$linhas = mysql_affected_rows();
		if($linhas==1)
		 echo "Produto incluído com sucesso!"; 
		else
		 echo "Produto NÃO foi incluído!";
	}
	elseif (isset($_POST["atualizar_unidade"]))
	{
		$codigo = $_POST["codigo"];
		$dsc = $_POST["descricao"];
		$desc = strtoupper($dsc);
		
		$sql = "UPDATE unidades_medidas ";
		$sql.= "SET cod_unidade_medida=$codigo, ";
		$sql.= "dsc_unidade_medida='$desc' ";
		$sql.= "WHERE cod_unidade_medida=$codigo ";

	    mysql_query ($sql);
		$linhas = mysql_affected_rows();
		if($linhas==1)
		 echo "Produto atualizado com sucesso!"; 
		else
		 echo "Produto NÃO foi atualizado!"; 	
	}
	mysql_close($conexao);
	echo '<script type="text/javascript" src="js/cadastra.js"></script>';
	echo '<p>
			<input id="voltar" type="button" value="Voltar" onClick="Nova()"/>
			<input id="sair" type="button" value="Sair" onClick="Sair()"/>
		 </p>';
?>


