<?php
include "inc/header.php";
include "lib/Session.php";
Session::init();
Session::CheckSession();
$db = new database();
$fm = new formate();
?>
<?php
if($_GET['id'] == 'NULL')
{
    echo "<script>window.location = 'admin/sell.php'</script>";
}
else
{
	$sell_id  = $_GET['id'];
    $sql1 = "select * from sell where id = '$sell_id'";
    $result = $db->select($sql1);
    if($result)
    {
        while($delimg = $result->fetch_assoc())
        {
            $delin = $delimg['image'];
            unlink($delin);
        }
    }
    $sql = "delete  from sell where id = '$sell_id'";
    $delsell  = $db->delete($sql);
    if($delsell)
    {
        echo "<script>alert('Data Deleted Successfull.');</script>";
        echo "<script>window.location='admin/sell.php';</script>";

    }
    else
    {
        echo "<script>alert('Data not Deleted Successfull.')</script>";
        echo "<script>window.location='admin/sell.php';</script>";   
    }
}
?>