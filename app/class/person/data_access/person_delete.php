<?php


function person_delete($id){

	$result = false;

	// open db connection
	$conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
	//create SQL statement and bind parameters
	$sql = "DELETE FROM people WHERE id=?";
	$query=$conn->prepare($sql);
	$query->bind_param('i',$id);
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