<?php

function register_event($event_data) {
	
	include "db.php";

	$new_ev = array();

	$creation_datetime = gmdate("Y-m-d H:i:s");

	$q = $db -> prepare("INSERT INTO events (name, description, start_date, start_time, end_date, end_time, creation_datetime) VALUES (?,?,?,?,?,?,?)");
	$q -> execute(array($event_data['name'],$event_data['description'],$event_data['start_date'],$event_data['start_time'],$event_data['end_date'],$event_data['end_time'],$creation_datetime));

}