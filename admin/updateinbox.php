<?php
include "inc/header.php";
Session::init();
Session::CheckSession();
$db = new database();
$fm = new formate();
?>
<?php
if($_GET['id'] == 'NULL')
{
    echo "<script>window.location='seen.php';</script>";    
   
}
else
{
        $seen_id = $_GET['id']; 
        $sql =
        "update contact
        set 
        status  = '1'
        where id = '$seen_id'";
        $user = $db->update($sql);
        if($user)
        {
            echo "<script>alert('Text seen Successfull.');</script>";
            echo "<script>window.location='seen.php';</script>";    

        }
        else
        {
            echo "<script>alert('Text not Senn.');</script>";
            echo "<script>window.location='seen.php';</script>";                     
        }
}
?>