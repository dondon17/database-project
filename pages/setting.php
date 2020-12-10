<?php
    include '../db.php';
    session_start();
    $connect = OpenCon();
    $id = $_SESSION['cusid'];

    $query = "select * from customer where cusid='$id'";
    $result = $connect->query($query);
    $row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/setting.css">

    <title>Donmov</title>
</head>
<body>
    <div class="container">
        <!-- ------- 공통 top menu(index 페이지를 제외하고 로그아웃으로 변경) ------- -->
        <nav class="topmenu-nav">
            <div class="topmenu-nav-links">
                <a href="../index.html" class="topmenu-nav-links-name">Donmov</a>
                <a href="./mypage.php" class="topmenu-nav-links-setting">마이페이지</a>
                <a href="./logout_action.php" class="topmenu-nav-links-logout">로그아웃</a>
            </div>
        </nav>
        <!-- ------- 가운데 content 영역 (각종 form, db 데이터 호출 결과 등) ------- -->
        <section class="content-section">
            <h2>정보 수정</h2>
            <form class="account-setting" action="modify_action.php" method="POST">
                <label for="fname"><strong>First Name</strong></label>
                <input class="fixed-text fname" type="text" placeholder="<?php echo $row['fname']; ?>" name="fname">

                <label for="lname"><strong>Last Name</strong></label>
                <input class="fixed-text lname" type="text" placeholder="<?php echo $row['lname']; ?>" name="lname">
                
                <label for="id"><strong>User ID</strong></label>
                <input class="fixed-text id" type="text" placeholder="<?php echo $row['cusid']; ?>" name="id">

                <label for="pw"><strong>Password</strong></label>
                <input type="password" placeholder="새 비밀번호" name="pw" required>

                <label for="email"><strong>Email</strong></label>
                <input type="text" placeholder="새 이메일(example@example.com)" name="email" required>

                <label for="address"><strong>Address</strong></label>
                <input type="text" placeholder="새 도로명" name="address" required>

                <label for="city"><strong>City</strong></label>
                <input type="text" placeholder="새 도시명" name="city" required>
                
                <label for="zipcode"><strong>Zipcode</strong></label>
                <input type="text" placeholder="새 우편번호" name="zipcode" required>
                
                <label for="phoneno"><strong>Phoneno</strong></label>
                <input type="text" placeholder="새 핸드폰번호(010-xxxx-xxxx)" name="phoneno" required>

                <label for="cardno"><strong>CardNo</strong></label>
                <input type="text" placeholder="새 카드번호(xxxx-xxxx-xxxx-xxxx)" name="cardno" required>

                <label for="acctype"><strong>Account Type</strong></label>
                <input type="radio" id="basic" name="acctype" value="basic"><label for="basic" required>basic</label>
                <input type="radio" id="premium" name="acctype" value="premium" required><label for="premium">premium</label>
                <div class="clearfix">
                    <button type="submit" class="signupbtn" value="signup">수정하기</button>
                    <button type="button" class="cancelbtn" value="cancel" onclick="location.href='./mypage.php'">취소</button>
                </div>
            </form>
        </section>
        <!-- ------------------------- footer 영역 고정 -------------------------- -->
        <footer class="footer-section">
            <div class="footer-section-btn">
                <button id="ajou-univ-btn">AJOU</button>
            </div>
        </footer>
    </div>
</body>
</html>