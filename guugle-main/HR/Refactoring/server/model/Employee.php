<?php
    
    class Employee{
	    public $_employeeId;
	    public $_name;
		public $_designation;
		public $_dept;
		public $_username;
      	public $_phoneNumber;
      	public $_dateJoined;
      	public $_address;
      
      public function __construct($employeeId, $name, $designation, $dept, $username, $phoneNumber, $dateJoined, $address){
        $this->_employeeId = $employeeId;
        $this->_name = $name;
		$this->_designation = $designation;
		$this->_dept = $dept;
		$this->_username = $username;
        $this->_phoneNumber = $phoneNumber;
        $this->_dateJoined = $dateJoined;
        $this->_address = $address; 
      }

	    public function getId(){
		    return $this->_employeeId;
	    }
 
	    public function setId($id){
		    if(!is_numeric($id))
			    throw new InvalidArgumentException('ID can not be non-numeric');
 
		    $this->_employeeId = $id;
	    }
 
	    public function getName(){
		    return $this->_name;
	    }
 
	    public function setName($name){   
		    if(empty($name))
			  throw new InvalidArgumentException('Question can not be empty');
 
		  $this->_name = $name;
	    }
		public function getDesignation(){
		    return $this->_designation;
	    }
		public function getDept(){
		    return $this->_dept;
	    }
		public function getUsername(){
		    return $this->_username;
	    }
		public function getPhoneNumber(){
		    return $this->_phoneNumber;
	    }
		public function getDateJoined(){
		    return $this->_dateJoined;
	    }
		public function getAddress(){
		    return $this->_address;
	    }
    }

  
    
?>