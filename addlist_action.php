<?php
    include 'db.php';
    session_start();
    $connect = OpenCon();
    $cusid = $_SESSION['cusid'];
    $movid = $_GET['movid'];

    $oldcntsql = "select count(*) cnt from moviequeue where qcusid='$cusid'";
    $oldres = $connect->query($oldcntsql);
    $oldrow = mysqli_fetch_assoc($oldres);

    $query = "call orderMovie('$cusid', $movid)";
    $result = $connect->query($query);
    
    $newcntsql = "select count(*) cnt from moviequeue where qcusid='$cusid'";
    $newres = $connect->query($newcntsql);
    $newrow = mysqli_fetch_assoc($newres);
    if($oldrow['cnt'] != $newrow['cnt']){ ?>
        <script>
            alert('리스트에 추가되었습니다.');
            location.replace("./mypage.php");
        </script>
<?php
    } 
    else{
?>
        <script>
            alert('영화의 잔여 수가 없거나 사용자 계정이 basic 타입입니다.');
            location.replace("./mypage.php");
        </script>
<?php
    }
?>
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/ordermov.css">
    <title>order movie</title>
</head>
<body>
    <div class="container">
        <h2>Order movie</h2>
        <div class="clearfix">
            <button type="button" class="gomypagebtn" onclick="location.href='./mypage.php'">마이페이지</button>
            <button type="button" class="gosearchbtn" onclick="location.href='./moviesearch.php'">검색</button>
        </div>
    </div>
</body>
</html> -->