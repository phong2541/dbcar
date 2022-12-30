<?php

    define('db_server','localhost');
    define('db_user', 'root');
    define('db_pass', '');
    define('db_name', 'ptu_car');

    class db_conn {

        function __construct() {
            $conn = mysqli_connect(db_server,db_user,db_pass,db_name);
            $this->conn = $conn;

            if (mysqli_connect_errno()){
                echo "Failed to connect" . mysqli_connect_errno();
            } 

        }



        public function register1($regi_name,$regi_lname,$regi_id,$regi_pass,$regi_department,$regi_faculty,$regi_position) {
            $reg = mysqli_query($this->conn, "INSERT INTO register(regi_name,regi_lname,regi_id,regi_pass,regi_department,regi_faculty,regi_position) 
            VALUES('$regi_name','$regi_lname','$regi_id','$regi_pass','$regi_department','$regi_faculty','$regi_position')");
            return $reg;
        }

        public function req($objective_rq,$num_passengers,$date_go_rq,$date_back_rq,$pho_rq,$email_rq,$num_id_reg) {
            $req = mysqli_query($this->conn, "INSERT INTO request(objective_rq,num_passengers,date_go_rq,date_back_rq,pho_rq,email_rq,num_id_reg) 
            VALUES('$objective_rq','$num_passengers','$date_go_rq','$date_back_rq','$pho_rq','$email_rq','$num_id_reg')");
            return $req;
        }

        public function formcar($brand_car,$num_seats,$num_doors,$num_wheels,$type_car,$color_car,$license_car) {
            $car = mysqli_query($this->conn, "INSERT INTO car(brand_car,num_seats,num_doors,num_wheels,type_car,color_car,license_car) 
            VALUES('$brand_car','$num_seats','$num_doors','$num_wheels','$type_car','$color_car','$license_car')");
            return $car;
        }

        public function allow_car($allow_car) {
            $allow = mysqli_query($this->conn, "INSERT INTO allow(allow_car) 
            VALUES('$allow_car')");
            return $allow;

        }

        public function signin($regi_id,$regi_pass) {
            $signinquery = mysqli_query($this->conn, "SELECT num_id,regi_name,regi_lname,regi_department,regi_faculty,regi_position FROM register WHERE regi_id =
            '$regi_id'AND regi_pass = '$regi_pass' ");
            return $signinquery;
        }

        public function usernameavailable($regi_id) {
            $checkuser = mysqli_query($this->conn, "SELECT regi_id FROM register WHERE regi_id = 
            '$regi_id' ");
            return $checkuser;
        }
       
        public function db_user($num_id_reg) {
            $user = mysqli_query($this->conn, "SELECT num_id,regi_name,regi_lname,regi_department,regi_faculty,regi_position FROM register WHERE num_id =
            '$num_id_reg' ");
            return $user;

        }

        public function db_rq($num_id) {
            $rq = mysqli_query($this->conn, "SELECT num_id_rq,objective_rq,num_passengers,date_go_rq,date_back_rq,pho_rq,email_rq,num_id_reg FROM request WHERE num_id_reg =
            '$num_id' ");
            return $rq;
        }

        public function rq_all() {
            $section = mysqli_query($this->conn, "SELECT * FROM request");
            return $section;
        }
        public function rq_edit($id) {
            $re_edit = mysqli_query($this->conn, "SELECT * FROM request WHERE num_id_rq='$id'");
            return $re_edit;
        }

        public function formcar_all() {
            $section1 = mysqli_query($this->conn, "SELECT * FROM car");
            return $section1;
        }




        public function rq_update($id,$objective_rq,$num_passengers,$date_go_rq,$date_back_rq,$pho_rq,$email_rq){
            $rq_up = mysqli_query($this->conn,"UPDATE request SET 
            
                objective_rq = '$objective_rq',
                num_passengers ='$num_passengers',
                date_go_rq ='$date_go_rq',
                date_back_rq ='$date_back_rq',
                pho_rq ='$pho_rq',
                email_rq ='$email_rq'
                WHERE num_id_rq = '$id'
            ");

            return $rq_up;
        
        }
        
        public function rq_delete($id) {
            $rq_del = mysqli_query($this->conn , "DELETE FROM request WHERE num_id_rq = '$id'");
            return $rq_del;

        }
    }
    
?>