<?php
	
	if ( !isset ( $pagina ) ) {
		header("Location: index.php");
	}
	
	var_dump($_SESSION['usuario'])
?>


<h1>Bem vindo ao Menu!</h1>