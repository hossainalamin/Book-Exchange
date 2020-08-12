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
            $email = mysqli_real_escape_string($db->link,$email);
            if(!filter_var($email,FILTER_VALIDATE_EMAIL))
            {
                $error = "Invalid mail.";               
   
            }
            else
            {
            $sql = "select * from tbl_user where email = '$email' limit 1";
            $mailcheck = $db->select($sql);
            if($mailcheck != false)
            {
                foreach($mailcheck as $data)
                {
                    $userid = $data['id'];
                    $username = $data['name'];
                }
                $text  = substr($email,0,3);
                $rand  = rand(10000,99999);
                $newpass ='$text$rand';
                $pass =md5($newpass);
                $sql = "update tbl_user
                        set 
                        password = '$newpass'
                        where id = '$userid'";
                $result = $db->update($sql);
                $to = '$email';
                $from = "alamin@gmail.com";
                $headers = 'From: $from'. "\r\n" .
                'Reply-To: alamin@gmail.com' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();
                $subject = 'Your lost password';
                $message = "Your user name ".$username."And password is ".$pass;
                $sentmail = mail($to, $subject, $message, $headers);
                if($sentmail)
                {
                    $msg = "Password sent to your mail..";

                    
                }
                else
                {
            		$error = "Something wrong.Password does not sent.";               

                }

            }
            else
            {
                    $error = "Something wrong.Email does not match.";               

            }
            }
        }
        
            
    ?>
<!--Login-->

<body id="login">
    <section>
        <div class="row justify-content-center">
            <div class="col-md-4">
                <form action="" method="post">
                    <div class="card login rounder">
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
                        <div class="card-header">
                            <h1 class="text-center">Reset Password</h1>
                        </div>
                        <div class="card-body text-center">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <input type="Email" class="form-control" name="email" placeholder="Enter email">
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn btn-success text-light mt-3" name="login" type="submit" >Send mail</button>
                                        <a href="login.php" class="btn  btn-primary mt-3" name="login">Login</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <p class="lead">Exchange Book,Exchange Knowledge</p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>
