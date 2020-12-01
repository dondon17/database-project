<?php
    session_start();
    session_destroy();
    echo "<script>alert(\"성공적으로 로그아웃 하였습니다.\"); </script>";
?>
<meta http-equiv="refresh" content="0;url=index.html" />