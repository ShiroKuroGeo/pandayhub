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
    public function getAllBestPanday()
    {
        return $this->getAllBestPandayFunction();
    }
    public function getHighestPayment()
    {
        return $this->getHighestPaymentFunction();
    }
    public function userProfile($userId)
    {
        return $this->userProfileFunction($userId);
    }
    public function changeStatus($userId)
    {
        return $this->changeStatusFunction($userId);
    }
    public function applieJob($userId)
    {
        return $this->applieJobFunction($userId);
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
    public function hirer($userId)
    {
        return $this->hirerFunction($userId);
    }
    public function worker($userId)
    {
        return $this->workerFunction($userId);
    }
    public function completeHired($userId, $datestarted, $update_at)
    {
        return $this->completeHiredFunction($userId, $datestarted, $update_at);
    }
    public function workCompleted($userId)
    {
        return $this->workCompletedFunction($userId);
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

    public function applynow($userId, $job_poser, $job_id)
    {
        return $this->applynowFunction($userId, $job_poser, $job_id);
    }

    public function hiredsPanday($userId, $hired)
    {
        return $this->hiredsPandayFunction($userId, $hired);
    }

    public function rateme($id, $rate, $myid)
    {
        return $this->ratemeFunction($id, $rate, $myid);
    }

    public function storePanday($user_id, $Panday_location, $Panday_skill, $Panday_level, $exp)
    {
        return $this->storePandayFunction($user_id, $Panday_location, $Panday_skill, $Panday_level, $exp);
    }

    public function storeJobs($job_poser, $picture, $job_title, $job_project, $job_location, $job_require_exp, $job_payment)
    {
        return $this->storeJobsFunction($job_poser, $picture, $job_title, $job_project, $job_location, $job_require_exp, $job_payment);
    }

    public function updateInformation($userId, $picture, $firstname, $lastname, $email, $phn1, $phn2)
    {
        return $this->updateInformationFunction($userId, $picture, $firstname, $lastname, $email, $phn1, $phn2);
    }

    public function decline($id)
    {
        return $this->declineFuntion($id);
    }

    private function storePandayFunction($user_id, $Panday_location, $Panday_skill, $Panday_level, $exp)
    {
        try {
            $db = new database();
            if ($db->getStatus()) {
                $query = $db->getCon()->prepare($this->storePandayQuery());
                $query->execute(array($user_id, $Panday_location, $Panday_skill, $Panday_level, $exp));
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

    private function applieJobFunction($userId)
    {
        try {
            $db = new database();
            if ($db->getStatus()) {
                $query = $db->getCon()->prepare($this->applieJobQuery());
                $query->execute(array($userId));
                return json_encode($query->fetchAll());
            } else {
                return 501;
            }
        } catch (PDOException $th) {
            throw $th;
        }
    }

    private function getAllBestPandayFunction()
    {
        try {
            $db = new database();
            if ($db->getStatus()) {
                $query = $db->getCon()->prepare($this->getAllBestPandayQuery());
                $query->execute();
                return json_encode($query->fetchAll());
            } else {
                return 501;
            }
        } catch (PDOException $th) {
            throw $th;
        }
    }
    
    private function getHighestPaymentFunction()
    {
        try {
            $db = new database();
            if ($db->getStatus()) {
                $query = $db->getCon()->prepare($this->getHighestPaymentQuery());
                $query->execute();
                return json_encode($query->fetchAll());
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

    private function changeStatusFunction($userId)
    {
        try {
            $db = new database();
            if ($db->getStatus()) {
                $query = $db->getCon()->prepare($this->changeStatusQuery());
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

    private function applynowFunction($userId, $job_poser, $job_id)
    {
        try {
            $db = new database();
            if ($db->getStatus()) {

                $query = $db->getCon()->prepare($this->checkIfAlreadyApplyQuery());
                $query->execute(array($job_poser, $userId));
                $result = $query->fetchAll();

                if ($query->rowCount() < 1) {
                    $query2 = $db->getCon()->prepare($this->applynowFunctionQuery());
                    $query2->execute(array($job_poser, $job_id, $userId));
                    $result2 = $query2->fetch();
                    $db->closeConnection();

                    if (!$result2) {
                        $this->hiredsPandayFunction($job_poser, $userId);
                        return 200;
                    } else {
                        return 401;
                    }
                } else {
                    return 400;
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

    private function ratemeFunction($id, $rate, $myid)
    {
        try {
            $db = new database();
            if ($db->getStatus()) {
                $query = $db->getCon()->prepare($this->ratemeQuery());
                $query->execute(array($rate, $id));
                $result = $query->fetch();
                $db->closeConnection();

                if (!$result) {
                    $this->afterratemeFunction($id, $myid);
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

    private function afterratemeFunction($id, $myid)
    {
        try {
            $db = new database();
            if ($db->getStatus()) {
                $getQuery = $db->getCon()->prepare('UPDATE `hireds` SET `status`= 10 WHERE `user_hired` = ? AND `user_id` = ?');
                $getQuery->execute(array($id, $myid));
                $getResult = $getQuery->fetch();
                $db->closeConnection();

                if (!$getResult) {
                    return 200;
                } else {
                    return 400;
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
    private function deletejobFunction($userId)
    {
        try {
            $db = new database();
            if ($db->getStatus()) {
                $query = $db->getCon()->prepare($this->deletejobQuery());
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
                $query->execute(array($userId, $userId));
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

    private function hirerFunction($userId)
    {
        try {
            $db = new database();
            if ($db->getStatus()) {
                $query = $db->getCon()->prepare($this->hirerQuery());
                $query->execute(array($userId));
                return json_encode($query->fetchAll());
            } else {
                return 501;
            }
        } catch (PDOException $th) {
            throw $th;
        }
    }
    private function workerFunction($userId)
    {
        try {
            $db = new database();
            if ($db->getStatus()) {
                $query = $db->getCon()->prepare($this->workerQuery());
                $query->execute(array($userId));
                return json_encode($query->fetchAll());
            } else {
                return 501;
            }
        } catch (PDOException $th) {
            throw $th;
        }
    }

    private function completeHiredFunction($userId, $datestarted, $update_at)
    {
        try {
            $db = new database();
            if ($db->getStatus()) {
                $query = $db->getCon()->prepare($this->completeHiredQuery());
                $query->execute(array($datestarted, $update_at, $userId));
                $result = $query->fetch();

                if (!$result) {
                    return 200;
                } else {
                    return 400;
                }
            } else {
                return 501;
            }
        } catch (PDOException $th) {
            throw $th;
        }
    }

    private function workCompletedFunction($userId)
    {
        try {
            $db = new database();
            if ($db->getStatus()) {
                $query = $db->getCon()->prepare($this->workCompletedQuery());
                $query->execute(array($userId));
                $result = $query->fetch();

                if (!$result) {
                    return 200;
                } else {
                    return 400;
                }
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

    private function declineFuntion($id)
    {
        try {
            $db = new Database();
            if ($db->getStatus()) {

                $stmt = $db->getCon()->prepare($this->DeclineQuery());
                $stmt->execute(array($id));
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
        return "SELECT p.status, p.Panday_location, p.Panday_skill, p.Panday_level, p.created_at, p.update_at, u.userId, u.profile, u.firstname, u.lastname, u.rating, u.no_of_rating FROM panday as p INNER JOIN users as u on p.user_id = u.userId";
    }

    private function storePandayQuery()
    {
        return "INSERT INTO `panday`(`user_id`, `Panday_location`, `Panday_skill`, `Panday_level`, `panday_exp`) VALUES (?,?,?,?,?)";
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

    private function checkIfAlreadyApplyQuery()
    {
        return "SELECT * FROM `applicants` WHERE `poser_id` = ? AND `appliUser_id` = ?";
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
        return "INSERT INTO `applicants`( `poser_id`,`job_id`, `appliUser_id`) VALUES (?,?,?)";
    }

    private function applicantsQuery()
    {
        return "SELECT ap.*, us.profile, us.email, us.firstname, us.lastname FROM `applicants` as ap INNER JOIN users as us ON ap.appliUser_id = us.userId WHERE ap.poser_id = ? ORDER BY ap.created_at DESC";
    }

    private function getAllHiredsQuery()
    {
        return "SELECT u.*,client.userId as cuid, client.firstname as poserfirst, client.lastname as poserlast, h.appli_id, h.status, h.created_at, h.updated_at, h.status as appstats FROM `applicants` AS h INNER JOIN `users` AS u ON h.appliUser_id = u.userId INNER JOIN `users` AS client ON client.userId = h.poser_id WHERE h.appliUser_id = ? OR h.poser_id = ? ORDER BY h.created_at desc;";
    }

    private function deleteApplicantQuery()
    {
        return "UPDATE `panday` SET `status` = 2 WHERE `user_id` = ?";
    }

    private function completeHiredQuery()
    {
        return "UPDATE `hireds` SET `status` = 5, `date_started` = ?, `updated_at` = ? WHERE `user_hired` = ?";
    }

    private function changeStatusQuery()
    {
        return "UPDATE `panday` SET `status` = 1 WHERE `user_id` = ?";
    }

    private function workCompletedQuery()
    {
        return "UPDATE `hireds` SET `status` = 4 WHERE `user_hired` = ?";
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
    private function DeclineQuery()
    {
        return "UPDATE `applicants` SET `status` = 3 WHERE `appliUser_id` = ?";
    }
    private function applieJobQuery()
    {
        return 'SELECT ap.*, jo.picture, jo.job_title, jo.job_project, jo.job_location, jo.job_require_exp, jo.projectType, jo.job_payment, jo.job_status, poser.firstname as poserfirst, poser.lastname as poserLast FROM `applicants` AS ap INNER JOIN `jobs` AS jo INNER JOIN `users` AS poser INNER JOIN `users` AS appli ON ap.poser_id = poser.userId AND ap.appliUser_id = appli.userId AND ap.job_id = jo.job_id WHERE ap.appliUser_id = ? ORDER BY ap.created_at DESC';
    }
    private function hirerQuery()
    {
        return 'SELECT h.status,h.hired_id, hirer.firstname AS hirerfirst, hirer.lastname AS hirerlast, hired.firstname AS hiredfirst, hired.lastname AS hiredlast, hired.profile, h.user_hired FROM hireds AS h INNER JOIN users as hirer ON h.user_id = hirer.userId INNER JOIN users AS hired ON hired.userId = h.user_hired WHERE h.user_id = ?';
    }
    private function workerQuery()
    {
        return 'SELECT h.status,h.hired_id, hirer.firstname AS hirerfirst, hirer.lastname AS hirerlast, worker.firstname AS hiredfirst, worker.lastname AS hiredlast, worker.profile, h.user_hired FROM hireds AS h INNER JOIN users as hirer ON h.user_id = hirer.userId INNER JOIN users AS worker ON worker.userId = h.user_hired WHERE h.user_hired = ?';
    }
    private function ratemeQuery()
    {
        return 'UPDATE `users` SET `rating`= `rating` + ?, `no_of_rating`= `no_of_rating` + 1 WHERE `userId` = ?';
    }
    private function getAllBestPandayQuery()
    {
        return 'SELECT * FROM `users` ORDER BY `rating` DESC LIMIT 4';
    }
    private function getHighestPaymentQuery()
    {
        return 'SELECT * FROM `jobs` ORDER BY `job_payment` DESC LIMIT 4';
    }
}
