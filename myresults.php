<?php
    /*echo $_GET["val1"];
    echo $_GET["val2"];
    echo $_GET["val3"];
    echo $_GET["val4"];
    echo $_GET["val5"];
    echo "<br>";
    echo "hello world";*/
    $pollname = $_POST["pollname"];
    $username = $_COOKIE['userr'];
    include("config.php");
    $conn = mysqli_connect($server, $user, $pass, "poll_io"); 
    if (!$conn){ 
    echo "NO CONNECTION ";
    }
    else {//echo "<h1>Connected Successfully<h1><br>";
    }
    $row="";
    $sql5 = "SELECT * FROM polldata WHERE pollname = '$pollname' AND username = '$username'";
    $res4 = mysqli_query($conn, $sql5); 
    if($res4){
        //echo "data selected successfully<br>";
        while($row = mysqli_fetch_assoc($res4)){
        //echo "username: " . $row["username"]. "<br>pollname: " . $row["pollname"]. "<br>description: " . $row["description"]. "<br>opt1: " . $row["opt1"] . "<br>opt2: " . $row["opt2"];
        $desc = $row['description'];
        $code= $row['code'];
        $w1 = $row["opt1"];
        $w2 = $row["opt2"];
        $w3 = $row["opt3"];
        $w4 = $row["opt4"];
        $w5 = $row["opt5"];
        $c1 = $row["val1"];
        $c2 = $row["val2"];
        $c3 = $row["val3"];
        $c4 = $row["val4"];
        $c5 = $row["val5"];
        $val1 = $c1;
        $val2 = $c2;
        $val3 = $c3;
        $val4 = $c4;
        $val5 = $c5;
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
                background-image: url('bg7.jpg');
                background-position: center;
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
            <div class = 'content'><?php echo $desc; ?><br>Total : <?php echo $total?> Votes</div><br>
            <div class = 'content' id = 'coded' style = "visibility:hidden;">Code : <?php echo $code ?> </div><br>
    </div>
    <input type = "text" id = 'code' value = '<?php echo $code ?>' style = "display:none">
    <script>
        var code = document.getElementById('code').value;
        //alert(code);
            if(!((code == '0000')||(code == 'XXXXX'))){
                document.getElementById('coded').style.visibility = "visible";
            }
    </script>
    <table>
        <tr id = "onerow">
            <td><p id = "one"><?php echo $w1?></p></td>
            <td><img src="bar1.jpg" width = '<?php echo (($total > 0)?(100*round($val1/($total),2)):0); ?>' height='20'></td>
            <td><?php echo (($total > 0)?(100*round($val1/($total),2)):0); ?>% (<?php echo $val1; ?> Votes)
            </td>
        </tr>
        <tr id = "tworow">
            <td><p id = "two"><?php echo $w2?></p></td>
            <td><img src= "bar2.jpg" width = '<?php echo (($total > 0)?(100*round($val2/($total),2)):0); ?>' height='20'></td>
            <td><?php echo (($total > 0)?(100*round($val1/($total),2)):0); ?>% (<?php echo $val2?> Votes)
            </td>
        </tr>
        <tr id = "threerow">
            <td><p id = "three"><?php echo $w3?></p></td>
            <td><img src="bar3.jpg" width = '<?php echo (($total > 0)?(100*round($val3/($total),2)):0); ?>' height='20'></td>
            <td><p id = "threec"><?php echo (($total > 0)?(100*round($val1/($total),2)):0); ?>% (<?php echo $val3?> Votes)
        </p></td>
        </tr>
        <tr id = "fourrow">
            <td><p id = "four"><?php echo $w4?></p></td>
            <td><img src="bar4.jpg" width='<?php echo (($total > 0)?(100*round($val4/($total),2)):0); ?>' height='20'></td>
            <td> <p id = "fourc"><?php echo (($total > 0)?(100*round($val1/($total),2)):0); ?>% (<?php echo $val4?> Votes)
        </p></td>
        </tr>
        <tr id = "fiverow">
            <td><p id = "five"><?php echo $w5?></p></td>
            <td><img src="bar5.jpg" width='<?php echo (($total > 0)?(100*round($val5/($total),2)):0); ?>' height='20'></td>
            <td><p id = "fivec"> <?php echo (($total > 0)?(100*round($val1/($total),2)):0),"%"; ?> (<?php echo $val5?> Votes)
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
        <form id = "end" style = "visibility:hidden" method = "POST" action = "endpoll.php">
            <input type = "text" id = "pollname" name = "pollname" value = "<?php echo $pollname; ?>">
            <input type = "text" id = "code" name = "code" value = "<?php echo $code; ?>">
            <input type = "submit" id = "sbtn">
        </form>
        <script>
            function endpoll(){
                document.getElementById('sbtn').click();
            }
        </script>
        <button onclick = "endpoll()" class=  "but">Want to End the poll</button><br>
    <br><button onclick = "location.href = 'optionmenu.php'" class= "but">Click here to go back</button>
    </body>
</html>

    