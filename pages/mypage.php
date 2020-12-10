<?php
    include '../db.php';
    session_start();
    $connect = OpenCon();
    $id = $_SESSION['cusid'];

    $query = "select acctype from customer where cusid='$id'";
    $result = $connect->query($query);
    $row = mysqli_fetch_assoc($result);
    $acctype = $row['acctype'];

    // 사용자의 주문 목록 출력 전에 만료 기간이 지난 row는 제거
    $query1 = "delete from orders o where o.duedate < now() and o.ordcusid='$id'";
    $result1 = $connect->query($query1);                 
    
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/main.css">
        <link rel="stylesheet" href="../css/mypage.css">
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
            <div class="content-section-accountinfo">
                <h3>안녕하세요 <?php echo $id.'('.$acctype.')'; ?>님</h3>
            </div>
            <!-- 주문한 영화 목록; premium 계정은 무제한 / basic 계정은 최대 2개 -->
            <div class="content-section-movieinfo">
                <table class="order-list-table">
                    <?php 
                    // query2는 order 테이블 출력
                    $query2 = "select movid, title, genre, rating, duedate from movie m, orders o where m.movid=o.ordmovid and o.ordcusid='$id'";
                    $result2 = $connect->query($query2); 
                    if(mysqli_num_rows($result2) == 0){ ?>
                    
                        <label class="notification message">보유 중인 영화가 없습니다.</label>
                        <?php 
                    }
                    else{ ?>
                        <label class="notification message">보유 중인 영화입니다.</label>
                        <form action="videoplay.php" method="POST">
                        <thead>
                            <tr>
                                <th>번호</th><th>제목</th><th>장르</th><th>평점</th><th>만료일</th><th>선택</th>
                            </tr>
                        </thead>
                        <?php
                        while($row = $result2->fetch_assoc()){ ?>
                        <tbody>
                        <tr>
                            <td><?php echo $row['movid']; ?></td>
                            <td><?php echo $row['title']; ?></td>
                            <td><?php echo $row['genre']; ?></td>
                            <td><?php echo $row['rating']; ?></td>
                            <td><?php echo $row['duedate']; ?></td>
                            <td>
                                <input type="hidden" name="movid" value="<?php echo $row['movid']; ?>">
                                <input name="videoaction" type="submit" value="▶">
                            </td>
                        </tr>
                        </tbody>
                        <?php } ?>
                        </form>
                        <?php } ?>
                </table>
                <!-- 좋아요 누른 영화목록; 계정에 관계없이 좋아요는 무제한으로 추가 가능 -->
                <div class="videoplace"> </div>
                <table class="like-list-table">
                    <?php 
                    
                    // query3는 like 테이블 출력
                    $query3 = "select movid, title, genre, rating, copies from movie m, likes l where m.movid=l.likemovid and l.likecusid='$id'";
                    $result3 = $connect->query($query3); 
                    if(mysqli_num_rows($result3) == 0){ ?>
                        <label class="notification message">좋아요를 누른 영화가 없습니다.</label>
                        <?php }
                    else{ ?>
                        <label class="notification message">좋아요를 누른 영화입니다.</label>
                        <form action="likeaction.php" method="POST">
                        <thead>
                            <tr>
                                <th>번호</th><th>제목</th><th>장르</th><th>평점</th><th>재고</th><th>선택</th>
                            </tr>
                        </thead>
                        <?php
                        while($row2 = $result3->fetch_assoc()){ ?>
                        <tbody>
                        <tr>
                            <td><?php echo $row2['movid']; ?></td>
                            <td><?php echo $row2['title']; ?></td>
                            <td><?php echo $row2['genre']; ?></td>
                            <td><?php echo $row2['rating']; ?></td>
                            <td><?php echo $row2['copies']; ?></td>
                            <td>
                                <input type="hidden" name="movid" value="<?php echo $row2['movid']; ?>">
                                <div class="minibtnbox">
                                    <input name= "likeaction" type="submit" value="주문">
                                    <input name= "likeaction" type="submit" value="삭제">
                                </div>
                            </td>
                        </tr>
                    </tbody>
                    <?php  } ?> 
                        </form>
                    <?php } ?>
                </table>

                <form method="POST" action='searchaction.php'>
                    <strong>검색 키워드</strong>
                    
                    <select name="keyword" id="keyword">
                        <option value="title">제목</option>
                        <option value="actname">배우</option>
                        <option value="genre">장르</option>
                    </select>
        
                    <input type="text" placeholder="Enter keyword" name="inputkeyword" required>
                    
                    <div class="clearfix">
                        <button type="submit" class="searchbtn" value="search">검색</button>
                    </div>
                </form>
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