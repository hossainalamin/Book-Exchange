<?php 
include "inc/header.php";
Session::init();
Session::CheckSession();
$db = new database();
$fm = new formate();         
$userid = Session::get('userid'); 
$userrole = Session::get('role'); 
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
                    <li class="nav-item " id="active">
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
                    <li class="nav-item ">
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
                        <a class="nav-link text-light" href="sell.php"><span data-placement="bottom" data-toggle="tooltip" title="Order"><i class="fa fa-archive" aria-hidden="true">
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
</section>
<?php

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
    $email  = $fm->validation($_POST['email']);
    $email   = mysqli_real_escape_string($db->link,$email);
    if(empty($email))
    {
        $error = "Any of the field should not be empty.";
    }
    elseif(!filter_var($email,FILTER_VALIDATE_EMAIL))
    {
        $error = "Invalid email..";
    }
    else
    {
        $sql =
        "insert into tbl_block(email) values('$email')";
        $user = $db->insert($sql);
        if($user)
        {
            $msg = "User block successfully.Thank you";

        }
        else
        {
            $error = "Something wrong.Information not Added.";               
        }
    }
    }
?>
<body>
    <!--Main-->
    <section id="main">
        <div class="container">
        <?php
           if(isset($msg))
           {
                echo"<span class='success'>$msg</span>";
           }
            if(isset($error))
           {
                echo"<span class='warning'>$error</span>";
           }
        ?>
            <div class="row">
                <div class="col-md-8 mt-5"  id="block" >
                    <form action="" method="post">
                        <div class="card  bg-dark text-center my-2 uk-animation-scale-down" >
                            <div class="card-header text-center">
                                <h2 class="text-light">
                                    User Block
                                </h2>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <table style="width:100%">       
                                        <tr>
                                            <th class="text-light">Email:</th>
                                            <th>
                                                <div class="col-md-8">
                                                    <div class="form-group mt-3">
                                                        <input type="text" name="email" class="form-control"  placeholder="Enter email for block..">
                                                    </div>
                                                </div>
                                            </th>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-block btn-success" name="update">Block</button>
                            </div>
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
