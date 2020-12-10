<?php
    include '../db.php';
    $connect = OpenCon();

    $id=$_POST[id];
    $pw=$_POST[pw];
    $email=$_POST[email];
    $fname=$_POST[fname];
    $lname=$_POST[lname];
    $phoneno=$_POST[phoneno];
    $address=$_POST[address];
    $city=$_POST[city];
    $zipcode=$_POST[zipcode];
    $cardno=$_POST[cardno];
    $acctype=$_POST[acctype];

    //입력받은 데이터를 DB에 저장
    $query = "insert into customer values ('$id', '$pw', '$email', '$fname', '$lname', '$address', '$city', '$zipcode', '$phoneno', concat('acc_', '$id'), '$cardno', '$acctype')";
    $result = $connect->query($query);

    //저장이 됬다면 (result = true) 가입 완료
    if($result) { ?>      
    <script>
        alert('가입 되었습니다.');
        location.replace("./login.html");
    </script>
 
<?php }else{ ?>              
    <script>          
        alert("아이디가 중복되었거나, 폼을 정확히 입력하지 않았습니다.");
        location.replace("./signup.html");

</script>
<?php   }
 
        mysqli_close($connect);
?>
