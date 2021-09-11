<?php
    /*echo $_GET["val1"];
    echo $_GET["val2"];
    echo $_GET["val3"];
    echo $_GET["val4"];
    echo $_GET["val5"];
    echo "<br>";
    echo "hello world";*/
    $code = $_POST["code"];
    $val1 = $_POST["val1"];
    $val2 = $_POST["val2"];
    $val3 = $_POST["val3"];
    $val4 = $_POST["val4"];
    $val5 = $_POST["val5"];
    include("config.php");
    session_start();
    //echo $_COOKIE["userr"];
    $userr = $_COOKIE["userr"];
    $conn = mysqli_connect($server, $user, $pass, "poll_io"); 
    if (!$conn){ 
    echo "<p>CONNECTION COULDN'T BE ESTABLISHED RIGHT NOW. TRY AGAIN LATER.<p>";
    }
    else {//echo "<h1>Connected Successfully<h1><br>";
    }
    $row="";
    $check = 0;
    $sql3 = "SELECT * FROM polldata WHERE code = '$code'";
    $res3 = mysqli_query($conn, $sql3);
    if($res3){
        $row = mysqli_fetch_assoc($res3);
        $pollname = $row['pollname'];
    }
    $sql1 = "SELECT * from userpoll where titlename = '$pollname' AND username = '$userr'";
    //echo $pollname;
    //echo $userr;
    echo "<br>";
    $res1 = mysqli_query($conn, $sql1); 
    //echo "Hi";
    if($res1){
        if($row = mysqli_fetch_assoc($res1)){
            $msg = 'Sorry. You Already Voted For This Poll.';
            echo "<script>alert('$msg'); window.location.href='http://localhost/MiniProject/optionmenu.php';</script>";
        }
    }
    $sql6 = "INSERT into userpoll values ('$userr','$pollname')";
    $res6 = mysqli_query($conn, $sql6);
    $sql4 = "UPDATE polldata SET val1 = '$val1',val2 = '$val2',val3 = '$val3',val4 = '$val4',val5 = '$val5' WHERE code = '$code'";
    $res5 = mysqli_query($conn, $sql4);
    $sql5 = "SELECT * FROM polldata WHERE code = '$code'";
    $res4 = mysqli_query($conn, $sql5); 
    if($res4){
        //echo "data selected successfully<br>";
        while($row = mysqli_fetch_assoc($res4)){
        //echo "username: " . $row["username"]. "<br>pollname: " . $row["pollname"]. "<br>description: " . $row["description"]. "<br>opt1: " . $row["opt1"] . "<br>opt2: " . $row["opt2"];
        $w1 = $row["opt1"];
        $username = $row["username"];
        $content = $row['description'];
        $w2 = $row["opt2"];
        $w3 = $row["opt3"];
        $w4 = $row["opt4"];
        $w5 = $row["opt5"];
        $c1 = $row["val1"];
        $c2 = $row["val2"];
        $c3 = $row["val3"];
        $c4 = $row["val4"];
        $c5 = $row["val5"];
        $total = $val1 + $val2 + $val3 + $val4 + $val5; 
    }
    } else {
        echo "Error: " . $res4 . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
?>
<doctype html>
<html>
    <head>
    <style>
            table {
    margin-top:50px;
    border: 1px solid black;
    border-collapse: collapse;
    margin-left:auto;
    margin-right:auto;
    width: 90%;
    align-items: center;
    text-align:center;
    transition: all 0.6s ease;
    }
    table:hover{
        box-shadow:1px 1px 0px rgb(34, 116, 240),
                2px 2px 0px rgb(34, 116, 240),
                3px 3px 0px rgb(34, 116, 240),
                4px 4px 0px rgb(34, 116, 240),
                5px 5px 0px rgb(34, 116, 240),
                6px 6px 0px rgb(34, 116, 240);
    }
    th, td {
    text-align: center;
    padding: 8px;
    font-size:20px;
    }

    tr{
        transition: all 0.6s ease;
    }
    tr:nth-child(even){background-color: rgb(34, 209, 240);}
    tr:nth-child(odd){background-color: rgb(60, 190, 240);}
    th {
    text-align:center;
    background-color: rgb(0, 2, 131);
    color: white;
    }
    tr:nth-child(even):hover{
        background-color: blue;
        color:white;
    }
    tr:nth-child(odd):hover{
        background-color: blue;
        color:white;
    }

    .display{
                transition: all 0.6s ease;
                margin-left:auto;
                color:white;
                border-radius:5px;
                align-items:center;
                text-align:center;
                margin-right:auto;
                height:180px;
                padding: 20px;
                padding-top:30px;
                background-color: cornflowerblue;
                margin-top: 50px;
                font-size:20px;
                width:max-content;
                border: 2px solid black;
                height:270px;
        }
        .display:hover{
                box-shadow:1px 1px 0px rgb(34, 209, 240),
                2px 2px 0px rgb(34, 209, 240),
                3px 3px 0px rgb(34, 209, 240),
                4px 4px 0px rgb(34, 209, 240),
                5px 5px 0px rgb(34, 209, 240),
                6px 6px 0px rgb(34, 209, 240);
        }
        html{
                background-image: url('bg.jpg');
        }
        .header{
            font-size:20px;
            text-align: center;
            line-height:40px;
            text-transform: uppercase;
            margin-bottom:2px;
            color:white;
            transition: all 0.6s ease;
        }
        .but{
            border:0.5px solid rgb(47, 0, 255);
            background-color: rgb(43, 86, 226);
            border-radius:10px;
            color: white;
            padding:15px 32px;
            text-align: center;
            font-size: 20px;
            position: relative;
            border-radius: 15px;
            margin-left:720px;
            margin-bottom: 10px;
            cursor: pointer;
            display: inline-block;
            align-items: center;
            transition: all 0.5s;
        }
        .but:hover{
            box-shadow:1px 1px 0px rgb(34, 209, 240),
            2px 2px 0px rgb(34, 209, 240),
            3px 3px 0px rgb(34, 209, 240),
            4px 4px 0px rgb(34, 209, 240),
            5px 5px 0px rgb(34, 209, 240);

        }
        .content{
            font-size:20px;
            color:white;
            line-height:40px;
            transition: all 0.6s ease;
        }
        .header:hover{-
            box-shadow:0px 1px 0px rgb(34, 209, 240),
            0px 2px 0px rgb(34, 209, 240),
            0px 3px 0px rgb(34, 209, 240);
        }
        .content:hover{
            box-shadow:0px 1px 0px rgb(34, 209, 240),
            0px 2px 0px rgb(34, 209, 240),
            0px 3px 0px rgb(34, 209, 240);
        }
        .bar{
            text-align:left;
        }
        </style>
    </head>
    <body>
    <div class = "display">
            <div class = 'header'><u>Result for <?php echo $pollname ?></u></div><br>
            <div class = 'content'>Author : <?php echo $username ?><br><?php echo $content; ?><br>Total : <?php echo $total?> Votes</div><br>
    </div>
    <table>
        <tr id = "onerow">
            <td><p id = "one"><?php echo $w1?></p></td>
            <td class = "bar"><img src="bar1.jpg" width='<?php echo(100*round($val1/($total),2)); ?>' height='20'></td>
            <td><?php echo(100*round($val1/($total),2)); ?>% (<?php echo $val1?> Votes)
            </td>
        </tr>
        <tr id = "tworow">
            <td><p id = "two"><?php echo $w2?></p></td>
            <td class = "bar"><img src= "bar2.jpg" width='<?php echo(100*round($val2/($total),2)); ?>' height='20'></td>
            <td><?php echo(100*round($val2/($total),2)); ?>% (<?php echo $val2?> Votes)
            </td>
        </tr>
        <tr id = "threerow">
            <td><p id = "three" value = "<?php echo $w3?>"><?php echo $w3?></p></td>
            <td class = "bar"><img src="bar3.jpg" width='<?php echo(100*round($val3/($total),2)); ?>' height='20'></td>
            <td><p id = "threec"><?php echo(100*round($val3/($total),2)); ?>% (<?php echo $val3?> Votes)
        </p></td>
        </tr>
        <tr id = "fourrow">
            <td><p id = "four" value = "<?php echo $w4?>"><?php echo $w4?></p></td>
            <td class = "bar"><img src="bar4.jpg" width='<?php echo(100*round($val4/($total),2)); ?>' height='20'></td>
            <td> <p id = "fourc"><?php echo(100*round($val4/($total),2)); ?>% (<?php echo $val4?> Votes)
        </p></td>
        </tr>
        <tr id = "fiverow">
            <td><p id = "five" value = "<?php echo $w5?>"><?php echo $w5?></p></td>
            <td calss = "bar"><img src="bar5.jpg" width='<?php echo(100*round($val5/($total),2)); ?>' height='20'></td>
            <td><p id = "fivec"> <?php echo(100*round($val5/($total),2)); ?> (<?php echo $val5?> Votes)
            </p></td>
        </tr>
    </table>
    <input type = "text" readonly value = "<?php echo $w3 ?>" id = "t3" style = "visibility:hidden">
        <input type = "text" readonly value = "<?php echo $w4 ?>" id = "t4" style = "visibility:hidden">
        <input type = "text" readonly value = "<?php echo $w5 ?>" id = "t5" style = "visibility:hidden">
    <script>
            var checkvar = document.getElementById('t3').value;
            if(checkvar === ""){
                document.getElementById('threerow').style.display = "none";
                document.getElementById('threec').style.visibility = "hidden";
            }
            var checkvar = document.getElementById('t4').value;
            if(checkvar === ""){
                //alert("4 empty");
                document.getElementById('fourrow').style.display = "none";
                document.getElementById('fourc').style.visibility = "hidden";
            }
            var checkvar = document.getElementById('t5').value;
            //alert(checkvar);
            if(checkvar === ""){
                //alert("5 empty");
                document.getElementById('fiverow').style.display = "none";
                document.getElementById('fivec').style.visibility = "hidden";
            }
        </script>
    <br>
    </body>
    <button onclick = "location.href = 'optionmenu.php'" class = "but">Click here to go back</button>
</html>

    