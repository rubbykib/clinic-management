<?php 

//This is the logic:provide construct with form values
if (empty($_POST)){
	exit();//quit executing PHP code until, forrm button is clicked
}

$object = new Checkup($_POST['doctor_id'],
	                  $_POST['surname'],	                 
	                  $_POST['gender'],
	                  $_POST['dept'],
	                  $_POST['profession'],	                 
	                  $_POST['EXP'] );


$object->save(); //trigger save function


class Checkup{
	function __construct($patient_id, $surname, $gender, $dept, $profession, $EXP){

            
              $this->doctor_id= $doctor_id;
              $this->surname= $surname;
              $this->gender= $gender;
              $this->dept= $dept;
              $this->profession= $profession;
              $this->EXP= $EXP;



	}//end Constructor



		function save(){
		//connect to your database
		$conn =mysqli_connect("localhost","root", "","clinic_db");
		//save to table
		$response=mysqli_query($conn, "INSERT INTO `table_patients_info`(`doctor_id`, `surname`, `gender`, `dept`, `profession`,`EXP`) VALUES ('$this->doctor_id','$this->surname','$this->gender','$this->dept','$this->profession', '$this->EXP)");


		if ($response==true){
			echo "Successfully saved record";
		}
        
        else{
        	echo "Record Failed, check your Details";
        }
		


	}//end
}




 ?>