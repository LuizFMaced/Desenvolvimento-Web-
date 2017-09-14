<?php
	session_start();
  		if($_SESSION['statusLogin'] == 0)
	   		header('location:index.php');
 	
 	echo '<link rel="stylesheet" type="text/css" href="css/gerencia.css"></link>';
	header('Content-type: text/html; charset=ISO-8859-1');

	include "conecta_mysql.php";
	if (isset($_POST["incluir_fornecedor"]))
	{
		$codigo = $_POST["codigo"];
		$dsc = $_POST["descricao"];
		$uf = $_POST["federais"];
		$tpo = $_POST["tipo"];
		$desc = strtoupper($dsc);
		
		$sql = "INSERT INTO fornecedores VALUES ";
		$sql .= "($codigo,'$desc','$uf','$tpo')";

		$resultado = mysql_query ($sql); 
		$linhas = mysql_affected_rows();
		if($linhas==1)
		 echo "Produto incluído com sucesso!"; 
		else
		 echo "Produto NÃO foi incluído!";
	}
	elseif (isset($_POST["atualizar_fornecedor"]))
	{
		$codigo = $_POST["codigo"];
		$dsc = $_POST["descricao"];
		$uf = $_POST["federais"];
		$tpo = $_POST["tipo"];
		$desc = strtoupper($dsc);
		
		$sql = "UPDATE fornecedores ";
		$sql.= "SET cod_fornecedor=$codigo, ";
		$sql.= "dsc_fornecedor='$desc', ";
		$sql.= "cod_uf='$uf', ";
		$sql.= "tpo_fornecedor='$tpo' ";
		$sql.= "WHERE cod_fornecedor=$codigo ";

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


