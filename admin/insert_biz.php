<?php require_once("../include/connect.php"); 
session_start();

if(!isset($_SESSION['admin_log'])){
	redirect('login');
}


$titleError = $ownerError = $primary_contactError = $secondary_contactError = $emailError = $descriptionError = $streetError = $cityError = $stateError = $pincodeError =  "";

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

				<?php 
			if(isset($_POST['insert'])){

				$title  = $_POST['title'];
				$owner  = $_POST['owner'];
				$primary_contact  = $_POST['primary_contact'];
				$secondary_contact  = $_POST['secondary_contact'];
				$email  = $_POST['email'];
				$category  = $_POST['category'];
				$description  = $_POST['description'];
				$street  = $_POST['street'];
				$city  = $_POST['city'];
				$state  = $_POST['state'];
				$pincode  = $_POST['pincode'];


				if(!preg_match('/^[A-z ]+$/', $title)){
					$titleError = "Please check Title its only contain Aplhabet";
				}
				elseif (!preg_match('/^[A-z ]+$/', $owner)){
					$ownerError = "please check onwer fields its invalid";
				}
				elseif(!preg_match('/^[0-9]{10}$/', $primary_contact)){
					$primary_contactError = "contact must be in digit with 10 length";
				}
				elseif(!preg_match('/^[0-9]{10}$/', $secondary_contact)){
					$secondary_contactError = "contact must be in digit with 10 length";
				}
				elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
					$emailError = "Invalid Email please check";
				}
				elseif(!preg_match('/^[A-z]{10,}$/', $description)){
					$descriptionError = "description is too short it must be  more then 10 characters";
				}
				elseif(!preg_match('/^[0-9A-z ]{3,}$/', $street)){
					$streetError = "street is invalid";
				}
				elseif(!preg_match('/^[A-z ]{3,}$/', $city)){
					$cityError = "City must be in string";
				}
				elseif(!preg_match('/^[A-z ]{3,}$/', $state)){
					$stateError = "state must be in string";
				}
				elseif(!preg_match('/^[0-9]{6}$/', $pincode)){
					$pincodeError = "PINCODE must be in 6 digit length";
				}
				else{
				$image1  = $_FILES['image1']['name'];
				$image2  = $_FILES['image2']['name'];

				$tmp_image1  = $_FILES['image1']['tmp_name'];
				$tmp_image2  = $_FILES['image2']['tmp_name'];

				move_uploaded_file($tmp_image1,"../photo/$image1");
				move_uploaded_file($tmp_image2,"../photo/$image2");

				$query = "INSERT INTO records (title,owner,primary_contact,secondary_contact,email,category,description,street,city,state,pincode,image1,image2) 
				value('$title','$owner','$primary_contact','$secondary_contact','$email','$category','$description','$street','$city','$state','$pincode','$image1','$image2')";

				if(runQuery($query)){
					redirect('biz');
				}
				else{
					echo "fail";
				}
				}
			}


			?>

			<form action="insert_biz.php" method="post" enctype="multipart/form-data">
				
				<div class="mb-3">
					<label>title</label>
					<input type="text" name="title" class="form-control" value="<?php if(isset($_POST['insert'])){echo $_POST['title'];}?>">
					<?php 
					if($titleError != ""){
						echo "<p class='small text-danger'>$titleError</p>";
					}
					?>
				</div>
				<div class="mb-3">
					<label>owner</label>
					<input type="text" name="owner" class="form-control" value="<?php if(isset($_POST['insert'])){echo $_POST['owner'];}?>">
					<?php 
					if($ownerError != ""){
						echo "<p class='small text-danger'>$ownerError</p>";
					}
					?>
				</div>
				<div class="row">
						<div class="mb-3 col-6">
					<label>primary_contact</label>
					<input type="text" name="primary_contact" class="form-control" value="<?php if(isset($_POST['insert'])){echo $_POST['primary_contact'];}?>">
						<?php 
					if($primary_contactError != ""){
						echo "<p class='small text-danger'>$primary_contactError</p>";
					}
					?>
				</div>
				<div class="mb-3 col-6">
					<label>secondary_contact</label>
					<input type="text" name="secondary_contact" class="form-control" value="<?php if(isset($_POST['insert'])){echo $_POST['secondary_contact'];}?>">
						<?php 
					if($secondary_contactError != ""){
						echo "<p class='small text-danger'>$secondary_contactError</p>";
					}
					?>
				</div>
				</div>
				<div class="mb-3">
					<label>email</label>
					<input type="text" name="email" class="form-control" value="<?php if(isset($_POST['insert'])){echo $_POST['email'];}?>">
					<?php 
					if($emailError != ""){
						echo "<p class='small text-danger'>$emailError</p>";
					}
					?>
				</div>
				<div class="mb-3">
					<label>category</label>
					<select name="category" class="form-control">
						<?php 
								$cat_calling = callingQuery("select * from categories");
								foreach($cat_calling as $cat):
								?>
								<option value="<?= $cat['cat_id'];?>"><?= $cat['cat_title'];?></option>

								<?php endforeach;?>
					</select>
				</div>
				<div class="mb-3">
					<label>description</label>
					<textarea rows="5" name="description" class="form-control"><?php if(isset($_POST['insert'])){echo $_POST['description'];}?></textarea>
					<?php 
					if($descriptionError != ""){
						echo "<p class='small text-danger'>$descriptionError</p>";
					}
					?>
				</div>
				<div class="row">
					<div class="mb-3 col-3">
						<label>street</label>
						<input type="text" name="street" class="form-control" value="<?php if(isset($_POST['insert'])){echo $_POST['street'];}?>">
						<?php 
					if($streetError != ""){
						echo "<p class='small text-danger'>$streetError</p>";
					}
					?>
					</div>
					<div class="mb-3 col-3">
						<label>city</label>
						<input type="text" name="city" class="form-control" value="<?php if(isset($_POST['insert'])){echo $_POST['city'];}?>">
						<?php 
					if($cityError != ""){
						echo "<p class='small text-danger'>$cityError</p>";
					}
					?>
					</div>
					<div class="mb-3 col-3">
						<label>state</label>
						<input type="text" name="state" class="form-control" value="<?php if(isset($_POST['insert'])){echo $_POST['state'];}?>">
						<?php 
					if($stateError != ""){
						echo "<p class='small text-danger'>$stateError</p>";
					}
					?>
					</div>
					<div class="mb-3 col-3">
						<label>pincode</label>
						<input type="text" name="pincode" class="form-control" value="<?php if(isset($_POST['insert'])){echo $_POST['pincode'];}?>">
						<?php 
					if($pincodeError != ""){
						echo "<p class='small text-danger'>$pincodeError</p>";
					}
					?>
					</div>
				</div>
				<div class="row">
					<div class="mb-3 col-6">
						<label>image1</label>
						<input type="file" name="image1" class="form-control">
					</div>
					<div class="mb-3 col-6">
						<label>image2</label>
						<input type="file" name="image2" class="form-control">
					</div>
				</div>
				
				<div class="mb-3">
					<input type="submit" name="insert" class="btn btn-success btn-block">
				</div>

			</form>


		

		</div>
</div>
</body>
</html>