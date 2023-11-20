<?php
require('database.php');

class user
{
    public function panday()
    {
        return $this->pandayFunction();
    }

    public function jobs()
    {
        return $this->jobsFunction();
    }

    public function userProfile($userId)
    {
        return $this->userProfileFunction($userId);
    }

    public function applicants($userId)
    {
        return $this->applicantsFunction($userId);
    }

    public function applynow($userId, $job_poser)
    {
        return $this->applynowFunction($userId, $job_poser);
    }

    public function storePanday($user_id, $Panday_location, $Panday_skill, $Panday_level)
    {
        return $this->storePandayFunction($user_id, $Panday_location, $Panday_skill, $Panday_level);
    }

    public function storeJobs($job_poser, $picture, $job_title, $job_project, $job_location, $job_require_exp, $job_payment)
    {
        return $this->storeJobsFunction($job_poser, $picture, $job_title, $job_project, $job_location, $job_require_exp, $job_payment);
    }

    public function updateInformation($userId, $picture, $firstname, $lastname, $email, $phn1, $phn2)
    {
        return $this->updateInformationFunction($userId, $picture, $firstname, $lastname, $email, $phn1, $phn2);
    }

    private function storePandayFunction($user_id, $Panday_location, $Panday_skill, $Panday_level)
    {
        try {
            $db = new database();
            if ($db->getStatus()) {
                $query = $db->getCon()->prepare($this->storePandayQuery());
                $query->execute(array($user_id, $Panday_location, $Panday_skill, $Panday_level));
                $result = $query->fetch();
                $db->closeConnection();

                if (!$result) {
                    return 200;
                } else {
                    return 401;
                }
            } else {
                return 501;
            }
        } catch (PDOException $th) {
            throw $th;
        }
    }

    
    private function pandayFunction()
    {
        try {
            $db = new database();
            if ($db->getStatus()) {
                $query = $db->getCon()->prepare($this->pandayQuery());
                $query->execute();
                return json_encode($query->fetchAll());
            } else {
                return 501;
            }
        } catch (PDOException $th) {
            throw $th;
        }
    }
    
    private function jobsFunction()
    {
        try {
            $db = new database();
            if ($db->getStatus()) {
                $query = $db->getCon()->prepare($this->jobsQuery());
                $query->execute();
                return json_encode($query->fetchAll());
            } else {
                return 501;
            }
        } catch (PDOException $th) {
            throw $th;
        }
    }
    
    private function userProfileFunction($userId)
    {
        try {
            $db = new database();
            if ($db->getStatus()) {
                $query = $db->getCon()->prepare($this->userProfileQuery());
                $query->execute(array($userId));
                return json_encode($query->fetchAll());
            } else {
                return 501;
            }
        } catch (PDOException $th) {
            throw $th;
        }
    }
    
    private function applicantsFunction($userId)
    {
        try {
            $db = new database();
            if ($db->getStatus()) {
                $query = $db->getCon()->prepare($this->applicantsQuery());
                $query->execute(array($userId));
                return json_encode($query->fetchAll());
            } else {
                return 501;
            }
        } catch (PDOException $th) {
            throw $th;
        }
    }
    
    private function storeJobsFunction($job_poser, $picture, $job_title, $job_project, $job_location, $job_require_exp, $job_payment)
    {
        try {
            $db = new database();
            if ($db->getStatus()) {
                $query = $db->getCon()->prepare($this->storeJobsQuery());
                $query->execute(array($job_poser, $picture, $job_title, $job_project, $job_location, $job_require_exp, $job_payment));
                $result = $query->fetch();
                $db->closeConnection();

                if (!$result) {
                    return 200;
                } else {
                    return 401;
                }
            } else {
                return 501;
            }
        } catch (PDOException $th) {
            throw $th;
        }
    }
    
    private function updateInformationFunction($userId, $picture, $firstname, $lastname, $email, $phn1, $phn2)
    {
        try {
            $db = new database();
            if ($db->getStatus()) {
                $query = $db->getCon()->prepare($this->updateInformationQuery());
                $query->execute(array($picture, $firstname, $lastname, $email, $phn1, $phn2, $userId));
                $result = $query->fetch();
                $db->closeConnection();

                if (!$result) {
                    return 200;
                } else {
                    return 401;
                }
            } else {
                return 501;
            }
        } catch (PDOException $th) {
            throw $th;
        }
    }
    
    private function applynowFunction($userId, $job_poser)
    {
        try {
            $db = new database();
            if ($db->getStatus()) {
                $query = $db->getCon()->prepare($this->applynowFunctionQuery());
                $query->execute(array($job_poser, $userId));
                $result = $query->fetch();
                $db->closeConnection();

                if (!$result) {
                    return 200;
                } else {
                    return 401;
                }
            } else {
                return 501;
            }
        } catch (PDOException $th) {
            throw $th;
        }
    }

    private function pandayQuery()
    {
        return "SELECT p.Panday_location, p.Panday_skill, p.Panday_level, p.created_at, p.update_at, u.userId, u.profile, u.firstname, u.lastname FROM panday as p INNER JOIN users as u on p.user_id = u.userId";
    }

    private function storePandayQuery()
    {
        return "INSERT INTO `panday`(`user_id`, `Panday_location`, `Panday_skill`, `Panday_level`) VALUES (?,?,?,?)";
    }

    private function storeJobsQuery()
    {
        return "INSERT INTO `jobs`(`job_poser`, `picture`, `job_title`, `job_project`, `job_location`, `job_require_exp`, `job_payment`) VALUES (?,?,?,?,?,?,?)";
    }

    private function jobsQuery()
    {
        return "SELECT * FROM `jobs`";
    }

    private function userProfileQuery()
    {
        return "SELECT * FROM `users` WHERE userId = ?";
    }

    private function updateInformationQuery()
    {
        return "UPDATE `users` SET `profile`= ? ,`firstname`= ? ,`lastname`= ? ,`email`= ?,`phoneNumber`= ? ,`phoneNumber2`= ? WHERE `userId` = ?";
    }

    private function applynowFunctionQuery(){
        return "INSERT INTO `applicants`( `poser_id`, `appliUser_id`) VALUES (?,?)";
    }

    private function applicantsQuery(){
        return "SELECT ap.*, us.profile, us.email, us.firstname, us.lastname FROM `applicants` as ap INNER JOIN users as us ON ap.appliUser_id = us.userId WHERE ap.poser_id = ?";
    }
}
