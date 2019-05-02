<?php
	session_start();
	require_once "GoogleAPI/vendor/autoload.php";
	$gClient = new Google_Client();
	$gClient->setClientId("665319937987-tqj57agin32rqk51rg6v0ccocia6429k.apps.googleusercontent.com");
	$gClient->setClientSecret("LVT34g9er9A7jgh_8GYfeVsP");
	$gClient->setApplicationName("CPI Login Tutorial");
	$gClient->setRedirectUri("http://localhost/shop/g-callback.php");
	$gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");
?>
