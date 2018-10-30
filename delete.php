<?php 
//receive the patient ID
$patient_id = $_GET['patient_id'];
    //use it to delete query
    $conn = mysqli_connect("localhost","root", "","clinic_db");
		$response = mysqli_query($conn, "DELETE  FROM table_patients Where patient_id='$patient_id'");

		  echo "$patient_id has been removed";












 ?>