<?php

function person_update($person){
	$id = $person->getID();
	$fname = $person->getFirstName();
	$lname = $person->getLastName();

	$result = false;

	// open db connection
	$conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
	//create SQL statement and bind parameters
	$sql = "UPDATE people SET fname=?, lname=? WHERE id=?";
	$query=$conn->prepare($sql);
	$query->bind_param('ssi',$fname,$lname,$id);
	//check of execute worked
	if($query->execute()===true){
		$result=true;
	}
	else{
		//handle error here
	}

	$conn->close();

	return $result;
}

?>