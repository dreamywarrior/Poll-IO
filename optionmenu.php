<doctype html>
<html>
    <head>
        <style>
            button {
                background-color: white; 
                color: black; 
                border-radius:10px;
                width:250px;
                border: none;
                padding: 16px 32px;
                text-align: center;
                margin :2px 2px;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                transition: all 0.6s ease;
                cursor: pointer;
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
                margin-top:50px;
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
            .c{
                transition: all 0.6s ease;
                margin-left:auto;
                border-radius:5px;
                margin-right:auto;
                padding: 10px;
                padding-top:30px;
                background-color: cornflowerblue;
                padding-left:45px;
                padding-right:0px;
                margin-top: 100px;
                width:300px;
                border: 2px solid black;
            }
            .c:hover{
                box-shadow:1px 1px 0px rgb(34, 209, 240),
                2px 2px 0px rgb(34, 209, 240),
                3px 3px 0px rgb(34, 209, 240),
                4px 4px 0px rgb(34, 209, 240),
                5px 5px 0px rgb(34, 209, 240),
                6px 6px 0px rgb(34, 209, 240);
            }
            button:hover{
                background-color: #5cf436;
                color: white;
                box-shadow: 1px 1px 0px black,
                2px 2px 0px #5cf436,
                3px 3px 0px #5cf436,
                4px 4px 0px #5cf436,
                5px 5px 0px #5cf436,
                6px 6px 0px #5cf436;
            }
            html{
                background-image: url('bg8.png');
                background-position: center;
            }
            .user{
                width:fit-content;
                float:left;
                margin-top:-41px;
                padding:5px;
                margin-right:30px;
                color:white;
                border-radius:3px;
                border: 0.5px solid white;
                background-color:rgb(105, 140, 204);
                transition:0.6s all ease;
            }
            .user:hover{
                background-color: rgb(100, 130, 204);
                color: white;
                box-shadow: 1px 1px 0px black,
                2px 2px 0px rgb(34, 209, 240),
                3px 3px 0px rgb(34, 209, 240),
                4px 4px 0px rgb(34, 209, 240),
                5px 5px 0px rgb(34, 209, 240),
                6px 6px 0px rgb(34, 209, 240);
            }
        </style>
    </head>
    <div class = "head" style = "display:inline;">
    <div class = "header" style = "align-items:center;">POLL io</div>
    <div class = "user">Welcome <?php echo $_COOKIE['userr'];?> </div>
        </div>
    <body><div class = "c">
        <button onclick = "location.href = 'createpoll.html'">Create Poll</button><br><br>
        <button onclick = "location.href = 'checkpoll.html'">Vote for a private Poll</button><br><br>
        <button onclick = "location.href = 'publicpoll.php'">Vote for a public Poll</button><br><br>
        <button onclick = "location.href = 'viewmine.php'">View My Polls</button><br><br>
        <button onclick = "location.href = 'about.html'">About</button><br><br>
        <button onclick = "location.href = 'logout.php'">Logout</button><br><br>
        </div>
    </body>
</html>