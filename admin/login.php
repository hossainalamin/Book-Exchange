<?php 
include "inc/header.php";
Session::CheckLogin();
$db = new database();
$fm = new formate();
?>
<?php 
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $email  = $fm->validation($_POST['email']);
    $password  = $fm->validation (md5($_POST['password']));
    $email = mysqli_real_escape_string($db->link,$email);
    $password = mysqli_real_escape_string($db->link,$password);
    $sql = "select * from tbl_user where email = '$email' and password = '$password'";
    $login = $db->select($sql);
    if($login)
    {
        $value = mysqli_fetch_array($login);
        Session::init();
        Session::set('login',true);
        Session::set('userid',$value['id']);
        Session::set('username',$value['name']);
        Session::set('email',$value['email']);
        Session::set('role',$value['role']);
        header("location:index.php");
    }
    else
    {
    $error = "User Not found";
    }

}
?>
<!--Login-->

<body id="login">
    <section>
        <div class="row justify-content-center">
            <div class="col-md-4">
                <form action="login.php" method="post">
                    <div class="card login rounder">
                        <div class="card-header">
                            <h1 class="text-center">Login Here</h1>
                        </div>
                        <div class="card-body text-center">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <input type="Email" class="form-control" name="email" placeholder="Enter email">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="password" placeholder="Enter Password">
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-block btn-primary mt-3" name="login">Login</button>
                                    </div>
                                    <div class="form-group">
                                        <a href="forgetpass.php" class="btn btn-block btn-danger mt-3">Forget Password?</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <p class="lead">Exchange Book,Exchange Knowledge</p>
                        </div>
                    </div>
                    <?php
                    if(isset($error))
                    {
                        echo "<span style = 'font-size:22px; color:red; margin-left:100px;'>User Not not found</span>";
                    }
                    ?>
                </form>
            </div>
        </div>
    </section>
</body>
