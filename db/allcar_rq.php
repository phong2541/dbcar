<?php

    session_start();

    include_once('functions.php');
    $userdata_rq = new db_conn();


    $result_all = $userdata_rq->rq_all();
    $count =mysqli_num_rows($result_all);

    $result_car = $userdata_rq->formcar_all();
    $count_car =mysqli_num_rows($result_car);


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
        <h1 class="mt-5">คำขอรอการอนุมัติ</h1>

        <a href="welcome.php" class="btn btn-danger">กลับ</a>
        <?php if ($count_car>0){?>
            <div class="container mt-3" >
            <hr>
            <h3 class="mt-5">ข้อมูลยานพาหนะ</h3>
            <table  class ="table">
                <thead class = "table-dark">
                    <tr>
                        <th>รหัสยานพาหนะ</th>
                        <th>ยี่ห้อยานพาหนะ</th>
                        <th>จำนวนที่นั่ง</th>
                        <th>จำนวนล้อ</th>
                        <th>จำนวนประตู</th>
                        <th>ประเภทยานพาหนะ</th>
                        <th>สีของยานพาหนะ</th>
                        <th>ป้ายทะเบียนยานพาหนะ</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    
                    while($row2=mysqli_fetch_assoc($result_car)){
                        
                        ?>

                        <tr>
                            <td>
                                <?php echo $row2['num_id_car']; ?>
                                
                            </td>
                            
                            <td>
                                <?php echo $row2['brand_car'];?>

                            </td>
                            <td>
                                <?php echo $row2['num_seats'];?>
                            </td>

                            <td>
                                <?php echo $row2['num_doors'];?>
                            </td>
                            
                            <td>
                                <?php echo $row2['num_wheels'];?>
                            </td>

                            <td>
                                <?php echo $row2['type_car'];?>
                            </td>
                            <td>
                                <?php echo $row2['color_car'];?>
                            </td>
                            <td>
                                <?php echo $row2['license_car'];?>
                            </td>
                           
                        </tr>
                    <?php } ?>

                </tbody>
            </table>
            </div>
        <?php }else{?>
            
        <div class="container" >
            <hr>
            <div class="alert alert-primary" role="alert">
                <h2>ไม่มีข้อมูลการขอใช้ยานพาหนะ</h2>
            </div>
        </div>
    <?php }?>


    
    <?php if ($count>0){?>
            <div class="container mt-3" >

            <h3 class="mt-5">รายละเอียดคำขอ</h3>
            <table  class ="table">
                <thead class = "table-dark">
                    <tr>
                        <th>รหัสคำขอ</th>
                        <th>รายละเอียดผู้ขอ</th>
                        <th>รายละเอียดคำขอ</th>
                        <th>สถานะการอนุมัติ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    
                    while($row=mysqli_fetch_assoc($result_all)){
                        
                        ?>

                        <tr>
                            <td>
                                <?php echo $row['num_id_rq']; 
                                
                                ?>
                                
                            </td>
                            
                            <td>

                                <?php
                                    $num_id_reg =$row['num_id_reg'];
                                    // echo $num_id_reg; 
                                    $result_user = $userdata_rq->db_user($num_id_reg);
                                    while($row3=mysqli_fetch_assoc($result_user)){
                                    ?>
                                    
                                    
                                            <p> ชื่อ - นามสกุล : <?php echo $row3['regi_name']; ?> <?php echo $row3['regi_lname']; ?></p>
                                            <p> สาขา : <?php echo $row3['regi_department']; ?> </p>
                                            <p> คณะ : <?php echo $row3['regi_faculty']; ?> </p>
                                            <p> ตำเหน่ง : <?php echo $row3['regi_position']; ?> </p>
                                    <?php }?>
                            </td>
                                
                          
                            
                            <td>
                                
                                <p> ลายละเอียด : <?php echo $row['objective_rq']; ?> </p>
                                <p> จำนวนผู้โดยสาร : <?php echo $row['num_passengers']; ?> </p>
                                <p> วันที่เดินทางไป : <?php echo $row['date_go_rq']; ?> </p>
                                <p> วันที่เดินทางกลับ : <?php echo $row['date_back_rq']; ?> </p>
                                <p> เบอร์ติดต่อ : <?php echo $row['pho_rq']; ?> </p>
                                <p> Email สำหรับติดต่อ : <?php echo $row['email_rq']; ?> </p>
                            
                            </td>
                            <td>
 
                                            <div class = "form-group">
                                                <input type="radio" id="allow_car" name="allow_car" value="allow">อนุณาต
                                                <input type="radio" id="allow_car" name="allow_car" value="no_allow">ไม่อนุณาต
                                                </div>
                                            </div>
                       
                                
                            </td>
                        </tr>
                    <?php } ?>

                </tbody>
            </table>
            </div>
        <?php }else{?>
            
        <div class="container" >
            <hr>
            <div class="alert alert-primary" role="alert">
                <h2>ไม่มีข้อมูลการขอใช้ยานพาหนะ</h2>
            </div>
        </div>
    <?php }?>

<div class="mt-5 p-4 bg-dark text-white text-center">
  <p></p>
</div>
   


</div>
</body>
</html>




