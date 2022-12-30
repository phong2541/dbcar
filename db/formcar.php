<?php
    include_once('functions.php');
    $userdata = new db_conn();

    if (isset($_POST['submit'])){
        $brand_car = $_POST['brand_car'];
        $num_seats = $_POST['num_seats'];
        $num_wheels = $_POST['num_wheels'];
        $type_car = $_POST['type_car'];
        $color_car= $_POST['color_car'];
        $license_car = $_POST['license_car'];
        $num_doors = $_POST['num_doors'];
        
     
        if($brand_car && $num_seats && $num_wheels && $type_car && $color_car && $license_car && $num_doors !=""){
    
            $sql = $userdata->formcar($brand_car,$num_seats,$num_wheels,$type_car,$color_car, $license_car,$num_doors);

            if($sql) {
                echo "<script>alert('เพิ่มข้อมูลรถเรียบร้อย')</script>";
            } else {
                echo "<script>alert('กรุณาตรวจสอบข้อมูลใหม่')</script>";
            }
        } else {    
            echo "<script>alert('กรุณากรอกข้อมูลให้ครบถ้วน')</script>";
        }
    };

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    </head>
<body>

            <div class="container">
                <h1 class="mt-5"> เพิ่มข้อมูลยานพาหนะ</h1>
                <hr>
                <form method="post">
                    <div class="mb-3">
                        <label for="brand_car" class="form-label">ยี่ห้อยานพาหนะ</label>
                        <input type="text" class="form-control" id="brand_car" name="brand_car" required>
                    </div>
                    <div class="mb-3">
                        <label for="num_seats" class="form-label">จำนวนที่นั่ง</label>
                        <input type="text" class="form-control" id="num_seats" name="num_seats" required>
                    </div>
                    <div class="mb-3">
                        <label for="num_wheels" class="form-label">จำนวนล้อ</label>
                        <input type="text" class="form-control" id="num_wheels" name="num_wheels" required>

                    </div>
                    <div class="mb-3">
                        <label for="type_car" class="form-label">ประเภทยานพาหนะ</label>
                        <input type="text" class="form-control" id="type_car" name="type_car" required>
                    </div>
                    <div class="mb-3">
                        <label for="color_car" class="form-label">สีของยานพาหนะ</label>
                        <input type="text" class="form-control" id="color_car" name="color_car" required>
                    </div>
                    <div class="mb-3">
                        <label for="license_car" class="form-label">ป้ายทะเบียนยานพาหนะ</label>
                        <input type="text" class="form-control" id="license_car" name="license_car" required>
                    </div>
                        <div class = "mb-3">
                            <label for="num_doors">จำนวนประตู</label>
                            <input type="text" class="form-control" id="num_doors" name="num_doors" required>
                        </div>

                <div class="container">
                        
                        <button type="submit" name ="submit" id="submit" class="btn btn-primary">เพิ่มข้อมูลยานพาหนะ</button>
                        <a href="car.php" class="btn btn-danger">กลับ</a>
                    </div>
                </form>
            </div>



    <!-- <script src ="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script> 
        function checkusername(val){
            $.ajax ({
                type: 'POST',
                url: 'checkuser_available.php',
                data: 'regi_id='+val,
                success: function (data) {
                    $('#usernameavailable').html(data);
                }
            });

        }
    </script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>


</body>
</html>