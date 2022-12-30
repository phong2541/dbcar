<?php 


    include_once('functions.php');
    if(isset($_GET['id_del'])) {
        $userdata = new db_conn();
        $id = $_GET['id_del'];
        $sql = $userdata->rq_delete($id);


        if($sql) {
            echo "<script>alert('ลบคำขอเรียบร้อย')</script>";
            echo "<script>window.location.href='welcome.php'</script>";
        } 
    }

    
?>