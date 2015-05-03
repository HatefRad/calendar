<?php

$dbName = 'events_db';
$dbUser = 'root';
$dbPW = '';

try {
		$db = new PDO("mysql:host=localhost; dbname=$dbName", $dbUser, $dbPW);
	} 
catch (PDOException $e) {
		exit('Database Error!');
	}