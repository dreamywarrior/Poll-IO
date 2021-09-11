<doctype html>
<html>
<button onclick = "location.href = 'optionmenu.php'" class = "but">Click here to go back</button>
<?php
    echo "<div class = 'header'>My polls</div>";
    /*echo $_GET["val1"];
    echo $_GET["val2"];
    echo $_GET["val3"];
    echo $_GET["val4"];
    echo $_GET["val5"];
    echo "<br>";
    echo "hello world";*/
    $username = $_COOKIE["userr"];
    include("config.php");
    session_start();
    $conn = mysqli_connect($server, $user, $pass, "poll_io"); 
    if (!$conn){ 
    echo "NO CONNECTION ";
    }
    else {//echo "<h1>Connected Successfully<h1><br>";
    }
    $row="";
    $sql4 = "SELECT * FROM polldata WHERE username = '$username'";
    $res4 = mysqli_query($conn, $sql4); 
    $sql5 = "SELECT * FROM polldata WHERE username = '$username'";
    $res5 = mysqli_query($conn, $sql5); 
    if($res5){
        if(!($row = mysqli_fetch_assoc($res5))){
            echo "<div class = 'error'>You haven't created any poll lately</div>";
        }
    }
    if($res4){
        //echo "data selected successfully<br>";
        if($row){
        echo "<table><tr><th>Poll Name</th><th>Vote</th></tr>";}
        while($row = mysqli_fetch_assoc($res4)){
            $a = str_replace(' ', '_', $row['pollname']);
            echo "<tr><td>".$row["pollname"]."</td><td><button class = 'but' style = 'font-size:15px;' onclick = fun('$a')>Click here to view this poll</button></td></tr><br>";
        //echo "username: " . $row["username"]. "<br>pollname: " . $row["pollname"]. "<br>description: " . $row["description"]. "<br>opt1: " . $row["opt1"] . "<br>opt2: " . $row["opt2"];
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
        $total = $c1 + $c2 + $c3 + $c4 + $c5; 
    }
    } else {
        echo "Error: " . $res4 . "<br>" . mysqli_error($conn);
    }
    echo "</table>";
    mysqli_close($conn);
?>
    <head>
    <style>
        .error{
                margin-top:270px;
                font-size:30px;
                line-height:52px;
                padding:12px 22px;
                text-align: center;
                margin-left:auto;
                margin-right:auto;
                width:90%;
                border: 1px solid black;
                color:white;
                background-color: blue;
                transition:all 0.6s ease;
                border-radius:10px;
        }
        .error:hover{
            box-shadow:1px 1px 0px darkorchid,
                2px 2px 0px  darkorchid,
                3px 3px 0px  darkorchid,
                4px 4px 0px  darkorchid,
                5px 5px 0px  darkorchid,
                6px 6px 0px  darkorchid;
        }
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
                background-image: url('bg7.jpg');
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
        function fun(x){
            //alert(x);
            document.getElementById('pollname').defaultValue = x.replace("_", " ");
            document.getElementById('sb').click();
        }
    </script>
    </head>
    <body>
        <form id = "myform" action = "myresults.php" style = "visibility:hidden" method = "POST">
            <input type = "text" id = "pollname" name = "pollname" style = "visibility:hidden">
            <input type = "text" id = "username" name = "username" value = "<?php echo $username?>" style = "visibility:hidden">
            <input type = "submit" id = "sb" style = "visibility:hidden">
        </form>
    </body>
</html>