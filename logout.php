<?php
	session_start();

	require_once "config.php";

	session_unset();


	$gClient->revokeToken();
	session_destroy();
	header('Location: login.php');
	exit();
?>