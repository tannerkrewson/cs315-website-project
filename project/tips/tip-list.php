<h2>Submitted Tips</h2>
<table border="1">
	<tr>
		<th>Name</th>
		<th>Date</th>
		<th>Email</th>
		<th>Tip</th>
	</tr>

	<?php
	$servername = "mysql.truman.edu";
	$username = "tmk5443";
	$password = "raewahto";
	$dbname = "tmk5443CS315";

	try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		// select all rows from the database
		$result = $conn->prepare("SELECT `name`, `email`, `date`, `tip` FROM `project`");
		$result->execute();

		// for each row in the database, get each column, and print as a table row
		while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
			$name = $row['name'];
			$email = $row['email'];
			$date = $row['date'];
			$tip = $row['tip'];
			echo "<tr>";
			echo "<td>$name</td>";
			echo "<td>$email</td>";
			echo "<td>$date</td>";
			echo "<td>$tip</td>";
			echo "</tr>";
		}
		echo "</table>";
	} catch(PDOException $e) {
		echo "</table>";
		echo "There was a problem connecting to the database.<br>";
		echo "Error: " . $e->getMessage();
	}
	$conn = null;
	?>
