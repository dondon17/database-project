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
    <link rel="stylesheet" href="./css/common.css">
    <link rel="stylesheet" href="./css/search.css">

    <title>movie search</title>
</head>
<body>
    <h2>Movie Search</h2>
    <div class="container">   
 
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

    </div>
</body>
</html>