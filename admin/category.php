<?php require_once("../include/connect.php"); 
session_start();

if(!isset($_SESSION['admin_log'])){
	redirect('login');
}

?>
<html>
<head>
	<title>Find Biz</title>
	<!-- CSS only -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
</head>
<body>
<div class="navbar navbar-expand-lg navbar-dark bg-dark">
	<div class="container">

	<a href="index.php" class="navbar-brand">Admin Panel | Find Biz</a>

	<ul class="navbar-nav ml-auto">
		
		
		<?php 
		if(isset($_SESSION['admin_log'])):?>
		<li class="nav-item">
			<a href="logout.php" class="btn btn-danger">Logout</a>
		</li>
		<?php else: ?>
		<li class="nav-item">
			<a href="login.php" class="btn btn-primary">Login</a>
		</li>
		<?php endif;?>
	</ul>
</div>
</div>

<div class="container mt-5">
<div class="row">
		<div class="col-lg-3">
		<!-- category-->
			<?php include "side.php";?>
		</div>
		
		<div class="col-lg-9">
				<div class="row">
						<div class="col-lg-8">
						
							<table class="table table-striped">
								<tr>
									<th>Id</th>
									<th>title</th>
									<th>Description</th>
									<th>Action</th>
								</tr>
								<?php 
								$cat_calling = callingQuery("select * from categories");
								foreach($cat_calling as $cat):
								?>
								<tr>
									<td><?= $cat['cat_id'];?></td>
									<td><?= $cat['cat_title'];?></td>
									<td><?= $cat['cat_description'];?></td>
									<td>
										<a href="" class="btn btn-info btn-sm">Edit</a>
										<a href="category_delete.php?delete_cat=<?= $cat['cat_id'];?>" class="btn btn-danger btn-sm">Delete</a>
									</td>
								</tr>

								<?php endforeach;?>

							</table>
						</div>
						<div class="col-lg-4">
							<form action="category.php" method="post">
									<div class="mb-3">
										<label>category title</label>
										<input type="text" class="form-control" name="cat_title">
									</div>
									<div class="mb-3">
										<label>category Description</label>
										<textarea rows="5" class="form-control" name="cat_description"></textarea>
									</div>
									
									<div class="mb-3">
										<input type="submit" class="btn btn-success btn-block" name="cat_insert">
									</div>
							</form>

							<?php 

							if(isset($_POST['cat_insert'])){
								$cat_title = $_POST['cat_title'];
								$cat_description = $_POST['cat_description'];

								$query = "INSERT INTO categories (cat_title,cat_description) value ('$cat_title','$cat_description')";

								if(runQuery($query)){
									redirect('category');
								}
								else{
									echo "fail";
								}
							}
							?>
						</div>
				</div>
		</div>

</div>