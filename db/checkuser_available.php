<?php
    include_once('functions.php');

    $usernamecheck = new db_conn();

    $uname = $_POST['regi_id'];
    $sql = $usernamecheck->usernameavailable($uname);
    $num = mysqli_num_rows($sql);

    if ($num > 0 ) {
        echo "<span style='color:red;'>มี Username นี้อยู่แล้ว</span>";
        echo "<script>$('#submit').prop('disabled', true);</script>";
    } else{
        echo "<span style='color:green;'>สามารถใช้ Username นี้ได้</span>";
        echo "<script>$('#submit').prop('disabled', false);</script>";
    }


?>