<?php
session_start();
session_unset();
session_destroy();

echo "<script>alert('udh dilogout yah. Muachh😘😘.'); window.location.href='home.php';</script>";
?>