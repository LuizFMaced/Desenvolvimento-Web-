<?php
	session_start();
  		if($_SESSION['statusLogin'] == 0)
	   		header('location:index.php');
 	
 	echo '<link rel="stylesheet" type="text/css" href="css/gerencia.css"></link>';
	
	header('Content-type: text/html; charset=ISO-8859-1');
	include "conecta_mysql.php";	
	if (isset($_POST["mostrar"]))
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
		echo "<p><b>".$linhas." linhas encontradas!<b></p>";
	}
	mysql_close($conexao);
	echo '<script type="text/javascript" src="js/cadastra.js"></script>';
	echo '<p>
			<input id="voltar" type="button" value="Voltar" onClick="Nova()"/>
			<input id="sair" type="button" value="Sair" onClick="Sair()"/>
		 </p>';
?>
