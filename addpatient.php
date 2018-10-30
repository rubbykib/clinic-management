<?php
session_start();
//check if there is a session
	
if (isset($_SESSION ['username'])) {
	//pull it out
	if ($_SESSION['role']=="doctor" ){	
	$username = $_SESSION['username'];
	echo "Welcome : $username";
	echo "<a href= 'logout.php'>logout</a>";
}
	else {
		echo "Acess Denied. Only Doctors";
		exit();
	}
}//end if


//if session not set
else if (!isset($_SESSION ['username'])) {
	header("location: login.php");
	exit();//kill
	
}

else {
	header("location: login.php");
	exit();//kill
}


 ?>





<!DOCTYPE html>
<html>
<head>
	<title>Add patient</title>
</head>
<body>

	<center>
		<h1>Clinic Management</h1>
		<p>better health Care</p>
		<a href="addpatient.php">Add patient</a>
		<a href="adddoctor.php">Add Doctor</a>
		<a href=""> Search Patient</a>
		<a href="">Search Doctor</a>
		<a href="checkup.php">patient CheckUp</a>





	</center>



	<h1>Add Patient</h1>
	<fieldset>
	<form action="" method="POST">
		<input type="text" name="surname"
		placeholder="Enter Surname">
		<br>
		<br>

		<input type="text" name="fname"
		placeholder="Enter first name">
		<br>
		<br>


		<input type="text" name="lname"
		placeholder="Enter last name">
		<br>

		<input type="tel" name="phone"
		placeholder="Enter phone">
		<br>
		<br>

		<input type="text" name="residence"
		placeholder="Enter Residence">
		<br>
		<br>

		<input type="text" name="patient_id"
		placeholder="Enter patient identiy No">
		<br>
		<br>

		<label>Select Gender</label>
		<input type="radio" name="gender" value="Male">Male
		<input type="radio" name="gender" value="Female">Female
		<br>
		<br>
         
        <input type="email" name="email"
        placeholder="Enter Email">
        <br>
		<br>
         

        <input type="submit" value="Save patient">



	
	</form>
	</fieldset>

</body>
</html>


<?php 
//This is the logic:provide construct with form values
if (empty($_POST)){
	exit();//quit executing PHP code until, forrm button is clicked
}

$object = new Patient($_POST['surname'],
	                  $_POST['fname'],
	                  $_POST['lname'],
	                  $_POST['phone'],
	                  $_POST['residence'],
	                  $_POST['patient_id'],
	                  $_POST['gender'],
	                  $_POST['email'] );


$object->save(); //trigger save function


class Patient{
	function __construct($surname, $fname, $lname, $phone, $residence, $patient_id, $gender, $email){



		$this->surname= $surname;
		$this->fname= $fname;
		$this->lname= $lname;
		$this->phone= $phone;
		$this->residence= $residence;
		$this->patient_id=$patient_id;
		$this->gender=$gender;
		$this->email=$email;




	}//end constructor



	function save(){
		//connect to your database
		$conn =mysqli_connect("localhost","root", "","clinic_db");
		//save to table
		$response=mysqli_query($conn, "INSERT INTO `table_patients`(`surname`, `fname`, `lname`, `phone`, `residence`, `patient_id`, `gender`, `email`) VALUES ('$this->surname','$this->fname','$this->lname','$this->phone','$this->residence','$this->patient_id',
			'$this->gender',
			'$this->email')");


		if ($response==true){
			echo "Successfully saved record";
		}
        
        else{
        	echo "Record Failed, check your Details";
        }
		


	}//end








}










 ?>