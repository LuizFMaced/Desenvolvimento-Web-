<?php
session_start();
  if($_SESSION['statusLogin'] == 0)
     header('location:index.php');

echo ' <link rel="stylesheet" type="text/css" href="css/gerencia.css"></link>'; 

$usuario = $_POST["usuario"];
$senha = 	base64_encode($_POST["senha"]);
$nome = 	$_POST["nome"];
$email = 	$_POST["email"];
$cidade = 	$_POST["cidade"];
$estado = 	$_POST["estado"];

$erro=0;

	if (empty($nome)){
	echo '<p align="center">Por favor, digitar seu nome corretamente.</p>';
	 	$erro.=1; 
	 }

		if (empty($cidade)){	
			echo '<p align="center">Por favor, digitar sua cidade.</p>';
			 $erro.=1;
		 }


			if (strlen($estado)!=2){	
				echo '<p align="center">Por favor, digitar seu estado corretamente.</p>'; 
				$erro.=1; 
			}
			
				if (strlen($usuario)<3){
					echo '<p align="center">O usuario deve possui no minimo 4 caracteres.</p>';  
					$erro.=1; 
				}

					if (strlen($senha)<8){	
						echo '<p align="center">A senha deve possui no minimo 8 caracteres.</p>';
						 $erro.=1;   
					}

						if ($usuario == $senha){
							echo '<p align="center">O usuario e a senha devem ser diferentes.</p>';
							 $erro.=1;
							}

							if (strlen($email)<8 || strstr ($email, '@')==FALSE){	
								echo '<p align="center">Favor digitar seu e-mail corretamente.</p>'; 
								$erro.=1; 
							}

	if($erro == 0){
		include"conecta_mysql.php";
		$sql = "INSERT INTO usuarios (usuario, senha, nome, email, cidade, estado) values ";
		$sql .= "('$usuario','$senha','$nome','$email','$cidade','$estado')";
		mysql_query($sql);
		mysql_close($conexao);
		echo "Cadastrado com sucesso!";
		echo '<p align="center"><a href="administra.php"><input type="button"value="Voltar"></a></p>';
	}
		else
			echo  '<p align="center"><a href="cadastra.php"><input type="button"value="Voltar"></a></p>';

	
?>

