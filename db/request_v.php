<?php
    include_once('functions.php');
    $userdata1 = new db_conn();
    session_start();
    if (isset($_POST['submit1'])){
        $objective_rq = $_POST['objective_rq'];
        $num_passengers = $_POST['num_passengers'];
        $date_go_rq = $_POST['date_go_rq'];
        $date_back_rq = $_POST['date_back_rq'];
        $pho_rq= $_POST['pho_rq'];
        $email_rq = $_POST['email_rq'];
        $num_id_reg = $_SESSION['id'];

        $sql1 = $userdata1->req($objective_rq,$num_passengers,$date_go_rq,$date_back_rq,$pho_rq, $email_rq,$num_id_reg);

        if($sql1) {
            echo "<script>alert('ส่งคำขอเรียบร้อย')</script>";
            echo "<script>window.location.href='welcome.php'</script>";
        } else {
            echo "<script>alert('มีบางอย่างผิดพลาดโปรดตรวจสอบข้อมูล')</script>";
        }

    };

?>



<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    
    <title>request</title>
</head>
<body>
    <div class="container">
        <h1 class="mt-5">การขอใช้ยานพาหนะของคุณ  <?php echo $_SESSION['regi_name']; ?> <?php echo $_SESSION['regi_lname']; ?> <?php echo $_SESSION['id']; ?> </h1>
        <hr>
        <p> ชื่อ - นามสกุล : <?php echo $_SESSION['regi_name']; ?> <?php echo $_SESSION['regi_lname']; ?></p>
        <p> สาขา : <?php echo $_SESSION['regi_department']; ?> </p>
        <p> คณะ : <?php echo $_SESSION['regi_faculty']; ?> </p>
        <p> ตำเหน่ง: <?php echo $_SESSION['regi_position']; ?> </p>
        <a href="welcome.php" class="btn btn-danger">กลับ</a>
        
    </div>

    <div class="container">
                <h1 class="mt-5"> กรุณากรอกลายละเอียด</h1>
                <hr>
                <form method="post">
                    <div class="mb-3">
                        <label for="objective" class="form-label">จุดประสงค์ในการขอใช้ยานพาหนะ : </label>
                        <input type="text" class="form-control" id="objective_rq" name="objective_rq" required>
                    </div>
                    <div class="mb-3">
                        <label for="num_passengers" class="form-label">จำนวนผู้โดยสาร :</label>
                        <input type="text" class="form-control" id="num_passengers" name="num_passengers" required>
                    </div>
                    <div class="mb-3">
                        <label for="date_go_rq" class="form-label">วันที่เดินทางไป :</label>
                        <input type="date" id="date_go_rq" name="date_go_rq" required>
                    </div>
                    <div class="mb-3">
                        <label for="date_back_rq" class="form-label">วันที่เดินทางกลับ :</label>
                        <input type="date" id="date_back_rq" name="date_back_rq" required>
                    </div>
                    <div class="mb-3">
                        <label for="pho_rq" class="form-label">เบอร์ติดต่อ :</label>
                        <input type="text" class="form-control" id="pho_rq" name="pho_rq" required>
                    </div>
                    <div class="mb-3">
                        <label for="email_rq" class="form-label">Email สำหรับติดต่อ :</label>
                        <input type="text" class="form-control" id="email_rq" name="email_rq" required>
                    </div>
                   
                    <button type="submit" name ="submit1" id="submit1" class="btn btn-primary">ส่งคำขอ</button>
                </form>
                
            </div>



<script src ="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>


</body>
</html>








