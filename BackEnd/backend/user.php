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
    public function deletepanday($userId)
    {
        return $this->deletepandayFunction($userId);
    }
    public function deletejob($userId)
    {
        return $this->deletejobFunction($userId);
    }
    public function myPostAsPanday($userId)
    {
        return $this->myPostAsPandayFunction($userId);
    }
    public function myPostAsJob($userId)
    {
        return $this->myPostAsJobFunction($userId);
    }

    public function deleteApplicant($userId)
    {
        return $this->deleteApplicantFunction($userId);
    }

    public function reportUsers($id, $reason, $usid)
    {
        return $this->reportUsersFunction($id, $reason, $usid);
    }

    public function applicants($userId)
    {
        return $this->applicantsFunction($userId);
    }

    public function getAllHireds($userId)
    {
        return $this->getAllHiredsFunction($userId);
    }

    public function applynow($userId, $job_poser)
    {
        return $this->applynowFunction($userId, $job_poser);
    }

    public function hiredsPanday($userId, $hired)
    {
        return $this->hiredsPandayFunction($userId, $hired);
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
    
    private function deletepandayFunction($user_id)
    {
        try {
            $db = new database();
            if ($db->getStatus()) {
                $query = $db->getCon()->prepare($this->deletepandayQuery());
                $query->execute(array($user_id));
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
    private function deletejobFunction($user_id)
    {
        try {
            $db = new database();
            if ($db->getStatus()) {
                $query = $db->getCon()->prepare($this->deletejobQuery());
                $query->execute(array($user_id));
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

    private function hiredsPandayFunction($userId, $hired)
    {
        try {
            $db = new database();
            if ($db->getStatus()) {
                $query = $db->getCon()->prepare($this->hiredsPandayQuery());
                $query->execute(array($userId, $hired));
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

    private function deleteApplicantFunction($userId)
    {
        try {
            $db = new database();
            if ($db->getStatus()) {
                $query = $db->getCon()->prepare($this->deleteApplicantQuery());
                $query->execute(array($userId));
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

    private function getAllHiredsFunction($userId)
    {
        try {
            $db = new database();
            if ($db->getStatus()) {
                $query = $db->getCon()->prepare($this->getAllHiredsQuery());
                $query->execute(array($userId));
                return json_encode($query->fetchAll());
            } else {
                return 501;
            }
        } catch (PDOException $th) {
            throw $th;
        }
    }

    private function myPostAsPandayFunction($userId)
    {
        try {
            $db = new database();
            if ($db->getStatus()) {
                $query = $db->getCon()->prepare($this->myPostAsPandayQuery());
                $query->execute(array($userId));
                return json_encode($query->fetchAll());
            } else {
                return 501;
            }
        } catch (PDOException $th) {
            throw $th;
        }
    }

    private function myPostAsJobFunction($userId)
    {
        try {
            $db = new database();
            if ($db->getStatus()) {
                $query = $db->getCon()->prepare($this->myPostAsJobQuery());
                $query->execute(array($userId));
                return json_encode($query->fetchAll());
            } else {
                return 501;
            }
        } catch (PDOException $th) {
            throw $th;
        }
    }





    private function reportUsersFunction($id, $reason, $usid)
    {
        try {
            $db = new Database();
            if ($db->getStatus()) {

                $stmt = $db->getCon()->prepare($this->reportUsersQuery());
                $stmt->execute(array($id, $reason, $usid));
                $result = $stmt->fetch();

                if (!$result) {
                    return 200;
                } else {
                    return 400;
                }
            } else {
                return "NoDatabaseConnection";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }

    private function pandayQuery()
    {
        return "SELECT p.status, p.Panday_location, p.Panday_skill, p.Panday_level, p.created_at, p.update_at, u.userId, u.profile, u.firstname, u.lastname FROM panday as p INNER JOIN users as u on p.user_id = u.userId";
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
        return "SELECT j.*, u.firstname, u.lastname FROM `jobs` AS j INNER JOIN `users` AS u ON J.job_poser = u.userId;";
    }

    private function userProfileQuery()
    {
        return "SELECT * FROM `users` WHERE userId = ?";
    }

    private function hiredsPandayQuery()
    {
        return "INSERT INTO `hireds`(`user_id`, `user_hired`) VALUES (?,?)";
    }


    private function updateInformationQuery()
    {
        return "UPDATE `users` SET `profile`= ? ,`firstname`= ? ,`lastname`= ? ,`email`= ?,`phoneNumber`= ? ,`phoneNumber2`= ? WHERE `userId` = ?";
    }

    private function applynowFunctionQuery()
    {
        return "INSERT INTO `applicants`( `poser_id`, `appliUser_id`) VALUES (?,?)";
    }

    private function applicantsQuery()
    {
        return "SELECT ap.*, us.profile, us.email, us.firstname, us.lastname FROM `applicants` as ap INNER JOIN users as us ON ap.appliUser_id = us.userId WHERE ap.poser_id = ? ORDER BY ap.created_at DESC";
    }

    private function getAllHiredsQuery()
    {
        return "SELECT u.*, h.hired_id, h.status, h.created_at, h.updated_at FROM `hireds` AS h INNER JOIN `users` AS u ON h.user_hired = u.userId WHERE h.user_id = ? ORDER BY h.created_at desc;";
    }

    private function deleteApplicantQuery()
    {
        return "UPDATE `applicants` SET `status` = 2 WHERE `appliUser_id` = ?";
    }

    private function reportUsersQuery()
    {
        return "INSERT INTO `reports`(`user_id`, `reason`, `reported_id`) VALUES (?,?,?)";
    }

    private function myPostAsPandayQuery()
    {
        return "SELECT p.*, u.profile, u.firstname, u.lastname FROM `panday` AS p INNER JOIN `users` AS u ON p.user_id = u.userId WHERE `user_id` = ?";
    }

    private function myPostAsJobQuery()
    {
        return "SELECT * FROM `jobs` WHERE `job_poser` = ?";
    }

    private function deletepandayQuery()
    {
        return "DELETE FROM `panday` WHERE `id` = ?";
    }
    private function deletejobQuery()
    {
        return "DELETE FROM `jobs` WHERE `job_id` = ?";
    }
}
