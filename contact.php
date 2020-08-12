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
                            <a class="nav-link active" href="contact.php">Contact</a>
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
    <?php
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        
    $fname   = $fm->validation($_POST['fname']);
    $lname   = $fm->validation($_POST['lname']);
    $email  = $fm->validation($_POST['email']);
    $phone = $fm->validation($_POST['phone']);
    $text    = $fm->validation($_POST['text']);
        
    $fname   = mysqli_real_escape_string($db->link,$fname);
    $lname   = mysqli_real_escape_string($db->link,$lname);
    $email   = mysqli_real_escape_string($db->link,$email);
    $phone   = mysqli_real_escape_string($db->link,$phone);
    $text   = mysqli_real_escape_string($db->link,$text);
    
    if($fname == ""|| $lname == ""|| $email == ""|| $phone == ""|| $text == "")
    {
        $error = "Any of the field should not be empty.";
    }
    elseif(!filter_var($email,FILTER_VALIDATE_EMAIL))
    {
        $error = "Invalid email..";
    }
    else
    {
        $sql = "insert into contact(fname,lname,email,phone,message) values('$fname','$lname','$email','$phone','$text')";
        $contact = $db->insert($sql);
        if($contact)
        {
            $msg = "Message sent successfully.Thank you";

        }
        else
        {
            $error = "Something wrong.Message not sent.";               
        }
    }
    }
    ?>
    <!--image-->
    <div id="image">
        <div class="dark-overlay">
        </div>
        <h2>Feel free to contact us</h2>
    </div>
    <hr class="bg-success">
    <!--contact-->
    
    <section id="from">
        <div class="container">
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
            <div class="row">
                <div class="col-md-8">
                    <form action="" method="post">
                        <div class="card">
                            <div class="card-body text-center">
                                <h1>Please Fill this form </h1>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="fname" placeholder="Enter your first name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="lname" placeholder="Enter your last name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="Email" class="form-control" name="email" placeholder="Enter email">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="phone" placeholder="Enter Phone">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea  rows="10" cols="30" class="form-control" name="text">
                                            </textarea>
                                            <button class="btn btn-block btn-primary mt-3">Send</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card">
                            <div class="card-body">
                                <h4>Get in touch</h4>
                                <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur, molestias.</p>
                                <h4>Address</h4>
                                <p>Mirpur</p>
                                <h4>Email</h4>
                                <p class="lead">hossainalamin980@gmail.com</p>
                                <h4>Phone</h4>
                                <p class="lead mb-2">01934987143</p>
                                <p class="lead">01515283568</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <!--footer-->
    <?php include "inc/footer.php"?>
