<!DOCTYPE html>
<html>
<head>
	<title>Check up</title>
</head>
<body>

	<center>
		<h1>Clinic Management</h1>
		<p>better health Care</p>
		<a href="checkup.php">Add patient</a>
		<a href="">Add Doctor</a>
		<a href=""> Search Patient</a>
		<a href="">Search Doctor</a>
		<a href="">patient CheckUp</a>





	</center>










	<h1>Check up</h1>
	<fieldset>
	<form action="" method="POST">
		<input type="text" name="patient_id"
		placeholder="Enter patient_id">
		<br>
		<br>

		<input type="text" name="weight"
		placeholder="Enter weight">
		<br>
		<br>


		<input type="text" name="height"
		placeholder="Enter height">
		<br>
		<br>

		<input type="text" name="temparature"
		placeholder="Enter temperature">
		<br>
		<br>

		<input type="text" name="description"
		placeholder="Enter description">
		<br>
		<br>

		
         

        <input type="submit" value="Save check up">



	
	</form>
	</fieldset>

</body>
</html>





<?php 

//This is the logic:provide construct with form values
if (empty($_POST)){
	exit();//quit executing PHP code until, forrm button is clicked
}

$object = new Checkup($_POST['patient_id'],
	                  $_POST['weight'],
	                  $_POST['height'],
	                  $_POST['temparature'],	                 
	                  $_POST['description'] );


$object->save(); //trigger save function


class Checkup{
	function __construct($patient_id, $weight, $height, $temparature, $description){

            
              $this->patient_id= $patient_id;
              $this->weight= $weight;
              $this->height= $height;
              $this->temparature= $temparature;
              $this->description= $description;



	}//end Constructor



		function save(){
		//connect to your database
		$conn =mysqli_connect("localhost","root", "","clinic_db");
		//save to table
		$response=mysqli_query($conn, "INSERT INTO `table_patients_info`(`patient_id`, `weight`, `height`, `temparature`, `description`) VALUES ('$this->patient_id','$this->weight','$this->height','$this->temparature','$this->description')");


		if ($response==true){
			echo "Successfully saved record";
		}
        
        else{
        	echo "Record Failed, check your Details";
        }
		


	}//end
}




 ?>