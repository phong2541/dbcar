<?php
    session_start();
    include_once('functions.php');
    $userdata = new db_conn();

    if (isset($_POST['login'])) {
        $uname = $_POST['regi_id'];
        $password = $_POST['regi_pass'];

        $result = $userdata->signin($uname,$password );
        $num = mysqli_fetch_array($result);

        if ($num > 0) {
            $_SESSION['id'] = $num['num_id'];
            $_SESSION['regi_name'] = $num['regi_name'];
            $_SESSION['regi_lname'] = $num['regi_lname'];
            $_SESSION['regi_department'] = $num['regi_department'];
            $_SESSION['regi_faculty'] = $num['regi_faculty'];
            $_SESSION['regi_position'] = $num['regi_position'];
            echo "<script>alert('Login สำเร็จ')</script>";
            echo "<script>window.location.href='welcome.php'</script>";
        } else {
            echo "<script>alert('ไม่สามารถ Login ได้')</script>";
            echo "<script>window.location.href='insex.php'</script>";
        }


    }
    
    

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</head>
<body>

            <div class="container">
                <h1 class="mt-5"> Login</h1>
                <hr>
                <form method="post">
                        <label for="id" class="form-label">User Name</label>
                        <input type="text" class="form-control" id="regi_id" name="regi_id">
                        <spen id="usernameavailable"></spen>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="regi_pass" name="regi_pass">
                    </div>
                <button type="submit" name ="login" class="btn btn-primary">Login</button>
                <a href="Register.php" class="btn btn-primary">Register </a>    
            </form>
            </div>





</body>
</html>