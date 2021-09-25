<?php
    class interviewer{
        private $id;
        private $fname;
        private $lname;
        private $job;
        private $company;
        private $years;
        private $industry;
        private $about;
        private $email;
        private $experience;
        private $education;
        private $img;

        public function __construct($id, $fname, $lname, $job, $company, $years, $industry, $about, $email, $experience, $education, $img){
            $this->id = $id;
            $this->fname = $fname;
            $this->lname = $lname;
            $this->job = $job;
            $this->company = $company;
            $this->years = $years;
            $this->industry = $industry;
            $this->about = $about;
            $this->email = $email;
            $this->experience = $experience;
            $this->education = $education;
            $this->img = $img;
        }

        public function getID() {
            return $this->id;
        }

        public function getFname() {
            return $this->fname;
        }

        public function getLname() {
            return $this->lname;
        }

        public function getJob() {
            return $this->job;
        }

        public function getCompany() {
            return $this->company;
        }

        public function getYears() {
            return $this->years;
        }

        public function getIndustry() {
            return $this->industry;
        }

        public function getAbout() {
            return $this->about;
        }

        public function getEmail() {
            return $this->email;
        }

        public function getExperience() {
            return $this->experience;
        }

        public function getEducation() {
            return $this->education;
        }

        public function getImg() {
            return $this->img;
        }
    }
?>