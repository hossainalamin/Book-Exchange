<?php
include "inc/header.php";
Session::init();
Session::CheckSession();
$db = new database();
$fm = new formate();
?>
<?php
if($GET['id'] == 'NULL')
{
    echo "<script>window.location = 'order.php'</script>";
}
else
{
    $del_id  = $_GET['id'];
    $sql = "delete  from tbl_user where id = '$del_id'";
    $delsell  = $db->delete($sql);
    if($delsell)
    {
        echo "<script>alert('Data Deleted Successfull.');</script>";
        echo "<script>window.location='order.php';</script>";

    }
    else
    {
        echo "<script>alert('Data not Deleted Successfull.');</script>";
        echo "<script>window.location='order.php';</script>";   
    }
}
?>