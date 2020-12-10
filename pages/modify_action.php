<?php
    include '../db.php';
    session_start();
    $connect = OpenCon();
    $id = $_SESSION['cusid'];
    $pw=$_POST['pw'];
    $email=$_POST['email'];
    $phoneno=$_POST['phoneno'];
    $address=$_POST['address'];
    $city=$_POST['city'];
    $zipcode=$_POST['zipcode'];
    $cardno=$_POST['cardno'];
    $acctype=$_POST['acctype'];

    //입력받은 데이터를 DB에 저장
    $query = "update customer set cuspw='$pw', email='$email', address='$address', city='$city', zipcode='$zipcode', phonenum='$phoneno', cardno='$cardno', acctype='$acctype' where cusid='$id'";
    $result = $connect->query($query);

    //저장이 됬다면 (result = true) 가입 완료
    if($result) { ?>      
    <script>
        alert('수정이 성공적으로 완료되었습니다.');
        location.replace("./mypage.php");
    </script>
 
<?php }else{ ?>              
    <script>          
        alert("폼을 정확히 입력하지 않았습니다.");
        location.replace("./setting.php");

</script>
<?php }
    mysqli_close($connect);

?>
