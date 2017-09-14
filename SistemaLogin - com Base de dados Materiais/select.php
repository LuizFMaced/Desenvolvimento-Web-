<?php
	session_start();
  		if($_SESSION['statusLogin'] == 0)
	   		header('location:index.php');
 	
 	echo '<link rel="stylesheet" type="text/css" href="css/gerencia.css"></link>';
	
	header('Content-type: text/html; charset=ISO-8859-1');
	include "conecta_mysql.php";
	if (isset($_POST["executar"]))
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
		echo "<p><b>".$linhas." linhas encontradas!<b></p>";	
		}
	}
	mysql_close($conexao);
	echo '<script type="text/javascript" src="js/cadastra.js"></script>';
	echo '<p>
			<input id="voltar" type="button" value="Voltar" onClick="Nova()"/>
			<input id="sair" type="button" value="Sair" onClick="Sair()"/>
		 </p>';
?>