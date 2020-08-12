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
    echo "<script>window.location='sell.php';</script>";    
   
}
else
{
        $sell_id = $_GET['id']; 
        $sql =
        "update sell
        set 
        status  = '0'
        where id = '$sell_id'";
        $user = $db->update($sql);
        if($user)
        {
            echo "<script>alert('Data  updated Successfull.');</script>";
            echo "<script>window.location='sell.php';</script>";    

        }
        else
        {
            echo "<script>alert('Data not updated Successfull.');</script>";
            echo "<script>window.location='sell.php';</script>";                     
        }
}
?>