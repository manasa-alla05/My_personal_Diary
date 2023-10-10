
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Cache-control" content="no-cache">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make Your Personal Note</title>
    <style>     
        .hero
        {
            height:100%;
            width:100%;
            background-image: linear-gradient(rgba(0,0,0,0.2),rgba(0,0,0,0.2)),url(images/back1.jpg);
            background-position: center;
            background-size: cover;
            position:absolute;
        }
        .form-box
        {
            width: 380px;
            height: 480px;
            margin:4% ;
            position:relative;
            background:#fff;
            padding:5px;
            overflow:hidden;
        }
        .button-box
        {
            width:220px;
            margin:35px auto;
            position:relative;
            box-shadow:0 0 20px 9px #ff61241f;
            border-radius:30px;
        }
        .toggle-btn
        {
            padding:10px 30px;
            cursor:pointer;
            background: transparent;
            border:0;
            outline:none;
            position:relative;
        }
        .input-group
        {
            top: 180px;
            position:absolute;
            width:280px;
            transition: .5s;

        }
        .input-field
        {
            width:100%;
            padding:10px 0;
            margin:5px 0;
            border-left:0;
            border-top:0;
            border-right:0;
            border-bottom:1px solid #999;
            outline:none;
            background:transparent;
        }
        .Submit-btn
        {
            width:85%;
            padding:10px 30px;
            cursor:pointer;
            display:block;
            margin:auto;
            background:linear-gradient(to right,#ff105f,#b1862f);
            border:0;
            outline:none;
            border-radius:30px;
        }
        .check-box
        {
            margin:30px 10px 30px 0;

        }
        span{
            color:#777;
            font-size:12px;
            bottom:68px;
            position:absolute;
        }
        #login{
            left:50px;
        }
        #register
        {
            left:450px;
        }
        #btn 
        {
            top:0;
            left:0;
            position:absolute;
            width:110px;
            height:100%;
            background:linear-gradient(to right,#e41057,#bd8921);
            outline:none;
            border-radius:30px; 
            transition:.5s;  
        }
        .form-box .input-group .error-msg
        {
            margin:10px 0;
            display:block;
            background:crimson;
            color:#fff;
            border-radius:5px;
            font-size:20px;
        }
        .backt{
            position: relative;
            left:70px;
            top:40px;
            color:black;

        }
    </style>
</head>
<body>
    <div class="hero">
    <a href="hell.html" class="backt"><strong class="t"> HOME</strong></a>
        <div class="form-box">
            <div class="button-box">
                <div id="btn"></div>
                <button type="button" class="toggle-btn" onclick="login()">
                        Log in
                </button>
                <button type="button" class="toggle-btn" onclick="register()">
                    Register
            </button>
            </div>
            <form action="authentication.php" method="POST" name="login" id="login" class="input-group">
                <input type="text" name="user_in" class="input-field" placeholder="User Id" required> <br>
                <input type="password" name="password_in" class="input-field" placeholder="enter password" required> <br>
                <input type="checkbox" class="check-box" placeholder="remember password" > <span>remember Password</span><br>
                <button type="submit" name="login" class="Submit-btn">Log in</button>   
            </form>
            <form action="php1.php" method="POST" id="register" class="input-group">
            <?php
            if(isset($error))
            {
                foreach($error as $error)
                {
                    echo '<span class="error-msg">'.$error.'</span>';
                };
            };
            ?>
                <input type="text" name="user_id" class="input-field" placeholder="User Id" required> <br>
                <input type="email" name="email" class="input-field" placeholder="enter email" required> <br>
                <input type="password" name="password" class="input-field" placeholder="enter password" > <br>
                <input type="checkbox" class="check-box" placeholder="remember password" > <span>i agree to the terms & conditions</span><br>
                <button type="submit" name="Register" class="Submit-btn">Register</button>
                </form>
        </div>
    </div>
    <script>
        var x=document.getElementById("login");
        var y=document.getElementById("register");
        var z=document.getElementById("btn");
        function register()
        {
            x.style.left="-400px";
            y.style.left="50px";
            z.style.left="110px";
        }
        function login()
        {
            x.style.left="50px";
            y.style.left="450px";
            z.style.left="0px";
        }
    </script>
</body>
</html>