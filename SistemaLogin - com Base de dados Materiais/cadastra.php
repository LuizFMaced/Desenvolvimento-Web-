<?php
session_start();
  if($_SESSION['statusLogin'] == 0)
	   header('location:index.php');
?>

<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8">
		<title>CADASTRE-SE</title>
		<script type="text/javascript" src="js/cadastra.js"></script>
		<link rel="stylesheet" type="text/css" href="css/cadastra.css"></link>
	</head>
	<body>
	<fieldset style="width:301px" style="heigth:136px">
			<legend>Criar novo usuário</legend><br />
		    <img src="img/contrato.png" width="365px" height="500px">
		    
		    <form name="frm" method="POST" action="envia_dados.php" onsubmit="return validaCampos(this);">
					<div align="center">
						<p>Usuário : <input type="text" name="usuario" ></p>
						<p> Senha : <input type="password" name="senha" /></p>
					</div>

					<div align="center">
						<p>Nome : <input type="text" name="nome" /></p>
					</div>

					<div align="center">
						<p>E-mail : <input type="email" name="email" /></p>
					</div>

					<div align="center">
						<p>Cidade : <input type="text" name="cidade" /></p> 
						<p>Estado : <input type="text" name="estado" size="2" maxlength="2" /></p>
					</div>

					<div align="center">
						<p><input type="reset" value="Limpar">
						<input type="submit" value="Enviar" name="enviar"></p>
						<p><input id="voltar" type="button" value="Voltar" onClick="Nova()"/></p>
						<input id="sair" type="button" value="Sair" onClick="Sair()"/>
					</div>
		</form>
	</fieldset>
	</body>
</html>	
