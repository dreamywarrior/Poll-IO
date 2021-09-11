<?php
    $a = $_POST['fn'];
    $b = $_POST['ln'];
    $c = $_POST['e'];
    $d = $_POST['pass'];
    include('config.php');
    $cookie_name = "userr";
    $cookie_value = $c;
    setcookie($cookie_name, $cookie_value, time() + (86400*30), "/");
    $conn = mysqli_connect($server, $user, $pass, "poll_io"); 
    if (!$conn){ 
    echo "<p>CONNECTION COULDN'T BE ESTABLISHED RIGHT NOW. TRY AGAIN LATER.</p>";
    }
    else {//echo "<h1>Connected Successfully<h1><br>";
    }
    $row="";
    $sql4 = "SELECT * FROM userdata WHERE email = '$c'";
    $res4 = mysqli_query($conn, $sql4); 
    if($row = mysqli_fetch_assoc($res4)){
        echo "<p>E-mail already linked with an account. Try Another One.</p>";
        //header("Location: http://localhost/MiniProject/loginpage.html#");
    }
    else{
    $sql5 = "INSERT INTO userdata VALUES ('$a','$b','$c','$d')";
    echo "<div>Your account is created successfully.";
    $res5 = mysqli_query($conn, $sql5); 
    if($res5){
        //echo "data inserted successfully<br>";
        header("Location: http://localhost/MiniProject/optionmenu.php");
    } else {
        echo "Error: " . $res5 . "<br>" . mysqli_error($conn);
    }
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
