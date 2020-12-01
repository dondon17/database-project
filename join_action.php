<?php
    include 'db.php';
    $connect = OpenCon();

    $id=$_GET[id];
    $pw=$_GET[pw];
    $email=$_GET[email];
    $fname=$_GET[fname];
    $lname=$_GET[lname];
    $phoneno=$_GET[phoneno];
    $address=$_GET[address];
    $city=$_GET[city];
    $zipcode=$_GET[zipcode];
    $cardno=$_GET[cardno];
    $acctype=$_GET[acctype];
    //입력받은 데이터를 DB에 저장
    $query = "insert into customer values ('$id', '$pw', '$email', '$fname', '$lname', '$address', '$city', '$zipcode', '$phoneno', concat('_acc', '$id'), '$cardno', '$acctype')";
    $result = $connect->query($query);
    //저장이 됬다면 (result = true) 가입 완료
    if($result) {
?>      <script>
        alert('가입 되었습니다.');
        location.replace("./login.php");
        </script>
 
<?php   }else{ ?>              
<script>          
            alert("아이디가 중복되었거나, 폼을 정확히 입력하지 않았습니다.");
            location.replace("./join.php");

</script>
<?php   }
 
        mysqli_close($connect);
?>
