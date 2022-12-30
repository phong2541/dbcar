<?php
    include_once('functions.php');
    $userdata = new db_conn();

    if (isset($_POST['submit'])){
        $regi_name = $_POST['regi_name'];
        $regi_lname = $_POST['regi_lname'];
        $regi_id = $_POST['regi_id'];
        $regi_pass = $_POST['regi_pass'];
        $regi_department= $_POST['regi_department'];
        $regi_faculty = $_POST['regi_faculty'];
        $regi_position = $_POST['regi_position'];
        
     
        if($regi_name && $regi_lname && $regi_id && $regi_pass && $regi_department && $regi_faculty && $regi_position !=""){
    
            $sql = $userdata->register1($regi_name,$regi_lname,$regi_id,$regi_pass,$regi_department, $regi_faculty,$regi_position);

            if($sql) {
                echo "<script>alert('Registered Successfully!')</script>";
                echo "<script>window.location.href='index.php'</script>";
            } else {
                echo "<script>alert('Registration Failed!')</script>";
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
                <h1 class="mt-5"> Register</h1>
                <hr>
                <form method="post">
                    <div class="mb-3">
                        <label for="Fullname" class="form-label">ชื่อ</label>
                        <input type="text" class="form-control" id="regi_name" name="regi_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="Lname" class="form-label">นามสกุล</label>
                        <input type="text" class="form-control" id="regi_lname" name="regi_lname" required>
                    </div>
                    <div class="mb-3">
                        <label for="id" class="form-label">User Name</label>
                        <input type="text" class="form-control" id="regi_id" name="regi_id" required onblur="checkusername(this.value)">
                        <spen id="usernameavailable"></spen>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="regi_pass" name="regi_pass" required>
                    </div>
                    <div class="mb-3">
                        <label for="department" class="form-label">สาขา</label>
                        <input type="text" class="form-control" id="regi_department" name="regi_department" required>
                    </div>
                    <div class="mb-3">
                        <label for="faculty" class="form-label">คณะ</label>
                        <input type="text" class="form-control" id="regi_faculty" name="regi_faculty" required>
                    </div>
                    <div class = "form-group" >
                        <label for="regi_position">ตำแหน่ง</label>
                        <input type="radio" id="regi_position" name="regi_position" value="teacher">อาจารย์
                        <input type="radio" id="regi_position" name="regi_position" value="general_staff">เจ้าหน้าที่ทั่วไป
                        <input type="radio" id="regi_position" name="regi_position" value="car_attendant">เจ้าหน้าที่ดูแลรถ
                        <input type="radio" id="regi_position" name="regi_position" value="director">ผู้อำนวยการ
                        </div>
                    </div>
                    <div class="container">
                        
                        <button type="submit" name ="submit" id="submit" class="btn btn-primary">Register</button>
                        <a href="index.php" class="btn btn-danger">กลับ</a>
                    </div>
                </form>
            </div>



    <script src ="https://code.jquery.com/jquery-3.6.1.min.js"></script>
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
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>


</body>
</html>