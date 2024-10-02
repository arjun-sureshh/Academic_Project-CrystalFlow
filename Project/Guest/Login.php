<?php
include("../Assets/Connection/Connection.php");
session_start();
if(isset($_POST['btn_submit']))
{
	$email = $_POST['txt_email'];	
    $password = $_POST['txt_password'];
	
	$selUser = "select * from tbl_shop where shop_email = '".$email."' and shop_password ='".$password."' and shop_vstatus='1'";
	$result1=$Conn->query($selUser);
	
	$selAdmin = "select * from tbl_admin where admin_email = '".$email."' and admin_password ='".$password."'";
	$result2=$Conn->query($selAdmin);
	
	$selcompany = "select * from tbl_company where company_email = '".$email."' and company_password ='".$password."' and company_vstatus='1'";
	$result3=$Conn->query($selcompany);
	
	if($result1->num_rows>0)
	{
		$row=$result1->fetch_assoc();
		$_SESSION['uid'] = $row['shop_id'];
		header('location:../shop/HomePage.php');
	}
	else if($result2->num_rows>0)
	{
		$row=$result2->fetch_assoc();
		$_SESSION['aid'] = $row['admin_id'];
		header('location:../Admin/HomePage.php');
	}
	else if($result3->num_rows>0)
	{
		$row=$result3->fetch_assoc();
		$_SESSION['cid'] = $row['company_id'];
		header('location:../Company/HomePage.php');
	}
	else
	{
		?>
    <script>
	alert("you don't have  an account here");
	window.location="Login.php";
	</script>
     <?php
	}

	
	
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>CRYSTAL_FLOW</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="../Assets/Template/Login/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../Assets/Template/Login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../Assets/Template/Login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../Assets/Template/Login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../Assets/Template/Login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../Assets/Template/Login/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../Assets/Template/Login/css/util.css">
	<link rel="stylesheet" type="text/css" href="../Assets/Template/Login/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="../Assets/Template/Login/images/img-01.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" method="post">
					<span class="login100-form-title">
					 Login
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="email" name="txt_email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="txt_password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button type="submit" name="btn_submit" class="login100-form-btn">
							Login
						</button>
					</div>


					<div class="text-center p-t-136">
						<a class="txt2" href="../Index.php">
							Create your Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="../Assets/Template/Login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../Assets/Template/Login/vendor/bootstrap/js/popper.js"></script>
	<script src="../Assets/Template/Login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="../Assets/Template/Login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="../Assets/Template/Login/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>