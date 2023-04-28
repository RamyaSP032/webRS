<?php
  // Connect to database
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "joinings";

  // Create connection
  $conn = mysqli_connect($servername, $username, $password, $dbname);

  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  // Get form data
  $name = $_POST["name"];
  $email = $_POST["email"];
  $mobile =' '. $_POST["mobile"];
  $aadhaar =' '. $_POST["aadhaar"];

  // Prepare and bind
  $stmt = $conn->prepare("INSERT INTO joinings (name, email, mobile, aadhaar) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("ssss", $name, $email, $mobile, $aadhaar);
		echo "<script>
		alert('Submitted');
		window.location.href='menu.html';
		</script>";
			
  // Execute and close
  $stmt->execute();
  $stmt->close();
  
  // Close connection
  mysqli_close($conn);
?>
