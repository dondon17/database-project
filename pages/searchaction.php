<?php
    include '../db.php';
    session_start();
    $connect = OpenCon();
    $id = $_SESSION['cusid'];
    $keyword=$_POST['keyword'];
    $input=$_POST['inputkeyword'];

    if($keyword == "actname"){
        $query = "select * from movie where movid in (select mamovid from movieactor where maactid in (select actid from actor where $keyword like '%$input%'));";
    }else{
        $query = "select * from movie where $keyword like '%$input%';";
    }
    $result = $connect->query($query);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/main.css">
        <link rel="stylesheet" href="../css/searchaction.css">
        <title>css test</title>
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
            <form class="search-result-form" action="addorder_action.php" method="post">
            <table class="searchlist-table">
                <thead>
                    <tr>
                        <th>번호</th>
                        <th>제목</th>
                        <th>장르</th>
                        <th>재고</th>
                        <th>평점</th>
                        <th>추가</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                        if(!mysqli_num_rows($result)){ ?>
                            <p class="notification message">검색 결과가 없습니다.</p>
                        <?php }else{ ?>
                            <p class="notification message">검색 결과</p>
                        <?php while($row = mysqli_fetch_assoc($result)){ ?>
                                <tr>
                                    <td><?php echo $row['movid']; ?></td>
                                    <td><?php echo $row['title']; ?></td>
                                    <td><?php echo $row['genre']; ?></td>
                                    <td><?php echo $row['copies']; ?></td>
                                    <td><?php echo $row['rating']; ?></td>
                                    <td><input type="radio" name="movid" value="<?php echo $row['movid']; ?>"></td>
                                </tr>
                            <?php }
                        }?>
                </tbody>
            </table>
            <div class="clearfix">
                <input name= "addaction" type="submit" value="주문">
                <input name= "addaction" type="submit" value="좋아요">
                <button type="button" class="rebtn" value="research" onclick="location.href='./mypage.php'">다시 검색</button>
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