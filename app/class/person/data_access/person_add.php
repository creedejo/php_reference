<?php

function person_add($person){
	$fname = $person->getFirstName();
	$lname = $person->getLastName();

	$result = new Person(-1,$fname,$lname);

	// open db connection
	$conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
	//create SQL statement and bind parameters
	$sql = "INSERT INTO people (fname,lname) VALUES (?,?)";
	$query=$conn->prepare($sql);
	$query->bind_param('ss',$fname,$lname);
	//check of execute worked
	if($query->execute()===true){
		$id = $query->insert_id;
		$result->setID($id);
	}
	else{
		//handle error here
	}

	$conn->close();

	return $result;
}

?>