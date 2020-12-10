<?php
    include '../db.php';
    session_start();
    $connect = OpenCon();
    $id = $_SESSION['cusid'];
    $movid = $_POST['movid'];
    $query = "select title from movie where movid=$movid";
    $result = $connect->query($query);
    $row = mysqli_fetch_assoc($result);
    $title = $row['title'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/videoplay.css">
    <title>video play</title>
</head>
<body>
<div class="container">
        <!-- ------- 공통 top menu(index 페이지를 제외하고 로그아웃으로 변경) ------- -->
        <nav class="topmenu-nav">
            <div class="topmenu-nav-links">
                <a href="../index.html" class="topmenu-nav-links-name">Donmov</a>
                <a href="./logout_action.php" class="topmenu-nav-links-logout">로그아웃</a>
            </div>
        </nav>
        <!-- ------- 가운데 content 영역 (각종 form, db 데이터 호출 결과 등) ------- -->
        <section class="content-section">
            <div class="title-area">
                <h2><?php echo $title; ?></h2>
            </div>
            <iframe width="auto" height="auto" src="https://www.youtube.com/embed/C0DPdy98e4c" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <div>
                <button type="button" class="rebtn" value="research" onclick="location.href='./mypage.php'">마이페이지로</button>            
            </div>
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