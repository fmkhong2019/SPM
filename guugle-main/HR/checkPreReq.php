<?php

    

    
    function checkPreReq($empId, $courseId) {
        $prereqDAO = new preRequisiteDAO();
        $enrollDAO = new EnrollmentDAO();
        $prereqCourse_obj = $prereqDAO->getPreReqByCid($courseId);
        if(!is_null($prereqCourse_obj)){
          $prereqCourseId = $prereqCourse_obj->getpreRequisiteId();
          $enroll_objs = $enrollDAO->getClass($empId);
          foreach($enroll_objs as $enroll_obj){
            if($enroll_obj->getEmployeeId()==$empId&&$prereqCourseId==$enroll_obj->getcourseid()){
              if($enroll_obj->getcompleted()==1){
                return true;
              }else{
                return false;
              }
            }else{
              return false;
            }
          }
        }else{
          return true;
        }
    }

    function build_table($array){
      $courseDAO = new CourseDAO();
      $courseAll = $courseDAO->getAll();
      // start table
      $html = '<table class="table">';
      // header row
      $html .= '<thead class="thead-light">';
      $html .= '<tr><th>#</th>';
      foreach($array[0] as $key=>$value){
        foreach($value as $key2=>$value2){
              $html .= '<th>' . 'EmployeeID '.htmlspecialchars($key2) . '</th>';
        }
      }
      $html .= '</tr>';
      $html .= '</thead>';
      $index=0;
      // data rows
      foreach( $array as $key=>$value){
          
          $html .= '<tr><th>Course'.$courseAll[$index]->getCourseID().'</th>';
          foreach($value as $key2=>$value2){
            foreach($value2 as $key3=>$value3){
              if($value3==true){
                $html .= '<td class="table-success">' . "Eligible" . '</td>';
              }else{
                $html .= '<td class="table-warning">' . "Not Eligible" . '</td>';
              }
            }
            
          }
          $html .= '</tr>';
          $index++;
      }
    
  
      // finish table and return it
  
      $html .= '</table>';
      return $html;
    }

    


    
   
?>

