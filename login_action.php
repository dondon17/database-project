<?php
    include 'db.php';
    session_start();
    $connect = OpenCon();
    
    // login화면에서 입력 받은 id와 password
    $id=$_GET['id'];
    $pw=$_GET['pw'];
    
    //아이디가 있는지 검사
    $query = "select * from customer where cusid='$id'";
    $result = $connect->query($query);
 
 
    //아이디가 있다면 비밀번호 검사
    if($result->num_rows==1) {
 
        $row=mysqli_fetch_assoc($result);
 
        //비밀번호가 맞다면 세션 생성
        if($row['cuspw'] == $pw){
            $_SESSION['cusid']=$id;
            if(isset($_SESSION['cusid'])){
                echo "<script>alert(\"로그인 되었습니다.\"); </script>";
                if($_SESSION['cusid'] == 'admin') {
                    echo "<script>location.replace(\"adminpage.php\"); </script>";
                }
                else {
                    echo "<script>location.replace(\"mypage.php\"); </script>";
                }
            }else{
                echo "session fail";
            }
        }
        else {              
            echo "<script>alert(\"아이디 혹은 비밀번호가 잘못되었습니다.\"); </script>";
            echo "<script>history.back(); </script>";
        }
 
    }
 
    else{              
        echo "<script>alert(\"아이디 혹은 비밀번호가 잘못되었습니다.\"); </script>";
        echo "<script>history.back(); </script>";
    }
?>
