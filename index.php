
<?php

include "functions/events.php";

if (empty($_POST) == false) {
	$required_fields = array('name', 'description', 'start_date', 'start_time', 'end_date', 'end_time');
	foreach($_POST as $key => $value) {
		if (empty($value) && in_array($key, $required_fields) == true) {
			$errors[] = 'You should fill all of the fields marked with an asterix!';
			break 1;
		}
	}

	if (preg_match("/^[a-zA-Z]+$/", $_POST['name']) == false) {
		$errors[] = 'Your name should only contain letters!';
		}

	if (strlen($_POST['description']) < 10) {
		$errors[] = 'Your event description is too short!';
		}
}

if (empty($_POST) == false && empty($errors) == true) {
		$event_data = array(
			'name' 			=> $_POST['name'],
			'description'	=> $_POST['description'],
			'start_date' 	=> $_POST['start_date'],
			'start_time' 	=> $_POST['start_time'],
			'end_date' 		=> $_POST['end_date'],
			'end_time' 		=> $_POST['end_time'],
		);
	register_event($event_data);
	?>
	<div class="success-container">
		<h3>Your event has been registered successfully! Here are the details:</h3>
		<?php
		foreach ($event_data as $key => $value) {
			?><li><?php echo $key .": ". $value; ?></li>
		<?php }
		?>
	</div>
	<?php

} else if (empty($errors) == false) {
	?>
	<div class="error-container">
		<h3>Please fix the errors listed below and submit the event again:</h3>
		<?php
			foreach ($errors as $error) {
				?>
					<li><?php echo $error ?></li>
				<?php
			} ?>
	</div>
	<?php }

?>

<head>
	<meta charset="utf-8">
	<title>Calendar Event</title>
	<link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />

	<script src="libraries/jquery-2.1.3.min.js"></script>
	<script src="libraries/jquery-ui.js"></script>

    <script src="libraries/src/jquery.timepicker.js"></script>
    <link rel="stylesheet" type="text/css" href="libraries/src/jquery.timepicker.css" />

    <script src="libraries/lib/bootstrap-datepicker.js"></script>
    <link rel="stylesheet" type="text/css" href="libraries/lib/bootstrap-datepicker.css" />

    <script src="libraries/lib/pikaday.js"></script>
    <link rel="stylesheet" type="text/css" href="libraries/lib/pikaday.css" />

    <script src="libraries/lib/jquery.ptTimeSelect.js"></script>
    <link rel="stylesheet" type="text/css" href="libraries/lib/jquery.ptTimeSelect.css" />
    <link rel="stylesheet" href="libraries/jquery-ui.css" type="text/css" media="all" />

    <script src="libraries/lib/moment.min.js"></script>
    <script src="libraries/lib/site.js"></script>

    <script src="libraries/dist/datepair.js"></script>
    <script src="libraries/dist/jquery.datepair.js"></script>
</head>
<body>
	<div id="form" class="form">
		<form id="event-form" class="event-form" method="POST" action="">
			<h2>Please complete the form to create a new event</h2>
			<div class="event-attr">
				<label for "name">Your Name:</label>
				<input type="text" name="name" title="Your full name in latin characters">
			</div>
			<div class="event-attr">			
				<label for "description">Event Description:</label>
				<input type="text" name="description" title="Give us a short description of your event">
			</div>
			<div id="datepair">
				<div class="event-attr">			
					<label for "start_date">Start Date:</label>
					<input type="text" class="date start" name="start_date" title="Select starting date in YYYY-MM-DD format">
				</div>
				<div class="event-attr">			
					<label for "start_time">Start Time:</label>
					<input type="text" class="time start" name="start_time" title="Select starting time in HH:MM format">
				</div>
				<div class="event-attr">			
					<label for "end_date">End Date:</label>
					<input type="text" class="date end" name="end_date" title="Select finishing date in YYYY-MM-DD format">
				</div>
				<div class="event-attr">			
					<label for "end_time">End Time:</label>
					<input type="text" class="time end" name="end_time" title="Select finishing time in HH:MM format">
				</div>
				<p id="datepairStatus"></p>
			</div>
			<button id="submit" class="submit" type="submit">Create</button>
		</form>
	</div>
	<script>
		$(document).ready(function(){
			$('#datepair .time').timepicker({
		        'showDuration': true,
		        'timeFormat': 'g:ia'
		    });

			$('#datepair .date').datepicker({
		        'format': 'yyyy/mm/dd',
		        'autoclose': true
		    });
		    
		$('#datepair').datepair();

		});
	</script>
</body>