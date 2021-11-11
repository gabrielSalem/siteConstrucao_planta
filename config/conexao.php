<?php
	$conexao = mysqli_connect("localhost", "root", "", "desenho") or die (mysqli_connect_error());
	mysqli_set_charset($conexao, "utf-8");
	mysql_set_charset('utf8',$conexao);
?>