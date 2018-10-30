<!DOCTYPE html>
<html>
<head>
	<title>Search</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</head>
<body>
	<center>
		<h1>Clinic Management</h1>
		<p>better health Care</p>
		<a href="addpatient.php">Back Home</a>
		

    </center>

<h1>Search Patient By ID</h1>


<fieldset>
	<legend>ID Search</legend>

	<form action="" method="POST">
		<input type="text" name="patient_id"
		placeholder="Enter Patient ID">
		<br>
		<br>         

        <input type="submit" value="Search Patient">
	</form>
	</fieldset>
</body>
</html>


<?php 
    if(empty($_POST)){
    	exit();//quit if button is not clicked
    }

$object=new PatientID($_POST['patient_id']);
$object->search();
class PatientID{
	function __construct($patient_id){
       $this->patient_id=$patient_id;
	}//end

   function search(){
   	       //connect to your database
		$conn =mysqli_connect("localhost","root", "","clinic_db");
		$response=mysqli_query($conn, "SELECT * FROM table_patients Where patient_id='$this->patient_id'");

		//count your response
		if (mysqli_num_rows($response)==0) {

			echo "No patient Found ! Try again";
			exit();
		}
		

        else{
        	//get all colms for the 1st row found
        	
        	echo "<table border=1 width= 100% class=' table table-dark'>";
        	while($colm = mysqli_fetch_array($response))
        	{
            echo "<tr>";
        	echo "<td>$colm[0]  </td>";
        	echo "<td> $colm[1] </td>";
        	echo "<td> $colm[3] </td>";
        	echo "<td> $colm[4] </td>";
        	echo "<td> $colm[6] </td>";
        	echo "<td> $colm[7] </td>";
        	echo "<td> $colm[8] </td>";
        	echo "<td> <a href='delete.php?patient_id=$colm[5]' class='btn btn-danger'>DELETE</a></td>";
        	echo "<td> <a href=''class='btn btn-info'>ALLOCATE</a></td>";
        	echo "<tr>";

        }//End while
            echo "</table>";

        }//end else





   }//End Function



}//end  class constructor





 ?>