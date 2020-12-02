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
                
                $sql0 = "select acctype from customer where cusid='$id'";
                $res = $connect->query($sql0); 
                $row = mysqli_fetch_assoc($res);

                $sql2 = "delete from orders o where o.duedate < now() and o.ordcusid='$id'";
                $result2 = $connect->query($sql2);                 
                
                $sql = "select movid, title, genre, rating, duedate from movie m, orders o where m.movid=o.ordmovid and o.ordcusid='$id'";
                $result = $connect->query($sql); 
                
            ?>
            <strong><?php echo $_SESSION['cusid']; ?><?php echo '('.$row['acctype'].')'; ?><?php echo "님의 보유 영화 목록입니다."; ?></strong>
            <table class="list-table">
                <thead>
                    <tr>
                        <th>번호</th>
                        <th>제목</th>
                        <th>장르</th>
                        <th>평점</th>
                        <th>만료일</th>
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
                        <td><?php echo $row['duedate']; ?></td>
                      </tr>
                    </tbody>
                <?php } ?>
            </table>
                
            <!-- <div class="clearfix">
                <button class="searchbtn" value="search" onclick="location.href='./moviesearch.php'">영화 검색</button>  
            </div> -->
            <form method='get' action='moviesearch_action.php'>
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
