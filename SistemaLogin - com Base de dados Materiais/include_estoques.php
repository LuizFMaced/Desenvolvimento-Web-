<?php
	session_start();
  		if($_SESSION['statusLogin'] == 0)
	   		header('location:index.php');
 	
 	echo '<link rel="stylesheet" type="text/css" href="css/gerencia.css"></link>';
	header('Content-type: text/html; charset=ISO-8859-1');

	include "conecta_mysql.php";
	if (isset($_POST["incluir_estoque"]))
	{
		$codE = $_POST["empresa"];
		$codM = $_POST["material"];
		$codL = $_POST["localizacao"];
		$codF = $_POST["fornecedor"];
		$qtdR = $_POST["qtd_real"];
		$qtdM = $_POST["qtd_min"];
		$qtdMx = $_POST["qtd_max"];
		$qtdR = $_POST["qtd_rep"];
		
		$sql = "INSERT INTO estoques VALUES ";
		$sql .= "($codE,$codM,$codL,$codF,$qtdR,$qtdM,$qtdMx,$qtdR)";

		$resultado = mysql_query ($sql); 
		$linhas = mysql_affected_rows();
		if($linhas==1)
		 echo "Produto incluído com sucesso!"; 
		else
		 echo "Produto NÃO foi incluído!";
	}
	elseif (isset($_POST["atualizar_estoque"]))
	{
		$codE = $_POST["empresa"];
		$codM = $_POST["material"];
		$codL = $_POST["localizacao"];
		$codF = $_POST["fornecedor"];
		$qtdR = $_POST["qtd_real"];
		$qtdM = $_POST["qtd_min"];
		$qtdMx = $_POST["qtd_max"];
		$qtdR = $_POST["qtd_rep"];
		
		$sql = "UPDATE estoques ";
		$sql.= "SET cod_empresa=$codE, ";
		$sql.= "cod_material='$codM', ";
		$sql.= "cod_localizacao='$codL', ";
		$sql.= "cod_fornecedor='$codF', ";
		$sql.= "qtd_real='$qtdR', ";
		$sql.= "qtd_min='$qtdM', ";
		$sql.= "qtd_max='$qtdMx', ";
		$sql.= "qtd_rep='$qtdR', ";
		$sql.= "WHERE cod_fornecedor=$codF ";
		$sql.= "AND cod_material=$codM ";
		$sql.= "AND cod_localizacao=$codL ";
		$sql.= "AND cod_empresa=$codE ";

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


