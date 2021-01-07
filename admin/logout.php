<?php
session_start();
unset($_SESSION['username']);
session_destroy($_SESSION['username']);
header("location:../index.php");
 ?>