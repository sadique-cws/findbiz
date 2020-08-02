<?php require_once("../include/connect.php"); 
session_start();

if(isset($_SESSION['admin_log'])){
	redirect('index');
}

?>
<html>
<head>
	<title>Find Biz</title>
	<!-- CSS only -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
</head>
<body><?php include "nav.php";?>

<div class="container mt-5">
	
	<div class="row">
		<div class="col-lg-3 mx-auto">
				<form action="login.php" method="post">
					<div class="mb-3">
						<label>username</label>
						<input type="text" class="form-control" name="username">
					</div>
					<div class="mb-3">
						<label>password</label>
						<input type="password" class="form-control" name="password">
					</div>
					<div class="mb-3">
						<input type="submit" class="btn btn-success btn-block" name="admin_login">
					</div>
				</form>
		</div>
		

		<?php 

		if(isset($_POST['admin_login'])){
			$username = $_POST['username'];
			$password = $_POST['password'];

			$query = "SELECT * FROM admin where username='$username' AND password='$password'";

			if(checkQuery($query)){
					$_SESSION['admin_log'] = $username;
					redirect('index');
			}
			else{
				echo "fail";
			}

		}


		?>


	</div>
</div>
</body>
</html>