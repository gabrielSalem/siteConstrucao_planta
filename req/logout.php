<?php
	session_start();
	unset($_SESSION["USUARIO"]);
	unset($_SESSION["ADMIN"]);
	header("location: ../index.php");