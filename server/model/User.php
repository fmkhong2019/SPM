<?php

class Users {
    private $id;
    private $dname;
    private $fname;
    private $lname;
    private $email;
    private $photoURL;
    private $job;
    private $company;
    private $industry;
    private $specialization;

    public function __construct($id, $dname, $fname, $lname, $email, $photoURL, $job, $company, $industry, $specialization) {
        $this->id = $id;
        $this->dname = $dname;
        $this->fname = $fname;
        $this->lname = $lname;
        $this->email = $email;
        $this->photoURL = $photoURL;
        $this->job = $job;
        $this->company = $company;
        $this->industry = $industry;
        $this->specialization = $specialization;
    }

    public function getid() {
        return $this->id;
    }

    public function getdname() {
        return $this->dname;
    }

    public function getfname() {
        return $this->fname;
    }

    public function getlname() {
        return $this->lname;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPhotoURL() {
        return $this->photoURL;
    }

    public function getJob() {
        return $this->job;
    }

    public function getCompany() {
        return $this->company;
    }

    public function getIndustry() {
        return $this->industry;
    }

    public function getSpecialization() {
        return $this->specialization;
    }
}

?>