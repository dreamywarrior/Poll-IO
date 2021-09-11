<DOCTYPE HTML>
<head><input type="button" class = "but" name="GoBack" value="Click Here To Go Back" onClick='location.href="optionmenu.php"'></head>
<?php
    $e = $_COOKIE['userr'];
    $n = $_POST['n'];
    $n_arr = explode (",", $n); 
    $c = $_POST['c'];
    $code = $_POST['code'];
    $t = $_POST['t'];
    $content = $_POST['content'];
    $m = $_POST['mode'];
    include("config.php");
    $conn = mysqli_connect($server, $user, $pass, 'poll_io'); 
    if (!$conn){ 
    echo "<p>CONNECTION COULDN'T BE ESTABLISHED RIGHT NOW. TRY AGAIN LATER.<p>";
    }
    else {//echo "<h1>Connected successfully<h1><br>";
    }

    $sql3 = "INSERT INTO polldata (username, pollname, description, code, opt1, opt2, opt3, opt4, opt5)
    VALUES ('$e', '$t', '$content', '$code', '$n_arr[0]', '$n_arr[1]', '$n_arr[2]', '$n_arr[3]', '$n_arr[4]')";
    if (mysqli_query($conn, $sql3)) {
        echo "<div class = 'mode'>Poll created successfully</div>";
    } else {
        echo "Error: " . $sql3 . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
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
                height:300px;
                padding: 20px;
                padding-top:30px;
                background-color: cornflowerblue;
                margin-top: 50px;
                width:max-content;
                border: 2px solid black;
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
                background-image: url('bg2.jpg');
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
        .mode{
           transition: all 0.6s ease;
            margin-left:auto;
            border-radius:5px;
            margin-right:auto;
            padding: 20px;
            font-size: 20px;
            color:white;
            line-height:52px;
            background-color: cornflowerblue;
            margin-top: 50px;
            width:max-content;
            border: 2px solid black;
        }
        .mode:hover{
            box-shadow:1px 1px 0px rgb(34, 209, 240),
            2px 2px 0px rgb(34, 209, 240),
            3px 3px 0px rgb(34, 209, 240),
            4px 4px 0px rgb(34, 209, 240),
            5px 5px 0px rgb(34, 209, 240),
            6px 6px 0px rgb(34, 209, 240);
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
</head>
<body>
    <div class = "display">
    <div class = "header" align="center"> <?php echo $t ?></div><br>
    <div class = "content"> <?php echo $content ?> </div><br>
            <input type = "radio" name = "a" id = "opt1" disabled value = "<?php echo $n_arr[0] ?>"><span id = "op1"><?php echo $n_arr[0] ?></span><br><br>
            <input type = "radio" name = "a" id = "opt2" disabled value = "<?php echo $n_arr[1] ?>"><span id = "op2"><?php echo $n_arr[1] ?></span><br><br>
            <input type = "radio" name = "a" id = "opt3" disabled value = "<?php echo $n_arr[2] ?>"><span id = "op3"><?php echo $n_arr[2] ?></span><br><br>
            <input type = "radio" name = "a" id = "opt4" disabled value = "<?php echo $n_arr[3] ?>"><span id = "op4"><?php echo $n_arr[3] ?></span><br><br>
            <input type = "radio" name = "a" id = "opt5" disabled value = "<?php echo $n_arr[4] ?>"><span id = "op5"><?php echo $n_arr[4] ?></span><br><br>
    </div>
    <input type = "text" name = "m" id = "m" value = "<?php echo $m ?>" style = "visibility:hidden;">
    <input type = "text" name = "c" id = "c" value = "<?php echo $code ?>" style = "visibility:hidden;">
    <div id = "modediv" class = "mode" style = "visibility:hidden;"><?php echo $code ?> - Share this code with people to vote for your poll. </div>        
</body>
<script>
            var mode = document.getElementById('m').value;
            if(mode == "private"){
                document.getElementById('modediv').style.visibility = "visible";
            }
            var t = "";
            t = document.getElementById("opt3").getAttribute("value");
            if(t === ""){
                document.getElementById("opt3").style.display = "none";
                document.getElementById("op3").style.visibility = "hidden";
            }
            t = document.getElementById("opt4").getAttribute("value");
            if(t === ""){
                document.getElementById("opt4").style.display = "none";
                document.getElementById("op4").style.visibility = "hidden";
            }
            t = document.getElementById("opt5").getAttribute("value");
            if(t === ''){
                document.getElementById("opt5").style.display = "none";
                document.getElementById("op5").style.visibility = "hidden";
            }
</script>
</html>