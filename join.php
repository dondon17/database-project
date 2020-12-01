
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/common.css">
        <link rel="stylesheet" href="css/join.css">
        <title>Sign up</title>
    </head>
    <body>
        <h2>Sign Up</h2>

        <div class="container">
            <form class="joinform" method='get' action='join_action.php'>
                <label for="fname"><strong>First Name</strong></label>
                <input type="text" placeholder="Enter First Name" name="fname" required>

                <label for="lname"><strong>Last Name</strong></label>
                <input type="text" placeholder="Enter Last Name" name="lname" required>
                
                <label for="id"><strong>User ID</strong></label>
                <input type="text" placeholder="Enter ID" name="id" required>

                <label for="pw"><strong>Password</strong></label>
                <input type="password" placeholder="Enter Password" name="pw" required>

                <label for="email"><strong>Email</strong></label>
                <input type="text" placeholder="Enter Email" name="email" required>

                <label for="address"><strong>Address</strong></label>
                <input type="text" placeholder="Enter Address" name="address" required>

                <label for="city"><strong>City</strong></label>
                <input type="text" placeholder="Enter city" name="city" required>
                
                <label for="zipcode"><strong>Zipcode</strong></label>
                <input type="text" placeholder="Enter zipcode" name="zipcode" required>
                
                <label for="phoneno"><strong>Phoneno</strong></label>
                <input type="text" placeholder="Enter Phoneno" name="phoneno" required>

                <label for="cardno"><strong>CardNo</strong></label>
                <input type="text" placeholder="Enter CardNo" name="cardno" required>

                <label for="psw"><strong>Account Type</strong></label>
                <input type="radio" id="basic" name="acctype" value="basic"><label for="basic">basic</label>
                <input type="radio" id="premium" name="acctype" value="premium"><label for="premium">premium</label>

                <div class="clearfix">
                    <button type="submit" class="signupbtn" value="signup">Sign Up</button>
                    <button type="button" class="cancelbtn" value="cancel" onclick="location.href='./login.php'">Cancel</button>
                </div>
            </form>
        </div>
    </body>
</html> 
