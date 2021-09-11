<doctype html>
<html>
    <head>
    <button onclick = "location.href = 'optionmenu.php'" class = "but">Go Back To menu</button>
    </head>
<?php
    include("config.php");
    $code = $_POST['poll'];
    if($code != "0000"){
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
        else{
            while($row = mysqli_fetch_assoc($res4)){
            $userrr = $row['username'];
            $t = $row['pollname'];
            $content = $row['description'];
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
        }
    }
    } else {
        echo "Error: " . $res4 . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
    }
    else{
        echo "<script>alert('sorry! not a private code');window.location.replace('checkpoll.html');</script>";
    }
?>
    <style>
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
        input[type = 'radio']{
                background-color:rgb(48, 178, 221);
                box-shadow: 0 0 0 1px #2a5ecf;
                transition:all 0.6s ease
        }
        input[type = 'radio']:hover{
            box-shadow: 0 0 0 1px #6790e7;
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
            margin-right:10px;
            margin-bottom: 10px;
            cursor: pointer;
            display: inline-block;
            align-items: center;
            transition: all 0.5s;
        }
        .but:hover{
            box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19), 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
        }
        .content{
            font-size:20px;
            color:white;
            line-height:40px;
            transition: all 0.6s ease;
        }
        .header:hover{
            box-shadow:0px 1px 0px rgb(34, 209, 240),
            0px 2px 0px rgb(34, 209, 240),
            0px 3px 0px rgb(34, 209, 240);
        }
        .content:hover{
            box-shadow:0px 1px 0px rgb(34, 209, 240),
            0px 2px 0px rgb(34, 209, 240),
            0px 3px 0px rgb(34, 209, 240);
        }
    </style>
    <body>
        <div class = "display">
            <div class = 'header'><?php echo $t ?></div><br>
            <div class = 'content'>Author : <?php echo $userrr?><br><?php echo $content ?> </div><br>
            <input type = "radio" required name = "a" id = "opt1" value = "<?php echo $w1 ?>"><span id = "op1"><?php echo $w1 ?></span>
            <input type = "radio" name = "a" id = "opt2" value = "<?php echo $w2 ?>"><span id = "op2"><?php echo $w2 ?></span>
            <input type = "radio" name = "a" id = "opt3" value = "<?php echo $w3 ?>"><span id = "op3"><?php echo $w3 ?></span>
            <input type = "radio" name = "a" id = "opt4" value = "<?php echo $w4 ?>"><span id = "op4"><?php echo $w4 ?></span>
            <input type = "radio" name = "a" id = "opt5" value = "<?php echo $w5 ?>"><span id = "op5"><?php echo $w5 ?></span><br><br>
            <input type = "button" onclick = "count()" value = "click here to confirm your vote" class = "but"><br><br>
            <input type = "radio" style = "visibility:hidden" name = "a" id = "sub">
            <form id = "myform" method = "POST" action = "result.php" style = "visibility:hidden">
                <input type = "number" id = "val1" name = "val1" value = "<?php echo $c1 ?>">
                <input type = "number" id = "val2" name = "val2" value = "<?php echo $c2 ?>">
                <input type = "number" id = "val3" name = "val3" value = "<?php echo $c3 ?>">
                <input type = "text" id = "userr" name = "userr" value = "<?php echo $userrr ?>">
                <input type = "number" id = "val4" name = "val4" value = "<?php echo $c4 ?>">
                <input type = "number" id = "val5" name = "val5" value = "<?php echo $c5 ?>">
                <input type = "text" id = "code" name = "code" value = "<?php echo $code ?>">
                <input type = "submit" class=  "but" id = "submitbutton">
            </form>
        </div>
    <script>
            var t = "";
            t = document.getElementById("opt3").getAttribute("value");
            if(t == ''){
                document.getElementById("opt3").style.display = "none";
                document.getElementById("op3").style.visibility = "hidden";
            }
            var t = document.getElementById("opt4").getAttribute("value");
            if(t == ''){
                document.getElementById("opt4").style.display = "none";
                document.getElementById("op4").style.visibility = "hidden";
            }
            t = document.getElementById("opt5").getAttribute("value");
            if(t == ''){
                document.getElementById("opt5").style.display = "none";
                document.getElementById("op5").style.visibility = "hidden";
            }
            function count(){
                if(document.getElementById("opt1").checked){
                    var t = parseInt(document.getElementById("val1").value);
                    t += 1;
                    //alert("you clicked one");
                    document.getElementById("val1").value = t; 
                }
                if(document.getElementById("opt2").checked){
                    var t = parseInt(document.getElementById("val2").value);
                    t += 1;
                    //alert("you clicked two");
                    document.getElementById("val2").value = t; 
                }
                if(document.getElementById("opt3").checked){
                    var t = parseInt(document.getElementById("val3").value);
                    t += 1;
                    //alert("you clicked three");
                    document.getElementById("val3").value = t; 
                }
                if(document.getElementById("opt4").checked){
                    var t = parseInt(document.getElementById("val4").value);
                    t += 1;
                    //alert("you clicked four");
                    document.getElementById("val4").value = t; 
                }
                if(document.getElementById("opt5").checked){
                    var t = parseInt(document.getElementById("val5").value);
                    t += 1;
                    //alert("you clicked five");
                    document.getElementById("val5").value = t; 
                }
                document.getElementById("submitbutton").click();
            }
        </script>
    </body>
</html> 
