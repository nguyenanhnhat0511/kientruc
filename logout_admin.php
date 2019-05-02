<?php
	session_start();
	session_unset();
	$gClient->revokeToken();
	session_destroy();
	header('Location: login.php');
	exit();
?>