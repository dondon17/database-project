<?php
    include 'db.php';
    session_start();
    $connect = OpenCon();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/default.css">
    <link rel="stylesheet" href="./css/common.css">
    <link rel="stylesheet" href="./css/search.css">

    <title>movie search</title>
</head>
<body>
    <div class="container">   
        <!-- -------------------------- top menu bar --------------------------- -->
        <nav class="topmenu">
            <div class="topmenu-links">
                <a class="topmenu-links-name" href="index.html">DonmoV</a>
                <a class="topmenu-links-logout" href="logout.php">로그아웃</a>
            </div>
        </nav>
        <!-- -------------------------- content section --------------------------- -->
        <section class="content-section">
            <form method='get' action='moviesearch_action.php'>
                <label for="keyword"><strong>키워드</strong></label>
                <select name="keyword" id="keyword">
                    <option value="title">제목</option>
                    <option value="actname">배우</option>
                    <option value="genre">장르</option>
                </select>
    
                <input type="text" placeholder="Enter keyword" name="inputkeyword" required>
                
                <div class="clearfix">
                    <button type="submit" class="searchbtn" value="search">검색</button>
                    <button type="button" class="cancelbtn" value="cancel" onclick="location.href='./mypage.php'">마이페이지로</button>
                </div>
            </form>
        </section>
        <!-- ----------------------------- footer ----------------------------- -->
        <footer class="js-footer">
            <div class="sns_btn">
                <button id="ajou_btn" onclick="">Ajou</button>
            </div>
        </footer>
    </div>
</body>
</html>