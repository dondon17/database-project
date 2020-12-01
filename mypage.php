<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/default.css">
    <link rel="stylesheet" href="./css/common.css">
    <link rel="stylesheet" href="./css/mypage.css">
    <title>mypage</title>
</head>
<body>
    <div class="container">
        <!-- ------------------------------------------------------- -->
        <nav class="topmenu">
            <div class="topmenu-links">
                <a class="topmenu-links-name" href="index.html">DonmoV</a>
                <a class="topmenu-links-logout" href="logout.php">로그아웃</a>
            </div>
        </nav>
        <!-- ------------------------------------------------------- -->
        <section class="content-section">
            <?php
                include 'db.php';
                session_start();
                $connect = OpenCon();
                $id = $_SESSION['cusid'];
                $sql = "select movid, title, genre, rating from movie where movid in (select qmovid from moviequeue where qcusid='$id')";
                $result = $connect->query($sql); 
            ?>
            <label align="center"><strong><?php echo $_SESSION['cusid']; ?><?php echo "님의 보유 영화 목록입니다."; ?></strong></label>
            
            <table class="list-table">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>제목</th>
                        <th>장르</th>
                        <th>평점</th>
                    </tr>
                </thead>
                
                <?php 
                while($row = mysqli_fetch_assoc($result)){
                      
                ?>
                    <tbody>
                      <tr>
                        <td><?php echo $row['movid']; ?></td>
                        <td><?php echo $row['title']; ?></a></td>
                        <td><?php echo $row['genre']; ?></td>
                        <td><?php echo $row['rating']; ?></td>
                      </tr>
                    </tbody>
                <?php } ?>
            </table>
                
            <div class="clearfix">
                <button class="searchbtn" value="search" onclick="location.href='./moviesearch.php'">영화 검색</button>  
            </div>
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
