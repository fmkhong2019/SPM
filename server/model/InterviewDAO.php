<?php
    class InterviewDAO{

        public function getInterviewers($limit) {
            $conn = new ConnectionManager();
            $pdo = $conn->getConnection();
            
            $sql = "SELECT * FROM `interviewers` ORDER BY `id` DESC LIMIT :lim";

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':lim', $limit, PDO::PARAM_INT);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();

            $result = [];
            while($row = $stmt->fetch()){
                $result[] = new interviewer($row["id"],$row["fname"], $row["lname"], $row["job"], $row["company"], $row["years"], $row["industry"], $row["about"], $row["email"], $row["experience"], $row["education"], $row["img"]);
            }

            $stmt = null;
            $pdo = null;

            return $result;
        }


        public function getTimeslotsById($interviewer_id) {
            $conn = new ConnectionManager();
            $pdo = $conn->getConnection();
            
            $sql = "SELECT * FROM `interviewSlots` WHERE `interviewer_id` = :interviewer_id";

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':interviewer_id', $interviewer_id, PDO::PARAM_INT);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();

            $result = [];
            while($row = $stmt->fetch()){
                $result[] = new interviewSlot($row["interviewer_id"], $row["timeslots"]);
            }

            $stmt = null;
            $pdo = null;

            return $result;
        }

        
        public function deleteTimeslot($interviewer_id, $timeslots){
            $conn = new ConnectionManager();
            $pdo = $conn->getConnection();

            $sql = "DELETE FROM `interviewSlots` WHERE `interviewer_id` = :interviewer_id AND `timeslots` = :timeslots";

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':interviewer_id', $interviewer_id, PDO::PARAM_INT);
            $stmt->bindParam(':timeslots', $timeslots, PDO::PARAM_STR);

            $isOk = $stmt->execute();
            $stmt = null;
            $pdo = null;
            return $isOk;
        }


        public function createBooking($user_id, $interviewer_id, $timeslots, $interview_type){
            $conn = new ConnectionManager();
            $pdo = $conn->getConnection();

            $sql = "INSERT INTO `interviews` (`user_id`, `interviewer_id`, `timeslots`, `interview_type`) VALUES (:user_id, :interviewer_id, :timeslots, :interview_type)";

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR);
            $stmt->bindParam(':interviewer_id', $interviewer_id, PDO::PARAM_INT);
            $stmt->bindParam(':timeslots', $timeslots, PDO::PARAM_STR);
            $stmt->bindParam(':interview_type', $interview_type, PDO::PARAM_STR);

            $isOk = $stmt->execute();
            $stmt = null;
            $pdo = null;
            return $isOk;
        }
        
        public function deleteBooking($user_id, $interviewer_id, $timeslots){
            $conn = new ConnectionManager();
            $pdo = $conn->getConnection();

            $sql = "DELETE FROM `interviews` WHERE `user_id` = :user_id AND `interviewer_id` = :interviewer_id AND `timeslots` = :timeslots";
        
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR);
            $stmt->bindParam(':interviewer_id', $interviewer_id, PDO::PARAM_INT);
            $stmt->bindParam(':timeslots', $timeslots, PDO::PARAM_STR);

            $isOk = $stmt->execute();
            $stmt = null;
            $pdo = null;
            return $isOk;
        }

        public function addBooking($interviewer_id, $timeslots){
            $conn = new ConnectionManager();
            $pdo = $conn->getConnection();

            $sql = "INSERT INTO `interviewslots` (`interviewer_id`, `timeslots`) VALUES (:interviewer_id, :timeslots)";

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':interviewer_id', $interviewer_id, PDO::PARAM_INT);
            $stmt->bindParam(':timeslots', $timeslots, PDO::PARAM_STR);

            $isOk = $stmt->execute();
            $stmt = null;
            $pdo = null;
            return $isOk;
        }

        
        public function getBookings(){
            $conn = new ConnectionManager();
            $pdo = $conn->getConnection();
            
            $sql = "SELECT * FROM `interviews`";

            $stmt = $pdo->prepare($sql);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();

            $result = [];
            while($row = $stmt->fetch()){
                $result[] = new booking($row["user_id"],$row["interviewer_id"], $row["timeslots"], $row["interview_type"]);
            }

            $stmt = null;
            $pdo = null;

            return $result;
        }

        public function getfName($interviewer_id) {
            $conn = new ConnectionManager();
            $pdo = $conn->getConnection();
            
            $sql = "SELECT * FROM `interviewers` WHERE `id` = :interviewer_id";

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':interviewer_id', $interviewer_id, PDO::PARAM_INT);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            
            $result = '';
            if ($row=$stmt->fetch()){
                $result = $row["fname"];

            }

            $stmt = null;
            $pdo = null;

            return $result;
        }

    }
?>
