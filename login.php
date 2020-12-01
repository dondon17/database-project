<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/default.css">
    <link rel="stylesheet" href="./css/common.css">
    <link rel="stylesheet" href="./css/login.css">
    <title>login</title>
    
</head>
<body>

    <div class="container">
        <!-- ------------------------------------------------------- -->
        <nav class="topmenu">
            <div class="topmenu-links">
                <a class="topmenu-links-name" href="index.html">DonmoV</a>
                <!-- <a class="topmenu-links-login" href="login.php">로그인</a> -->
            </div>
        </nav>
        <!-- ------------------------------------------------------- -->
        <section class="content-section">
            <h2>어서오세요</h2>
            <form method='get' action='login_action.php'>
                <label for="uname"><strong>User ID</strong></label>
                <input type="text" placeholder="Enter ID" name="id"required>
    
                <label for="psw"><strong>Password</strong></label>
                <input type="password" placeholder="Enter Password"name="pw" required>
                        
                <div class="clearfix">
                    <button type="submit" class="loginbtn"value="login">Login</button>
                    <button type="button" class="signupbtn" value="signup"onclick="location.href='./join.php'">Sign Up</button>
                </div>
            </form>
        </section>
        <!-- ------------------------------------------------------- -->
        <footer class="js-footer">
            <div class="sns_btn">
                <button id="ajou_btn" onclick="">Ajou</button>
            </div>
        </footer>
    </div>

</body>
</html>
