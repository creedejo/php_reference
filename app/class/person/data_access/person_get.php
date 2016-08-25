<?php

function person_get($id){
	$result = new Person($id);
	$conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
	$sql = "SELECT fname,lname FROM people WHERE id=?";
	$query = $conn->prepare($sql);
	$query->bind_param('i',$id);
	$query->execute();
	$query->bind_result($fname,$lname);
	$query->store_result();
	$query->fetch();
	if($query->num_rows>0){
		$result->setName($fname,$lname);
	}

	return $result;
}


?>