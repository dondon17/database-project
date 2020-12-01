<!DOCTYPE>
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="css/main.css">
     <title>menu</title>
 </head>
 <body>
    <div class="common_form">
    
        <h1>LOGIN</h1>

        <form method='get' action='login_action.php'>
            <p>id <input name="id" type="text"></p>
            <p>pw <input name="pw" type="password"></p>
            <input type="submit" value="로그인">
        </form>
        <br />
        <button id="join" onclick="location.href='./join.php'">회원가입</button>

    </div>
 </body>
 </html>
