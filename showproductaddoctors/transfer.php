<?php
session_start();
$id=$_REQUEST["a"];
$_SESSION["join"]=$id;
header("location:showdoctors.php");
?>