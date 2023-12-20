<?php
require('database.php');

class admin
{
    public function getUsers()
    {
        return $this->getUsersFunction();
    }
    public function reportToRestrict($id)
    {
        return $this->reportToRestrictFunction($id);
    }
    public function getAllUsers()
    {
        return $this->getAllUsersFunction();
    }
    public function allReported()
    {
        return $this->allReportedFunction();
    }
    public function My($id)
    {
        return $this->MyFunction($id);
    }

    public function updateUsersRestriction($id, $stats)
    {
        return $this->updateUsersRestrictionFunction($id, $stats);
    }
    private function getUsersFunction()
    {
        try {
            $db = new database();
            if ($db->getStatus()) {
                $query = $db->getCon()->prepare($this->getUsersQuery());
                $query->execute();
                return json_encode($query->fetchAll());
            } else {
                return 501;
            }
        } catch (PDOException $th) {
            throw $th;
        }
    }
    private function MyFunction($id)
    {
        try {
            $db = new database();
            if ($db->getStatus()) {
                $query = $db->getCon()->prepare($this->MyQuery());
                $query->execute(array($id));
                return json_encode($query->fetchAll());
            } else {
                return 501;
            }
        } catch (PDOException $th) {
            throw $th;
        }
    }
    private function allReportedFunction()
    {
        try {
            $db = new Database();
            if ($db->getStatus()) {
                $stmt = $db->getCon()->prepare($this->allReportedQuery());
                $stmt->execute();
                $result = $stmt->fetchAll();
                return json_encode($result);
            } else {
                return "NoDatabaseConnection";
            }
        } catch (PDOException $th) {
            return $th;
        }
    }
    private function getAllUsersFunction()
    {
        try {
            $db = new database();
            if ($db->getStatus()) {
                $query = $db->getCon()->prepare($this->getAllUsersQuery());
                $query->execute();
                return json_encode($query->fetchAll());
            } else {
                return 501;
            }
        } catch (PDOException $th) {
            throw $th;
        }
    }
    private function reportToRestrictFunction($id)
    {
        try {
            $db = new Database();
            if ($db->getStatus()) {
                $stmt = $db->getCon()->prepare($this->reportToRestrictQuery());
                $stmt->execute(array($id));
                $result = $stmt->fetch();

                if (!$result) {
                    $stmt2 = $db->getCon()->prepare($this->deleteReportedQuery());
                    $stmt2->execute(array($id));
                    $result2 = $stmt2->fetch();

                    if (!$result2) {
                        return 200;
                    } else {
                        return 401;
                    }
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
    private function updateUsersRestrictionFunction($id, $stats)
    {
        try {
            $db = new database();
            if ($db->getStatus()) {
                $query = $db->getCon()->prepare($this->updateUsersRestrictionQuery());
                $query->execute(array($stats, $id));
                if (!$query->fetch()) {
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

    private function getUsersQuery()
    {
        return "SELECT * FROM `users` WHERE `role` != 2 ORDER BY `create_at` DESC LIMIT 5";
    }
    private function getAllUsersQuery()
    {
        return "SELECT * FROM `users` WHERE `role` != 2 ORDER BY `create_at` DESC";
    }

    private function updateUsersRestrictionQuery()
    {
        return "UPDATE `users` SET `status` = ? WHERE `userId` = ?";
    }

    private function MyQuery()
    {
        return "SELECT * FROM `users` WHERE `userId` = ?";
    }

    private function allReportedQuery()
    {
        return "SELECT re.reported_id, re.reason, re.report_id, re.create_at, repui.firstname AS repFirstname, repui.lastname AS repLastname, ui.firstname, ui.lastname FROM `reports` AS re INNER JOIN `users` AS repui INNER JOIN `users` AS ui ON re.user_id = ui.userId AND re.reported_id = repui.userId";
    }
    
    private function reportToRestrictQuery()
    {
        return "UPDATE `users` SET `status`= 0 WHERE `userId` = ?";
    }
    private function deleteReportedQuery()
    {
        return "DELETE FROM `reports` WHERE `reported_id` = ?";
    }
}
