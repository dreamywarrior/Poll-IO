<?php 
    setcookie("userr", "", time() - 3600);
    echo "<script>alert('logged out successfully');window.location.replace('http://localhost/MiniProject/')</script>";
?>