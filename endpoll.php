<?php
    $pollname = $_POST["pollname"];
    $code = $_POST['code'];
    if($code == 'XXXXX'){
        echo "<script>alert('Poll already closed');window.location.href='http://localhost/MiniProject/optionmenu.php';</script>";
        //header('location: http://localhost/MiniProject/optionmenu.php');
    }
    $username = $_COOKIE['userr'];
    include('config.php');
    $conn = mysqli_connect($server, $user, $pass, "poll_io"); 
    if (!$conn){ 
    echo "CONNECTION COULDN'T BE ESTABLISHED RIGHT NOW. TRY AGAIN LATER.";
    }
    else {//echo "<h1>Connected Successfully<h1><br>";
    }
    $row="";
    $sql5 = "UPDATE polldata SET code = 'XXXXX' WHERE pollname = '$pollname' AND username = '$username'";
    $res4 = mysqli_query($conn, $sql5); 
    if($res4){
        //echo "poll stopped successfully<br>";
        echo "<script>alert('Poll ended successfully');window.location.href='http://localhost/MiniProject/optionmenu.php';</script>";
    }
    else{
        echo "Error: " . $res4 . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
?>
<button onclick = "location.href = 'optionmenu.php'">Click here to go back</button>