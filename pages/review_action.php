<?php
    include '../db.php';
    session_start();
    $connect = OpenCon();
    $rvcusid = $_SESSION['cusid'];
    $rvmovid = $_POST['movid'];
    $rvrating = $_POST['rating'];
    $rvtext = $_POST['inputtextarea'];

    $cntquery = "select count(*) cnt from review where rvcusid='$rvcusid' and rvmovid=$rvmovid;";
    $cntresult = $connect->query($cntquery);
    $cntrow = mysqli_fetch_assoc($cntresult);
    
    if(!$cntrow['cnt']){
        $query = "insert into review(rvcusid, rvmovid, rvrating, rvtext) values('$rvcusid', $rvmovid, $rvrating, '$rvtext')";
        $result = $connect->query($query);

        $newcntquery = "select count(*) cnt from review where rvcusid='$rvcusid' and rvmovid=$rvmovid;";
        $newcntresult = $connect->query($newcntquery);
        $newcntrow = mysqli_fetch_assoc($newcntresult);
        if($newcntrow['cnt'] == 1){ ?>
            <script>
                alert('리뷰를 등록했습니다.');
            </script>
        <?php }
        else{ ?>
            <script>
                alert('리뷰를 등록하지 못했습니다.');
            </script>
        <?php }
    }
    else{ ?> 
        <script>
            alert('이미 해당 영화에 리뷰를 작성하셨습니다.');
        </script>
    <?php } ?>
    <script>
        location.replace('./mypage.php');
// history.replaceState({}, "Registration", "playvideo.php?msg=$_POST['movid']");
        // location.reload();
    </script>
