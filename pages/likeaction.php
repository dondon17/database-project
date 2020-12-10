<?php
    include '../db.php';
    session_start();
    $connect = OpenCon();
    $cusid = $_SESSION['cusid'];
    $movid = $_POST['movid'];

    if($_POST['likeaction'] == "주문"){
        
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
        } else{
        ?>
            <script>
                alert('영화의 잔여 수가 없거나 사용자 계정이 basic 타입입니다.');
                location.replace("./mypage.php");
            </script>
        <?php
        }
    } 
    else if($_POST['likeaction'] == "삭제"){
        $query = "delete from likes where likemovid=$movid";
        $result = $connect->query($query);

        $cntsql = "select count(*) cnt from likes where likecusid='$cusid' and likemovid=$movid";
        $cntres = $connect->query($cntsql);
        $cntrow = mysqli_fetch_assoc($cntres);

        if($cntrow['cnt'] == 0){ ?>
            <script>
                alert('좋아요 리스트에서 삭제되었습니다.');
                location.replace("./mypage.php");
            </script>
        <?php }
        else{ ?>
            <script>
                alert('삭제하지 못했습니다.');
                location.replace("./mypage.php");
            </script>
        <?php }
    }
?>
    