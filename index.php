<?php require_once("include/connect.php"); ?>
<html>
<head>
	<title>Find Biz</title>
	<!-- CSS only -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
</head>
<body>
<?php include_once("include/navbar.php");?>

<div class="container mt-5">
	
	<div class="row">
		<div class="col-lg-3">
		<!-- category-->
			<?php include "side.php";?>
		</div>
		
		<div class="col-lg-9">
			
			<!--business list-->

			<div class="row">
			<?php 

				if(isset($_GET['find'])){
					$search = $_GET['search'];

					$calling = callingQuery("SELECT * FROM records JOIN categories ON records.category = categories.cat_id where records.title LIKE '%$search%'");
				
				}
				
				else{
				
					$calling = callingQuery("SELECT * FROM records JOIN categories ON records.category = categories.cat_id");
				
				}
			
				
			
			foreach($calling as $data):
				?>
				<div class="col-lg-12">
					<div class="card mb-2 bg-light">
						<div class="row">
							<div class="col-lg-4">
								<img src="photo/<?= $data['image1'];?>" class="w-100" style="object-fit: contain;height: 220px;">
							</div>
							<div class="col-lg-8">
								<div class="card-body">
									<h5 class="text-uppercase text-truncate"><?= $data['title'];?></h5>
									<span class="badge bg-primary"><?= $data['cat_title'];?></span>
									<p class="small text-justify"><?= $data['description'];?></p>

									<h5 class="text-muted float-left"><?php echo $data['primary_contact']; if($data['secondary_contact']!=''){echo ", " .$data['secondary_contact'];}?> </h5>

									<h5 class="text-muted float-right"><?= $data['email'];?> </h5>
									<div class="clearfix"></div>
									<a href="biz.php?biz_id=<?= $data['b_id'];?>" class="btn btn-success float-right">Read More</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach;?>
			</div>
		
		</div>
		
	</div>
</div>
</body>
</html>