<?php include "inc/header.php"?>
<?php 
    $db = new database();
    $fm = new Formate();
?>

<body>
	<!--navigation-->
	<section id="nav">
		<nav class="navbar   navbar-dark bg-dark navbar-expand-md" uk-sticky="top: 100; animation: uk-animation-slide-top; bottom: #sticky-on-scroll-up">
			<div class="container">
				<a class="navbar-brand text-light" href="index.php">
					<img src="img/book.jpg" width="50" height="40" class="d-inline-block align-top" alt="" loading="lazy">
					Book_Exchange
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item ">
							<a class="nav-link" href="index.php">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="about.php">About us</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Semester
							</a>
							<div class="dropdown-menu bg-dark " aria-labelledby="navbarDropdown">
								<a class="dropdown-item text-danger" href="semester1.php">Semester 01</a>
								<a class="dropdown-item text-danger" href="semester2.php">Semester 02</a>
								<a class="dropdown-item text-danger" href="semester3.php">Semester 03</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item text-danger" href="else.php">Else</a>
							</div>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="contact.php">Contact</a>
						</li>
						<li class="nav-item">
							<a class="nav-link active" href="sell.php">Sell</a>
						</li>
					<?php 
					$sql  = "select * from tbl_page where name='DMCA'";
					$page = $db->select($sql);
					if($page)
					{
						foreach($page as $result)
						{
					?>
					<li class="nav-item">
                            <a class="nav-link" href="dmca.php"><?php echo $result['name'];?></a>
                    </li>
					<?php	
						} }
					?>
					</ul>
					<form class="form-inline my-2 ml-2 my-lg-0" action="search.php" method="get">
						<input class="form-control mr-sm-2" type="search" name="book" placeholder="Search" aria-label="Search">
						<button class="btn btn-outline-secondary text-light my-2 my-sm-0" type="submit">Search</button>
					</form>
				</div>
			</div>
		</nav>
	</section>
	<!--Sell-->
	<section id="sell">
		<div class="color-overlay">
			<div class="container">
				<form action="" method="post" enctype="multipart/form-data">
					<div class="card  bg-dark text-center my-2 uk-animation-scale-up">
						<div class="card-header text-center">
							<h2 class="text-light">
								Sell Book
							</h2>
						</div>
						<?php

?>
						<?php
		
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
    $course   = $fm->validation($_POST['course']);
    $writer   = $fm->validation($_POST['writer']);
    $edition  = $fm->validation($_POST['edition']);
    $semester = $fm->validation($_POST['semester']);
    $price    = $fm->validation($_POST['price']);
    $mail     = $fm->validation($_POST['mail']);
    $permited= array('png','jpg','gif','jpeg');
    $filename = $_FILES['image']['name'];
    $filesize = $_FILES['image']['size'];
    $file_temp = $_FILES['image']['tmp_name'];
    $div      = explode('.',$filename);
    $file_ext  = strtolower(end($div));
    $unique_image   = substr(md5(time()), 0, 10).'.'.$file_ext;
    $uploaded_image = "uploads/".$unique_image;


    
    $course   = mysqli_real_escape_string($db->link,$course);
    $writer   = mysqli_real_escape_string($db->link,$writer);
    $edition   = mysqli_real_escape_string($db->link,$edition);
    $semester   = mysqli_real_escape_string($db->link,$semester);
    $price   = mysqli_real_escape_string($db->link,$price);
    $mail   = mysqli_real_escape_string($db->link,$mail);
    
    if($course == ""|| $writer == ""|| $edition == ""|| $semester == ""|| $price == ""|| $mail == ""|| $filename == "")
    {
        echo "<span class='warning'>Any of the field should not be empty</span>";
    }
    elseif(!filter_var($mail,FILTER_VALIDATE_EMAIL))
    {
        echo "<span class='warning'>Invalid Email</span>";
    }
    elseif($filesize >1024000)
    {
         echo "<span class='warning'>Image Size should be less then 1MB!</span>";
    }
                    
    elseif(in_array($file_ext, $permited) === false)
    {
        echo "<span class='warning'>You can upload only:-".implode(', ', $permited)."</span>";
    }
    else
    {
		$query   = "select email from tbl_block";
		$block = $db->select($query);
		if($block)
		{
		foreach($block as $result)
		{
		$check = $result['email'];
		if($check == $mail)
		{
			echo "<span class='warning'>You are blocked!</span>";
			goto again;
		}
		}
		move_uploaded_file($file_temp, $uploaded_image);
        $sql = "insert into sell(course,writer,edition,semester,price,mail,status,image) values('$course','$writer','$edition','$semester','$price','$mail',1,'$uploaded_image')";
        $sell_book = $db->insert($sql);
        if($sell_book)
        {
            echo "<span class='success'>Thank you.Request Sent to admin successfull.Admin will let you know.</span>";   
        }
        else
        {
            echo "<span class='warning'>Sorry Message not Sent!</span>";               
        }
		}
		again:	
	}

}

?>
						<div class="card-body">
							<div class="row">
								<table style="width:100%">
									<tr>
										<th class="text-light">Course:</th>
										<th>
											<div class="col-md-8">
												<div class="form-group mt-3">
													<input type="text" class="form-control" placeholder="Enter course name" name="course">
												</div>
											</div>
										</th>
									</tr>
									<tr>
										<th class="text-light">Writer:</th>
										<th>
											<div class="col-md-8">
												<div class="form-group mt-3">
													<input type="text" class="form-control" placeholder="Enter writer name" name="writer">
												</div>
											</div>
										</th>
									</tr>
									<tr>
										<th class="text-light">Edition:</th>
										<td>
											<div class="col-md-8 mt-3">
												<div class="form-group">
													<input type="text" class="form-control" placeholder="Enter edition" name="edition">
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<th class="text-light">Semester:</th>
										<td>
											<div class="col-md-8 mt-3">
												<div class="form-group">
													<input type="text" class="form-control" placeholder="Enter semester" name="semester">
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<th class="text-light">Price:</th>
										<td>
											<div class="col-md-8 mt-3">
												<div class="form-group">
													<input type="text" class="form-control" placeholder="Enter price" name="price">
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<th class="text-light">Conatct Mail:</th>
										<td>
											<div class="col-md-8 mt-3">
												<div class="form-group">
													<input type="text" class="form-control" placeholder="Enter Mail" name="mail">
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<th class="text-light">Image:</th>
										<td>
											<div class="col-md-8 mt-3">
												<div class="form-group">
													<input type="file" name="image" class="btn  form-control">
												</div>
											</div>
										</td>
									</tr>
								</table>
							</div>
						</div>
						<div class="card-footer">
							<button class="btn btn-block">Send</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</section>
	<!--footer-->
	<?php include "inc/footer.php"?>
