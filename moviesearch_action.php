<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <title>movie</title>
      <link rel="stylesheet" type="text/css" href="css/default.css"/>
      <link rel="stylesheet" type="text/css" href="css/common.css"/>
      <link rel="stylesheet" type="text/css" href="css/searchaction.css"/>
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

        <table class="list-table">  
          <thead>
                <tr>
                  <th>Movie id</th>
                    <th>Title</th>
                    <th>Genre</th>
                    <th>Copies</th>
                    <th>Rating</th>
                    <th>Select</th>
                  </tr>
                </thead>
            <?php
                include 'db.php';
                session_start();
                $connect = OpenCon();
                $keyword=$_GET['keyword'];
                $input=$_GET['inputkeyword'];
                if($keyword=="actname"){
                  $sql = "select * from movie where movid in (select mamovid from movieactor where maactid in (select actid from actor where $keyword like '%$input%'));";
                }
                else{
                  $sql = "select * from movie where $keyword like '%$input%';";
                }
                $result = $connect->query($sql);
                while($row = mysqli_fetch_assoc($result))
                {
                  
                  ?>
        <form action="./addlist_action.php" method="get">
            <tbody>
              <tr>
                <td><?php echo $row['movid']; ?></td>
                <td><a href=""><?php echo $row['title']; ?></a></td>
                <td><?php echo $row['genre']; ?></td>
                <td><?php echo $row['copies']; ?></td>
                <td><?php echo $row['rating']; ?></td>
                <td><input type="radio" name="movid" value="<? echo $row['movid']; ?>">
                      
              </tr>
            </tbody>
            <?php } ?>
          </table>
          <div class="clearfix">
            <button type="submit" class="addbtn" value="add">리스트에 추가</button>
            <button type="button" class="rebtn" value="research" onclick="location.href='./mypage.php'">다시 검색</button>
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