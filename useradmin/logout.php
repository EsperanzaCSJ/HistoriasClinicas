<?php
	session_start();

	include_once 'audit.php';
	audit($_SESSION['admin_id'], "Ha salido de la pagina", "admin");	
	
	unset($_SESSION['admin_id']);
	header('location:index.php');