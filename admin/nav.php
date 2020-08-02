
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