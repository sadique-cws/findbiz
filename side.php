<div class="list-group">
				<a href="#" class="list-group-item list-group-item-action active">Categories</a>
				<!-- todo : calling categories -->
				<?php 
				$result = callingQuery("select * from categories");
				foreach($result as $data):
				?>
				<a href="category.php?cat=<?= $data['cat_id'];?>" class="list-group-item list-group-item-action"><?= $data['cat_title'];?></a>

				<?php endforeach;?>
			</div>