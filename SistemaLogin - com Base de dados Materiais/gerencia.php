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
		$nome = $_POST["nome"];
		$descricao = $_POST["descricao"];
		$preco = $_POST["preco"];
		$peso = $_POST["peso"];
		$cc = $_POST["cc"];
		$cs = $_POST["cs"];
		$ad = $_POST["ad"];

		$sql = "INSERT INTO produtos VALUES ";
		$sql .= "('$codigo','$nome','$descricao',$preco,$peso,$cc,$cs,'$ad')";
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
		$nome = $_POST["nome"];
		$descricao = $_POST["descricao"];
		$preco = $_POST["preco"];
		$peso = $_POST["peso"];
		$cc = $_POST["cc"];
		$cs = $_POST["cs"];
		$ad = $_POST["ad"];
		
		$sql = "UPDATE produtos ";
		$sql.= "SET nome_produto='$nome', ";
		$sql.= "descricao_produto='$descricao', ";
		$sql.= "preco='$preco', ";
		$sql.= "peso='$peso', ";
		$sql.= "cod_categoria='$cc', ";
		$sql.= "cod_subcategoria='$cs', ";
		$sql.= "adicionais='$ad' ";
		$sql.= "WHERE codigo_produto='$codigo' ";

	    mysql_query ($sql);
		$linhas = mysql_affected_rows();
		if($linhas==1)
		 echo "Produto atualizado com sucesso!"; 
		else
		 echo "Produto NÃO foi atualizado!"; 
		
	}

	elseif (isset($_POST["excluir"]))
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

	elseif (isset($_POST["mostrar"]))
	{
		$resultado = mysql_query (
			"SELECT m.cod_material , 
					m.dsc_material, 
					l.dsc_linha_material, 
					u.dsc_unidade_medida, 
					m.sta_material 
			FROM 	materiais m,
					linhas_materiais l,
					unidades_medidas u
			WHERE 	m.cod_linha_material = l.cod_linha_material
			AND 	m.cod_unidade_medida = u.cod_unidade_medida

		  order by m.cod_material");
		$linhas = mysql_num_rows ($resultado);
		if($linhas == 0){
			echo "Nenhum resgistro encontrado!";
		}
		else{
		echo "<p><b>Tabela de produtos da loja</b></p>";
		$tab="<table border='1' cellspacing='0' cellpadding='0'>";
		$tab.="<tr>";
			$tab.= "<td>Codigo</td>";
			$tab.= "<td>Nome</td>";
			$tab.= "<td>Linha do Material</td>";
			$tab.= "<td>Unidade de Material</td>";
			$tab.= "<td>Status</td>";
		$tab.= "</tr>";
			for ($i=0 ; $i<$linhas ; $i++)
			{
				$reg = mysql_fetch_row($resultado);  
				
				$tab.=	"<tr>";
				$tab.=		"<td width='150px'> $reg[0]</td>";
				$tab.=		"<td width='150px'> $reg[1]</td>";
			    $tab.=		"<td width='150px'> $reg[2]</td>";
	            $tab.=		"<td width='150px'> $reg[3]</td>";
	            $tab.=		"<td width='150px'> $reg[4]</td>";
				$tab.=	"</tr>" ;			
			}
		}
		$tab.="</table>";
		echo $tab;
		echo "<p><b>Foram encontradas ".$linhas." linhas<b></p>";
	}

	elseif (isset($_POST["executar"]))
	{
		$comando = $_POST["select"];
		$resultado = mysql_query($comando);
		echo "<fieldset><legend>Comando executado:".
				"</legend>".$comando."</fieldset>";
		$linhas = mysql_num_rows($resultado);
		$campo = mysql_num_fields($resultado);
		if($linhas == 0){
			echo "Nenhum resgistro encontrado!";
		}
		else{
		echo "<p><b>Tabela com os registros encontrados</b></p>";
		$tab="<table border='1' cellspacing='0' cellpadding='0'>";
		$tab.="<tr>";
			for($i=0 ; $i<$campo; $i++)
			{
				$nome_campo = mysql_field_name($resultado,$i);
				$tab.= "<td>$nome_campo</td>";	
			}
		$tab.= "</tr>";
		
		
			for ($j=0 ; $j<$linhas ; $j++)
			{
				$reg = mysql_fetch_row($resultado);	
			$tab.="<tr>";
				for($k=0;$k<$campo;$k++)
				{
				
				$tab.=	"<td width='150px'> $reg[$k]</td>";	
		
				}
			$tab.= "</tr>";
			}
				
		$tab.="</table>";
		echo $tab;
		echo "<p><b>Foram encontradas ".$linhas." linhas<b></p>";	
		}
	}
	mysql_close($conexao);
	echo '<script type="text/javascript" src="js/cadastra.js"></script>';
	echo '<p>
			<input id="voltar" type="button" value="Voltar" onClick="Nova()"/>
			<input id="sair" type="button" value="Sair" onClick="Sair()"/>
		 </p>';
?>
