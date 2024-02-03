<?php
    require('database.php');
    class authentication{

        public function doLogin($username,$password){
            return $this->loginFunction($username,$password);
        }

        public function doRegister($firstname,$lastname,$email,$password, $role){
            return $this->Register($firstname,$lastname,$email,$password, $role);
        }

        private function loginFunction($username,$password){
            try{
                $con = new database();
                if ($con->getStatus()){
                    $query = $con->getCon()->prepare($this->doLoginQuery());
                    $query->execute(array($username, md5($password)));
                    $role = null;
                    $status = null;

                    while($row = $query->fetch()){
                        $role = $row['role'];
                        $status = $row['status'];
                        $_SESSION['userId'] = $row['userId'];
                        $_SESSION['firstname'] = $row['firstname'];
                        $_SESSION['lastname'] = $row['lastname'];
                        $_SESSION['email'] = $row['email'];
                        $_SESSION['role'] = $row['role'];
                    }

                    if($status == 1){
                        if($role == 1){
                            $con->closeConnection();
                            return 1;
                        }else if($role == 3){
                            $con->closeConnection();
                            return 3;
                        }else if($role == 2){
                            $con->closeConnection();
                            return 2;
                        }else{
                            $con->closeConnection();
                            return 400;
                        }
                    }

                }else{
                    $con->closeConnection();
                    return "401";
                }
            } catch (PDOException $th) {
                return $th;
            }
        }

        private function Register($firstname,$lastname,$email,$password, $role){
            try{
                $con = new database();
                if ($con->getStatus()){
                    $query = $con->getCon()->prepare($this->doregisterQuery());
                    $query->execute(array($firstname,$lastname,$email, md5($password), $role));
                    $result = $query->fetch();

                    if (!$result) {
                        $con->closeConnection();
                        return "200";
                    }else{
                        $con->closeConnection();
                        return "400";
                    }
                }else{
                    $con->closeConnection();
                    return "401";
                }
            } catch (PDOException $th) {
                return $th;
            }
        }

        private function doregisterQuery(){
            return "INSERT INTO `users`(`firstname`, `lastname`, `email`, `password`, `role`) VALUES (?,?,?,?,?)";
        }

        private function doLoginQuery(){
            return "SELECT * FROM `users` WHERE `email` = ? AND `password` = ?";
        }
    }
?>