<?php 
include "inc/header.php";
Session::init();
Session::CheckSession();
$db = new database();
$fm = new formate();
?>
<script>
    $('[data-toggle="tooltip"]').tooltip();

</script>
<!--navigation-->
<section id="nav">
    <nav class="navbar   navbar-light nav navbar-expand-md" uk-sticky="top: 100; animation: uk-animation-slide-top; bottom: #sticky-on-scroll-up">
        <div class="container">
            <a class="navbar-brand text-light" href="index.php">
                <img src="../img/book.jpg" width="40" height="50" class="d-inline-block align-top" alt="" loading="lazy">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item  ">
                        <a class="nav-link text-light" href="index.php"><span data-placement="bottom" data-html="true" data-toggle="tooltip" title="Dashboard"><i class="fa fa-tachometer" aria-hidden="true"> Dashboard</i></span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link text-light " href="profile.php"><span data-placement="bottom" data-toggle="tooltip" title="Profile"><i class="fa fa-user" aria-hidden="true">
                                    Profile</i></span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link text-light " href="inbox.php"><span data-placement="bottom" data-toggle="tooltip" title="Inbox"><i class="fa fa-inbox" aria-hidden="true">
                                    Inbox
                                    <?php
                                $sql = "select status from contact where status = '0'";
                                $inbox = $db->select($sql);
                                if($inbox)
                                {
                                    $count = mysqli_num_rows($inbox);
                                    echo "(".$count.")";
                                    
                                }
                                else
                                {
                                    echo"(0)";
                                } 
                                ?></i></span>
                        </a>
                    </li>
                    <li class="nav-item " id="active">
                        <a class="nav-link text-light" href="order.php"><span data-placement="bottom" data-toggle="tooltip" title="Order"><i class="fa fa-archive" aria-hidden="true">
                                    Order
                                    <?php
                                $sql = "select status from tbl_order where status = '0'";
                                $order = $db->select($sql);
                                if($order)
                                {
                                    $count = mysqli_num_rows($order);
                                    echo "(".$count.")";
                                }
                                else
                                {
                                    echo"(0)";
                                }
                                
                                
                                ?>
                                </i></span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link text-light" href="sell.php"><span data-placement="bottom" data-toggle="tooltip" title="Sell"><i class="fa fa-archive" aria-hidden="true">
                                    Sell
                                    <?php
                                $sql = "select status from sell where status = '1'";
                                $sell = $db->select($sql);
                                if($sell)
                                {
                                    $count = mysqli_num_rows($sell);
                                    echo "(".$count.")";
                                }
                                else
                                {
                                    echo "(0)";
                                }
                            
                                
                                
                                ?>
                                </i></span>
                        </a>
                    </li>
                    <li class="nav-item  ml-5">
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                            <i class="fa fa-sign-out" aria-hidden="true"></i>
                            <?php                                 
                                echo Session::get('username');
                            ?>
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"> Logout </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p class="lead">Are You Sure to logout?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        <a href="logout.php"> <button type="button" class="btn btn-primary">Logout</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</section>>

<body>
    <!--Main-->
    <section id="order">
              <div class="container">
        <div class="row">
            <div class="col-md-8 dashboard">
                <h2 class="text-center m-2" style="font-family:cursive; height:50px;">Order request</h2>
                <hr>
                <form action="" method="post">
                    <div class="table-responsive">
                        <table class="table table-sm table-hover table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Writer</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <?php
                            $sql = "select tbl_order.*,sell.price,sell.writer from tbl_order inner join sell on tbl_order.book_id = sell.id";
                            $dashboard = $db->select($sql);
                            if($dashboard)
                            {
                                foreach($dashboard as $result)
                                {
                                    $status = $result['status'];
                            ?>
                            <tbody>
                                <tr>
                                    <th scope="row"><?php echo $result['name'];?></th>
                                    <td><?php echo $result['price'];?></td>
                                    <td><?php echo $result['writer'];?></td>
                                    <td><?php echo $result['phone'];?></td>
                                    <td><?php echo $result['address'];?></td>
                                    <td>
                                        <?php 
                                        if($status == '1')
                                        {
                                        ?>

                                        <a onclick="return confirm('Are you sure to delete')" class="btn btn-danger " href="delorder.php?id=<?php echo $result['id'];?> ">Delete</a>

                                        <?php } else {?>
                                        <a onclick="return confirm('Are you sure to delete')" class="btn btn-danger " href="delorder.php?id=<?php echo $result['id'];?> ">Delete</a>
                                        <a href="updateorder.php?id=  <?php echo $result['id'];?>" class="btn btn-primary my-2">Done</a>
                                        <?php } ?>
                                    </td>
                                </tr>
                            </tbody>
                            <?php } } ?>
                        </table>
                    </div>
                </form>
            </div>
            <div class="col-md-4 my-4">
                <?php include"inc/sidebar.php"; ?>
            </div>
        </div>
        </div>
    </section>
</body>
<?php include"inc/footer.php"; ?>
