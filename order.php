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
                            <a class="nav-link active" href="index.php">Home</a>
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
                            <a class="nav-link" href="sell.php">Sell</a>
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
    <?php
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        
    $name    = $fm->validation($_POST['name']);
    $id      = $fm->validation($_POST['id']);
    $address = $fm->validation($_POST['address']);
    $phone   = $fm->validation($_POST['phone']);
    $email   = $fm->validation($_POST['email']);
        
    $name    = mysqli_real_escape_string($db->link,$name);
    $id      = mysqli_real_escape_string($db->link,$id);
    $address = mysqli_real_escape_string($db->link,$address);
    $phone   = mysqli_real_escape_string($db->link,$phone);
    $email   = mysqli_real_escape_string($db->link,$email);
    
    if($name == ""|| $address == ""|| $phone == ""|| $email == "")
    {
        $error = "Any of the field should not be empty.";
    }
    elseif(!filter_var($email,FILTER_VALIDATE_EMAIL))
    {
        $error = "Invalid email..";
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
		if($check == $email)
		{
			$error = "You are blocked.";               
			goto again;
		}
		}
		$sql = "insert into tbl_order(name,address,phone,email,book_id) 
        values('$name', '$address', '$phone', '$email','$id')";
        $order = $db->insert($sql);
        if($order)
        {
            $msg = "Order sent successfully.Thank you.Admin will soon contact you.";

        }
        else
        {
            $error = "Something wrong.Order not sent.";               
        }
		}
	again:
    }
}
    ?>
    <section id="order">
        <div class="color-overlay">
            <div class="container">
                <form action="" method="post">
                    <div class="card  bg-dark text-center my-2 uk-animation-scale-down">
                        <div class="card-header text-center">
                            <h2 class="text-light">
                                Order Book
                            </h2>
                        </div>
                        <?php
                        if(isset($error))
                        {
                            echo "<span class='warning'>$error</span>";
                        }
                        if(isset($msg))
                        {
                            echo "<span class='success'>$msg</span>";
                        }
                        ?>
                        <div class="card-body">
                            <div class="row">
                            <?php
                            $id = $_GET['id'];
                            $sql = "select * from sell where id = '$id'";
                            $order_book = $db->select($sql);
                            if($order_book)
                            {
                            foreach($order_book as $result)
                            {
                        
            ?>
                                <table style="width:100%">
                                    <tr>
                                        <th class="text-light">Course:</th>
                                        <th>
                                            <div class="col-md-8">
                                                <div class="form-group mt-3">
                                                    <input type="text" name="name" class="form-control" readonly value="<?php echo $result['course']; ?>">
                                                </div>
                                            </div>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th class="text-light">Book_id:</th>
                                        <th>
                                            <div class="col-md-8">
                                                <div class="form-group mt-3">
                                                    <input type="text" name="id" class="form-control" readonly  value="<?php echo $result['id']; ?>">
                                                </div>
                                            </div>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th class="text-light">Address:</th>
                                        <th>
                                            <div class="col-md-8">
                                                <div class="form-group mt-3">
                                                    <input type="text" name="address" class="form-control" placeholder="Enter your address">
                                                </div>
                                            </div>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th class="text-light">Cell:</th>
                                        <td>
                                            <div class="col-md-8 mt-3">
                                                <div class="form-group">
                                                    <input type="text" name="phone" class="form-control" placeholder="Enter your phone number">
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="text-light">Conatct Mail:</th>
                                        <td>
                                            <div class="col-md-8 mt-3">
                                                <div class="form-group">
                                                    <input type="text" name="email" class="form-control" placeholder="Enter your email">
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <?php } } ?>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-block ">Send</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!--footer-->
    <?php include "inc/footer.php"?>
