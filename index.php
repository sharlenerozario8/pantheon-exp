<?php 

include 'config.php';

error_reporting(0); // For not showing any error

if (isset($_POST['submit'])) { // Check press or not Post Comment Button
	$name = $_POST['name']; // Get Name from form
	$experience = $_POST['experience']; // Get Comment from form

	$sql = "INSERT INTO exp (name, experience)
			VALUES ('$name', '$experience')";
	$result = mysqli_query($conn, $sql);
	if ($result) {
		echo "<script>alert('Comment added successfully.')</script>";
	} else {
		echo "<script>alert('Comment could not be added, please try again.')</script>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="style.css">

	<title>Pantheon Experience - Share About Your Experience</title>
</head>
<body>
	<div class="wrapper">
		<form action="" method="POST" class="form">
			<div class="row">
				<div class="input-group">
					<label for="name">Name</label>
					<input type="text" name="name" id="name" placeholder="Enter your name" required>
				</div>
			</div>
			<div class="input-group textarea">
				<label for="experience">How was your experience at Pantheon?</label>
				<textarea id="experience" name="experience" placeholder="Write here" required></textarea>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Post</button>
			</div>
		</form>
		<div class="prev-posts">
			<?php 
			
			$sql = "SELECT * FROM exp";
			$result = mysqli_query($conn, $sql);
			if (mysqli_num_rows($result) > 0) {
				while ($row = mysqli_fetch_assoc($result)) {

			?>
			<div class="single-item">
				<h4><?php echo $row['name']; ?></h4>
				<p><?php echo $row['experience']; ?></p>
			</div>
			<?php

				}
			}
			
			?>
		</div>
	</div>
</body>
</html>