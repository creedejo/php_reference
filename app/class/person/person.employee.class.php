<?php

class Employee extends Person{
	var $title;

	function __construct($id=NULL,$fname=NULL,$lname=NULL,$title=NULL){

		if(is_int($id)){
			$this->id = $id;
		}
		else{
			$this->id=-1;
			$title = $lname;
			$lname = $fname;
			$fname = $id;
		}

		$this->firstname = $fname;
		$this->lastname = $lname;
		$this->title=$title;
	}

	function setTitle($title){
		$this->title=$title;
	}

	function getTitle(){
		return $this->title;
	}
}

?>