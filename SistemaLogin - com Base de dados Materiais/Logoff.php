<?php

session_start();
	$_SESSION['nome'] = "";
    $_SESSION['login'] = "";
    $_SESSION['senha'] = "";
    $_SESSION['statusLogin'] = 0;    
    $_SESSION['msg'] = "";
    
    session_destroy();

    header("location:index.php");
    
    
    
?>