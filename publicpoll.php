<button onclick = "location.href = 'optionmenu.php'" class = "but">Go Back To menu</button>
<?php
    echo "<div class = 'header'>Public polls</div>";
    include("config.php");
    $code = '0000';
    $db = "poll_io";
    $conn = mysqli_connect($server, $user, $pass, $db); 
    if (!$conn){ 
    echo "<p>CONNECTION COULDN'T BE ESTABLISHED RIGHT NOW. TRY AGAIN LATER.<p>";
    }
    else {//echo "<h1>Connected Successfully<h1><br>";
    }
    $row="";
    $sql4 = "SELECT * from polldata WHERE code = '$code'";
    $res4 = mysqli_query($conn, $sql4); 
    $sqls = "SELECT * from polldata WHERE code = '$code'";
    $ress = mysqli_query($conn, $sqls); 
    if($ress){
        if(!($row = mysqli_fetch_assoc($ress))){
            echo "<script>alert('Sorry. No Poll exists with this code.'); location.replace('http://localhost/MiniProject/checkpoll.html')</script>";
        }
    }
    if($res4){
        //echo "data selected successfully<br>";
        echo "<table><tr><th>Author</th><th>Poll Name</th><th>Vote</th></tr>";
        while($row = mysqli_fetch_assoc($res4)){
        $a = str_replace(' ', '_', $row['pollname']);
        $b = $row['username'];
        echo "<tr><td>".$row["username"]. "</td><td>" . $row["pollname"]."</td><td><button class = 'but' style = 'font-size:15px;' onclick = fun('$a','$b')>Click here to vote for this poll</button></td></tr><br>";
        /*$w1 = $row["opt1"];
        $w2 = $row["opt2"];
        $w3 = $row["opt3"];
        $w4 = $row["opt4"];
        $w5 = $row["opt5"];
        $c1 = $row["val1"];
        $c2 = $row["val2"];
        $c3 = $row["val3"];
        $c4 = $row["val4"];
        $c5 = $row["val5"];*/
        /*if($row["opt3"] != ""){
        echo "<br>opt3: " . $row["opt3"];
        }
        if($row["opt4"] != ""){
            echo "<br>opt4: " . $row["opt4"];
        }
        if($row["opt5"] != ""){
            echo "<br>opt5: " . $row["opt5"];
        }
        $options = array($row["opt1"], $row["opt2"], $row["opt3"], $row["opt4"], $row["opt5"]);
        echo implode(" , ",$options);*/
    }
    echo "</table>";
    } else {
        echo "Error: " . $res4 . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
?>
<style>
            .header{
                color:white;
                border: 0.5px solid white;
                background-color:darkorchid;
                width:50%;
                margin-left:auto;
                margin-right:auto;
                font-size: 40px;
                text-align: center;
                border-radius:5px;
                margin-top:10px;
                height:50px;
                line-height: 52px;
                transition: all 0.6s ease;
                cursor: pointer;
            }
            .header:hover{
                box-shadow:1px 1px 0px darkorchid,
                2px 2px 0px  darkorchid,
                3px 3px 0px  darkorchid,
                4px 4px 0px  darkorchid,
                5px 5px 0px  darkorchid,
                6px 6px 0px  darkorchid;
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
            margin-right:10px;
            margin-bottom: 10px;
            cursor: pointer;
            display: inline-block;
            align-items: center;
            transition: all 0.5s;
        }
        .but:hover{
            box-shadow:1px 1px 0px rgb(34, 116, 240),
                2px 2px 0px rgb(34, 116, 240),
                3px 3px 0px rgb(34, 116, 240),
                4px 4px 0px rgb(34, 116, 240),
                5px 5px 0px rgb(34, 116, 240),
                6px 6px 0px rgb(34, 116, 240);
        }
    
            html{
                background-image: url('bg5.jpg');
                background-position: center;
            }
    table {
    margin-top:50px;
    border: 1px solid black;
    border-radius:5px;
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
</style>
<script>
    function fun(x, y){
        document.getElementById('pollname').defaultValue = x.replace("_", " ");
        document.getElementById('username').defaultValue = y;
        document.getElementById('sb').click();
    }
</script>
<!doctype HTML>
<html>
    <head></head>
    <body>
        <form id = "myform" action = "votepublic.php" method = "POST" style = "visibility:hidden;">
            <input type = "text" id = "pollname" name = "pollname">
            <input type = "text" id = "username" name = "username">
            <input type = "submit" id = "sb">
        </form>
    </body>
</html>
