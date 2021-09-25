<?php
    class interviewSlot{
        private $id;
        private $timeslot;

        public function __construct($id, $timeslot){
            $this->id = $id;
            $this->timeslot = $timeslot;
        }

        public function getID() {
            return $this->id;
        }

        public function getTimeslot() {
            return $this->timeslot;
        }
    }
?>