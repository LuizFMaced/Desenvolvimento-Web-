<?php
	session_start();
  		if($_SESSION['statusLogin'] == 0)
	   		header('location:index.php');
 	
 	echo '<link rel="stylesheet" type="text/css" href="css/gerencia.css"></link>';
	header('Content-type: text/html; charset=ISO-8859-1');

	include "conecta_mysql.php";
	if (isset($_POST["incluir"]))
	{
		$codigo = $_POST["codigo"];
		$dsc = $_POST["descricao"];
		$linha = $_POST["linha"];
		$unidade = $_POST["unidade"];
		$status = $_POST["status"];
		$desc = strtoupper($dsc);
		
		$sql = "INSERT INTO materiais VALUES ";
		$sql .= "($codigo,'$desc',$linha,'$unidade','$status')";

		$resultado = mysql_query ($sql); 
		$linhas = mysql_affected_rows();
		if($linhas==1)
		 echo "Produto incluído com sucesso!"; 
		else
		 echo "Produto NÃO foi incluído!";
	}
	elseif (isset($_POST["atualizar"]))
	{
		$codigo = $_POST["codigo"];
		$dsc = $_POST["descricao"];
		$linha = $_POST["linha"];
		$unidade = $_POST["unidade"];
		$status = $_POST["status"];
		$desc = strtoupper($dsc);
		
		$sql = "UPDATE materiais ";
		$sql.= "SET cod_material=$codigo, ";
		$sql.= "dsc_material='$desc', ";
		$sql.= "cod_linha_material=$linha, ";
		$sql.= "cod_unidade_medida='$unidade', ";
		$sql.= "sta_material='$status' ";
		$sql.= "WHERE cod_material=$codigo ";

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


