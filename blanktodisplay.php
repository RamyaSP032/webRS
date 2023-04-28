<!DOCTYPE html>
<html>
<head>
	<title>Connect PHP to Display Data from Database</title>
</head>
<body>
	<h1>Displaying Data from Database</h1>
	<?php
		// Connect to database
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "joinings";
		$conn = new mysqli($servername, $username, $password, $dbname);

		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		// Retrieve data from database
		echo"<table border='1'>";
		$sql = "SELECT Name,email FROM joinings.joinings";
		$result = $conn->query($sql);

		// Display data on webpage
		if ($result->num_rows > 0) {
				echo"<tr><td>Name</td><td>Mail</td></tr>";
			while($row = $result->fetch_assoc()) {
				echo"<tr>";
				echo "<td>" . $row["Name"] ."</td>" ;
				echo "<td>" . $row["email"] ."</td>" ;
				echo"</tr>";
			}
		} else {
			echo "0 results";
		}
				echo"</table>";
		// Close connection
		$conn->close();
	?>
</body>
</html>
