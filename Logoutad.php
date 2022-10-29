<?php
session_start();
unset($_SESSION['aduseremail']);
session_destroy();
header('Location: login.php');


?>