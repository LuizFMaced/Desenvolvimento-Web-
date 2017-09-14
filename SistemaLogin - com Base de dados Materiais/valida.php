<?php 
 date_default_timezone_set("Brazil/East");
 // session_start inicia a sessão
session_start();
// as variáveis login e senha recebem os dados digitados na página anterior
$login = $_POST['login'];
$senha = $_POST['senha'];

include"conecta_mysql.php";
$sqlVerifica="SELECT usuario, senha, nome FROM usuarios WHERE usuario = '$login'";
$rsVerifica = mysql_query($sqlVerifica);
mysql_close($conexao);

		if(mysql_num_rows($rsVerifica)>0){
			$tblPass = mysql_fetch_array($rsVerifica);
			//$encripta = $tblPass['senha'];
			$descripta = base64_decode($tblPass['senha']);

		if($senha == $descripta){
			$tblLogin = mysql_fetch_array($rsVerifica);
			$_SESSION['login'] = $tblLogin['usuario'];
			$_SESSION['senha'] = $tblLogin['senha'];
			$_SESSION['nome'] = $tblLogin['nome'];
			$_SESSION['statusLogin'] = 1;

			$_SESSION['msg'] = "Bem vindo " . $_SESSION['nome'] . "<br/>";
	    	$_SESSION['msg'] .= "Login efetuado em " . date('d-m-y H:i');
			
			header('location:administra.php');
		}
		else{
			$_SESSION['statusLogin'] = 0;
	    	$_SESSION['msg'] = "Dados Inválidos";
			header('location:index.php');
			//echo "senha digitada: $senha, \n senha no banco=$encripta\n senha original: $descripta ";
			}
	}else
		//echo "$usuario não existe!"
		header('location:index.php');
?>
