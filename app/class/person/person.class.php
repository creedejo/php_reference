<?php

class Person{
	var $id;
	var $firstname;
	var $lastname;

	function __construct($id=NULL,$fname=NULL,$lname=NULL){

		if(is_int($id)){
			$this->id = $id;
		}
		else{
			$this->id=-1;
			$lname = $fname;
			$fname = $id;
		}

		$this->firstname = $fname;
		$this->lastname = $lname;
	}

	function getID(){
		return $this->id;
	}

	function getFirstName(){
		return $this->firstname;
	}

	function getLastName(){
		return $this->lastname;
	}

	function setID($id){
		$this->id=$id;
	}

	function setName($fname,$lname){
		$this->firstname = $fname;
		$this->lastname = $lname;
	}

	function setFirstName($fname){
		$this->firstname = $fname;
	}

	function setLastName($lname){
		$this->lastname = $lname;
	}
}

?>