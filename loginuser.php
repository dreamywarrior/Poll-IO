<?php
    $c = $_POST['em'];
    $d = $_POST['p'];
    $cookie_name = "userr";
    $cookie_value = $c;
    setcookie($cookie_name, $cookie_value, time() + (86400*30), "/");
    include('config.php');
    $conn = mysqli_connect($server, $user, $pass, "poll_io"); 
    if (!$conn){ 
    echo "<p>CONNECTION COULDN'T BE ESTABLISHED RIGHT NOW. TRY AGAIN LATER.<p>";
    }
    else {//echo "<h1>Connected Successfully<h1><br>";
    }
    $row="";
    $sql4 = "SELECT * FROM userdata WHERE email = '$c'";
    $res4 = mysqli_query($conn, $sql4); 
    if($row = mysqli_fetch_assoc($res4)){
        $s = $row['password'];
        if($d == $s){
            //echo "HI ".$row['firstname']." ".$row['lastname'].". Nice to have you back :)"; 
            //header("Location: http://localhost/MiniProject/optionmenu.php");
            echo "<script>alert('Logged in successfully');window.location.replace('http://localhost/MiniProject/optionmenu.php');</script>";
        }
        else{
            echo "<p>Wrong password. Try again!</p>";
        }
    }
    else{
        echo "<p>User doesn't exist. Signup for free.</p>";
    }
    mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="refresh" content="4;url=http://localhost/MiniProject/loginpage.html#" />
        <style>
            *{
                background-color: lightblue;
            }
            p{
                margin-top:300px;
                font-size:30px;
                line-height:52px;
                padding:12px 22px;
                text-align: center;
                margin-left:auto;
                margin-right:auto;
                width:90%;
                color:white;
                transition:all 0.6s ease;
            }
            p:hover{
            box-shadow:0px 1px 0px blue,
            0px 2px 0px blue,
            0px 3px 0px blue,
            0px 4px 0px blue,
            0px 5px 0px blue;
        }
        </style>
    </head>
</html>
