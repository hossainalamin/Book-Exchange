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
        $order_id = $_GET['id']; 
        $sql =
        "update tbl_order
        set 
        status  = '1'
        where id = '$order_id';
        ";
        $user = $db->update($sql);
        if($user)
        {
            echo "<script>alert('Data  updated Successfull.');</script>";
            echo "<script>window.location='order.php';</script>";    

        }
        else
        {
            echo "<script>alert('Data not updated Successfull.');</script>";
            echo "<script>window.location='order.php';</script>";                     
        }
}
?>