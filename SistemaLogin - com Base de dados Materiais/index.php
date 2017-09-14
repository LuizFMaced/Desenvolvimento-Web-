<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8">
		<title>LOGIN</title>
		<link rel="stylesheet" type="text/css" href="css/login.css"></link>
	</head>
	<body>
			<h1>Identifique-se</h1><br/>
			<div class="moldura" align="center">
				<img id="sombra" src="img/moldura.jpg" width="365px" height="200px" />
					<div class="img" align="center">
						<img src="img/banner.gif" width="300px" height="150px" />
					</div>
				<form method="post" action="valida.php" align="center">					
					<div class="formulario" align="center">
						<label>Usuário : </label>
							<input type="text" name="login" id="login" required="required" pattern="[a-z\s]+$"/><br/>
						<label>Senha : </label>
							<input type="password" name="senha" id="senha" required="required" pattern="[0-9]+$"/></br>
						<p>
							<input type="reset" value="Limpar"/>
							<input type="submit" value="LOGAR"/>
						</p>
					</div>
				</form>
			</div>		
	</body>
</html>	
