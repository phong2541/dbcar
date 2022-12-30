<?php

    session_start();

    if ($_SESSION['id'] == ""){
        header("location: index.php");

    } else {

    include_once('functions.php');
    $userdata_rq = new db_conn();
    $userid = $_SESSION['id'];
    $result_rq = $userdata_rq->db_rq($userid);
    $num = mysqli_fetch_array($result_rq);
    if ($num > 0) {
        $_SESSION['num_id_rq'] = $num['num_id_rq'];
        $_SESSION['objective_rq'] = $num['objective_rq'];
        $_SESSION['num_passengers'] = $num['num_passengers'];
        $_SESSION['date_go_rq'] = $num['date_go_rq'];
        $_SESSION['date_back_rq'] = $num['date_back_rq'];
        $_SESSION['pho_rq'] = $num['pho_rq'];
        $_SESSION['email_rq'] = $num['email_rq'];
    } else {
        $_SESSION['num_id_rq'] = "ไม่มีข้อมูล";
        $_SESSION['objective_rq'] = "ไม่มีข้อมูล";
    }

    $result_all = $userdata_rq->db_rq($userid);
    $count =mysqli_num_rows($result_all);


?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Welcome</title>
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Welcome, <?php echo $_SESSION['regi_name']; ?> <?php echo $_SESSION['regi_lname']; ?></h1>
        <hr>
        <p> ชื่อ - นามสกุล : <?php echo $_SESSION['regi_name']; ?> <?php echo $_SESSION['regi_lname']; ?></p>
        <p> สาขา : <?php echo $_SESSION['regi_department']; ?> </p>
        <p> คณะ : <?php echo $_SESSION['regi_faculty']; ?> </p>
        <p> ตำเหน่ง: <?php echo $_SESSION['regi_position']; ?> </p>
        <a href="request_v.php" class="btn btn-success">ขอใช้รถ</a>
            <?php
                if ($_SESSION['regi_position'] == "car_attendant"){ ?>
                    <a href="car.php" class="btn btn-success ">ตรวจสอบคำขอใช้ยานพาหนะและดูข้อมูลยานพาหนะ</a>
            <?php }?>
            <?php
                if ($_SESSION['regi_position'] == "director"){ ?>
                    <a href="car.php" class="btn btn-success ">ตรวจสอบคำขอใช้ยานพาหนะ</a>
            <?php }?>
        <a href="logout.php" class="btn btn-danger">Logout</a>
        
    
    <?php if ($count>0){?>
            <div class="container mt-3" >
            <hr>
            <table  class ="table">
                <thead class = "table-dark">
                    <tr>
                        <th>รหัสคำขอ</th>
                        <th>ลายละเอียดคำขอ</th>
                        <th>สถานะการอนุมัติ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    
                    while($row=mysqli_fetch_assoc($result_all)){?>
                        <tr>
                            <td>
                                <?php echo $row['num_id_rq']; ?>
                                
                            </td>
                            <td>
                                <p> ชื่อ - นามสกุล : <?php echo $_SESSION['regi_name']; ?> <?php echo $_SESSION['regi_lname']; ?></p>
                                <p> สาขา : <?php echo $_SESSION['regi_department']; ?> </p>
                                <p> คณะ : <?php echo $_SESSION['regi_faculty']; ?> </p>
                                <p> ตำเหน่ง : <?php echo $_SESSION['regi_position']; ?> </p>
                                <p> ลายละเอียด : <?php echo $row['objective_rq']; ?> </p>
                                <p> จำนวนผู้โดยสาร : <?php echo $row['num_passengers']; ?> </p>
                                <p> วันที่เดินทางไป : <?php echo $row['date_go_rq']; ?> </p>
                                <p> วันที่เดินทางกลับ : <?php echo $row['date_back_rq']; ?> </p>
                                <p> เบอร์ติดต่อ : <?php echo $row['pho_rq']; ?> </p>
                                <p> Email สำหรับติดต่อ : <?php echo $row['email_rq']; ?> </p>
                                <a href="edit.php?id_rq=<?php echo $row['num_id_rq'];?> " class="btn btn-primary">แก้ไขข้อมูล</a>
                                <a href="delete.php?id_del=<?php echo $row['num_id_rq'];?>" class="btn btn-danger">ยกเลิกคำขอ</a>
                            
                            </td>
                            <td>รอการอนุมัติ</td>
                        </tr>
                    <?php } ?>

                </tbody>
            



            </table>
            </div>
        <?php }else{?>
            
        <div class="container" >
            <hr>
            <div class="alert alert-primary" role="alert">
                <h2>ไม่มีข้อมูลการขอใช้ยานพาหนะของคุณ</h2>
            </div>
        </div>
    <?php }?>

<div class="mt-5 p-4 bg-dark text-white text-center">
  <p></p>
</div>
   


</div>
</body>
</html>





<?php

    }

?>
