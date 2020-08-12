<?php 
include "inc/header.php";
$db = new database();
$fm = new formate();
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
                            <a class="nav-link active" href="about.php">About us</a>
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
    <!--main-->
    <section id="about" class="text-center text-light">
        <div class="container">
            <div class="row">
                <div class="col pt-5">
                    <h2>About us</h2>
                    <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum, incidunt!</p>
                </div>
            </div>
        </div>
    </section>
    <section id="info">
        <div class="container">
            <div class="row">
                    <?php 
					$sql  = "select * from tbl_page where name='About'";
					$page = $db->select($sql);
					if($page)
					{
						foreach($page as $result)
						{
					?>
                <div class="col-md-4">
                    <img src="admin/<?php echo $result['image'];?>" class="my-2  img  rounded-circle " width="300" alt="me">
                </div>
                <div class="col-md-8">
                <p class="lead"><?php echo $result['content'];?></p>
                </div>
                <?php } }?>
            </div>
            <div class="row">
                <div class="col">
                    <p class="lead text-justify">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid dignissimos aperiam iusto corrupti error nobis, impedit, ea facilis soluta velit atque magnam neque nisi recusandae accusamus dolorem at aspernatur, voluptatem ratione sint sequi dicta! Maiores quo nobis veritatis quas ea error, hic molestias, laborum alias officia dolor illum aliquam quis, pariatur eius nihil commodi velit aspernatur, ipsa reprehenderit. Excepturi temporibus veniam accusamus harum pariatur ipsa quos aut, odit facere assumenda labore officia expedita culpa totam, beatae et quibusdam voluptas earum. Nihil obcaecati, iste laborum officia, doloribus vel necessitatibus inventore odit vitae sed incidunt labore suscipit totam. Minus libero reiciendis, ipsum!
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!--photp gallary-->
    <section id="gallary" class="py-4" uk-lightbox>
        <div class="container">
            <div class="row text-center">
                <div class="col">
                    <h1>Photo gallary</h1>
                    <p class="lead">Check out our photo..</p>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-4">
                    <div>
                        <a href="img/1.jpg">
                            <img src="img/1.jpg" class="img-fluid" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div>
                        <a href="img/2.jpg">
                            <img src="img/2.jpg" class="img-fluid" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div>
                        <a href="img/3.jpg">
                            <img src="img/3.jpg" class="img-fluid" alt="">
                        </a>
                    </div>
                </div>
            </div>
            <div class="row pt-0 pt-md-2">
                <div class="col-md-4">
                    <div>
                        <a href="img/4.jpg">
                            <img src="img/4.jpg" class="img-fluid" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div>
                        <a href="img/5%20.jpg">
                            <img src="img/5%20.jpg" class="img-fluid" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div>
                        <a href="img/6.jpg">
                            <img src="img/6.jpg" class="img-fluid" alt="">
                        </a>
                    </div>
                </div>
            </div>
            <div class="row pt-0 pt-md-2">
                <div class="col-md-4">
                    <div>
                        <a href="img/7.jpg">
                            <img src="img/7.jpg" class="img-fluid" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div>
                        <a href="img/8.jpg">
                            <img src="img/8.jpg" class="img-fluid" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div>
                        <a href="img/9.jpg">
                            <img src="img/9.jpg" class="img-fluid" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--footer-->
    <?php include "inc/footer.php"?>
