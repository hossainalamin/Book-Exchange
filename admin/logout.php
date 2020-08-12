<?php 
include "inc/header.php";
Session::init();
Session::CheckSession();
Session::destroy();
?>