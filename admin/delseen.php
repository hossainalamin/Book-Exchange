<?php
include "inc/header.php";
Session::init();
Session::CheckSession();
$db = new database();
$fm = new formate();
?>
<?php
    echo "<script>window.location='inbox.php';</script>";
?>