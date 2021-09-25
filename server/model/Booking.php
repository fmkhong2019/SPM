<?php
    class booking{
        private $user_id;
        private $interviewer_id;
        private $timeslots;

        public function __construct($user_id, $interviewer_id, $timeslots, $interview_type){
            $this->user_id = $user_id;
            $this->interviewer_id = $interviewer_id;
            $this->timeslots = $timeslots;
            $this->interview_type = $interview_type;
        }

        public function getUserId() {
            return $this->user_id;
        }

        public function getInterviewerId() {
            return $this->interviewer_id;
        }

        public function getTimeslots() {
            return $this->timeslots;
        }

        public function getType() {
            return $this->interview_type;
        }

    }
?>