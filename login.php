<?php
    require_once "config.php";
    require_once "connect.php";
	if (isset($_SESSION['access_token'])) {
		header('Location: index.php');
		exit();
	}
	if (isset($_SESSION['username']))
    {
        header("refresh:1 ; url = index.php");
        echo 'User has been signed in. Redirecting to portal ...';
        die(); // stop redering the rest of the page
    }
    if (isset($_SESSION['admin']))
    {
        header("refresh:1 ; url = admin.php");
        echo 'Đăng nhập vào admin ...';
        die(); // stop redering the rest of the page
    }

	$loginURL = $gClient->createAuthUrl();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V16</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="img/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>


	<?php
    	

    //otherwise, user must sign in to access 'ci.php'page
    $msg = '';
    if (isset($_POST['login'])&& !empty($_POST['username'])&& !empty($_POST['password']))
    {
        $ch = curl_init();
        $username = $_POST['username'];

        curl_setopt($ch, CURLOPT_URL, "http://localhost:8081/bai4/rest/services/sign-in-secure/");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array('username' => $_POST['username'],'password' => $_POST['password'])));
    
        //receive server's respone
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $server_output = curl_exec($ch);
        curl_close($ch);
        
        if($server_output == "true")
        {
            $_SESSION['valid'] = true;
            $_SESSION['timeout'] = time();
            $sql = "SELECT * FROM Customer where username ='$username'";


            $result = mysqli_query($conn, $sql);

			if (mysqli_num_rows($result) > 0) {
			    // output data of each row
			    while($row = mysqli_fetch_assoc($result)) {
			    	  $_SESSION['email'] = $row['email'];
            		$_SESSION['familyName'] = $row['name'];
            		$_SESSION['id'] = $row['id'];




			    	if($row['status'] == 1 ){
			    		$_SESSION['username'] = $_POST['username'];
			    		header("location: index.php");
			    		exit();

			    	}else{
			    		$_SESSION['admin'] = $_POST['username'];
			    		header("location: admin.php");

			    		exit();
			    	}

            die();

        }
    }


        }
        else{
            $msg = 'You have entered an invalid username or password';
        }
    }
?>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('img/bg-01.jpg');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
						Account Login
				</span>
				<form class="login100-form validate-form p-b-33 p-t-5" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="username" placeholder="User name">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>

					<div class="container-login100-form-btn m-t-32">
						<button type="submit" name="login" class="login100-form-btn">
							Login
						</button>
					</div>
					<div>
					<a href="forgot-password.php">Forget password </a><br/>
					<a href="register.php">Regiter</a></div>
					 <input style="display:block; margin:0 auto" type="button" onclick="window.location = '<?php echo $loginURL ?>';" value="Log In With Google" class="btn btn-danger">
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>