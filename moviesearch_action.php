<!doctype html>
<head>
    <meta charset="UTF-8">
    <title>movie</title>
    <link rel="stylesheet" type="text/css" href="css/common.css"/>
    <link rel="stylesheet" type="text/css" href="css/searchaction.css"/>
</head>
<body>
<div class="container"> 
  <h2>검색 결과</h2>
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
      <button type="button" class="rebtn" value="research" onclick="location.href='./moviesearch.php'">다시 검색</button>
    </div>
  </form>
    
</div>
</body>
</html>