<!DOCTYPE html>

<?php
// display errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//congiuration
$config = require_once('config/config.php');
define("DB_HOST",$config["DB_HOST"]);
define("DB_USER",$config["DB_USER"]);
define("DB_PASSWORD",$config["DB_PASSWORD"]);
define("DB_NAME",$config["DB_NAME"]);

//import classes
require_once('app/class/person/person.class.php');
require_once('app/class/person/person.employee.class.php');
require_once('app/class/person/data_access/person_add.php');
require_once('app/class/person/data_access/person_get.php');
require_once('app/class/person/data_access/person_update.php');
require_once('app/class/person/data_access/person_delete.php');

?>
<html>

	<head>
		<title>PHP Reference</title>
		<link href="css/styles.css" rel="stylesheet" />
	</head>

	<body>

		<h1>Simple PHP OOP and DB reference:</h1>

		<h2>Basic Class:</h2>
		<?php
			//create object
			$person = new Person(23,"Michael","Jordan");

			//get data back
			$lname = $person->getLastName();
			$fname = $person->getFirstName();
			echo "Name: " . $person->getFirstName() . " " . $person->getLastName() . '(' . $person->getID() . ')';

			//update
			$person->setName("Larry","Bird");
			$person->setID(33);
			echo "<br>Name changed to " . $person->getFirstName() . " " . $person->getLastName() . '(' . $person->getID() . ')';

		?>

		<h2>Extended Class</h2>

		<?php
			//create object
			$employee = new Employee("Lebron","James","Small Forward");

			//get data back
			$lname = $employee->getLastName();
			$fname = $employee->getFirstName();
			$title = $employee->getTitle();

			echo "New Employee: " . $fname . " " . $lname . " - " . $title;
			$employee->setFirstName("Kobe");
			$employee->setLastName("Bryant");
			$employee->setTitle("Shooting Guard");
			echo "<br>Employee changed to: " . $employee->getFirstName() . " " . $employee->getLastName() . " - " . $employee->getTitle();

		?>

		<h1>Database Functions</h1>

		<?php

		$person = new Person("Kevin","Durant");
		//return same object with id
		
		/* ADD NEW PERSON
		=========================================================================================================================
		*/

		$person = person_add($person);
		echo "<br>Person added to database: " . $person->getID() . ": " . $person->getFirstName() . " " . $person->getLastName();

		$testID = $person->getID();

		/* GET PERSON BY ID
		=========================================================================================================================
		*/
		$person = person_get($testID);
		echo "<br>Person retrieved from database: " . $person->getID() . ": " . $person->getFirstName() . " " . $person->getLastName();


		/* UPDATE PERSON BY ID
		=========================================================================================================================
		*/
		$person->setName("Stephen","Curry");
		if(person_update($person)){
			echo "<br>Person was updated.";
		}
		else{
			echo "<br>Update failed.";
		}


		/* DELETE PERSON BY ID
		=========================================================================================================================
		*/
		if(person_delete($person->getID())){
			echo "<br>Person was deleted.";
		}
		else{
			echo "<br>Deletion failed.";
		}

		?>
		
	</body>

</html>