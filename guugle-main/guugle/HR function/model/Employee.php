<?php
    
    class Employee{
	    public $_employeeId;
	    public $_name;
      	public $_phoneNumber;
      	public $_dateJoined;
      	public $_address;
      
      public function __construct($employeeId, $name, $phoneNumber, $dateJoined, $address){
        $this->_employeeId = $employeeId;
        $this->_name = $name;
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
    }

  
    
?>