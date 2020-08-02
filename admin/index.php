<?php require_once("../include/connect.php"); 
session_start();

if(!isset($_SESSION['admin_log'])){
	redirect('login');
}

?><html>
<head>
	<title>Find Biz</title>
	<!-- CSS only -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
</head>
<body>
<?php include "nav.php";?>
<div class="container mt-5">
	
	<div class="row">
		<div class="col-lg-3">
		<!-- category-->
			<?php include "side.php";?>
		</div>
		
		<div class="col-lg-9">
			
			<div class="bg-light text-dark p-5 rounded">
					<h2 class="mb-4">Welcome in BizFinder Admin Panel</h2>

					<a href="insert_biz.php" class="btn btn-success btn-lg">Insert Business Records</a>
					<a href="category.php" class="btn btn-warning btn-lg">Insert category</a>
			</div>
			
		
		</div>
		
	</div>
</div>
</body>
</html>