<section id="accordian sidebar" class="pt-4 bg-dark">
	<div class="container">
		<div class="row text-center py-3 text-light">
			<div class="col">
				<h2>Sidebar</h2>
				<hr class="bg-light">
			</div>
		</div>
		<div class="row">
			<div class="col">
				<div class="card rounded my-2 bg-light text-dark">
					<div class="card-header" id="heading1">
						<h5 href="#collapse1" data-toggle="collapse" class="text-dark">
							<a class="mb-0">
								<h4 class="text-center m-0 p-0">Admin Panel</h4>
							</a>
						</h5>
					</div>
					<div id="collapse1" class="collapse p-2" data-parent="#accordian">
						<?php
                        if(Session::get('role') == '0')
						{
						?>
						<h5><a href="addadmin.php" class="btn btn-dark">Add Admin</a></h5>
						<?php } ?>
						<h5><a href="adminlist.php" class="btn btn-dark">Admin List</a></h5>
						<h5><a href="block.php" class="btn btn-dark">Block User</a></h5>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<div class="card my-2 bg-light text-dark">
					<div class="card-header" id="heading1">
						<h5 href="#collapse2" data-toggle="collapse" class="text-dark">
							<a class="mb-0">
								<h4 class="text-center m-0 p-0">Post Option</h4>
							</a>
						</h5>
					</div>
					<div id="collapse2" class="collapse p-2" data-parent="#accordian">
						<h5><a href="addpost.php" class="btn btn-dark">Add Post</a></h5>
						<h5><a href="postlist.php" class="btn btn-dark">Post list</a></h5>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<div class="card my-2 bg-light text-dark">
					<div class="card-header" id="heading1">
						<h5 href="#collapse3" data-toggle="collapse" class="text-dark">
							<a class="mb-0">
								<h4 class="text-center m-0 p-0">Page Option</h4>
							</a>
						</h5>
					</div>
					<div id="collapse3" class="collapse p-2" data-parent="#accordian">
						<h5><a href="addpage.php" class="btn btn-dark">Add Page</a></h5>
						<?php 
					$sql  = "select * from tbl_page";
					$page = $db->select($sql);
					if($page)
					{
						foreach($page as $result)
						{
							
						
					
					?>
						<a class="btn btn-success" href="about.php ?id=<?php echo $result['id'];?>">
							<h5><?php echo $result['name'];?></h5>
						</a>
						<?php } } ?>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<div class="card mb-4 bg-light text-dark">
					<div class="card-header " id="heading1">
						<h5 class="text-dark">
							<a class="mb-0" href="social.php" style="text-decoration:none;">
								<h4 class="text-center text-dark m-0 p-0">Social Option</h4>
							</a>
						</h5>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
