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
            <iframe class="videoarea" width="auto" height="auto" src="https://www.youtube.com/embed/C0DPdy98e4c" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <div class="content-section-review">
                <table class="review-table">
                <?php 
                $query = "select * from review where rvmovid=$movid;";
                $result = $connect->query($query);                
                if(mysqli_num_rows($result) == 0){ ?>
                    <label class="notification message">아직 리뷰가 없습니다.</label>
                <?php }
                else{ ?>                 
                    <label class="notification message">사용자 리뷰</label>
                    <thead>
                        <tr>
                            <th>사용자</th><th>리뷰</th><th>평점</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while($row = mysqli_fetch_assoc($result)){ ?>
                                    <tr>
                                        <td><?php echo $row['rvcusid']; ?></td>
                                        <td><?php echo $row['rvtext']; ?></td>
                                        <td><?php echo $row['rvrating']; ?></td>
                                    </tr>
                            <?php } ?>
                    </tbody>
                <?php } ?>
                </table>
                <form id="reviewform" action="review_action.php" method="post">
                    <strong>평점</strong>
                    <select name="rating" id="rating">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
        
                    
                    <textarea name="inputtextarea" id="reviewform" rows="5rem"></textarea>
                    <div class="clearfix">
                        <input type="hidden" name="movid" value="<?php echo $movid; ?>">
                        <input type="submit" class="addbtn" value="등록">
                        <button type="button" class="rebtn" value="research" onclick="location.href='./mypage.php'">마이페이지로</button>            
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