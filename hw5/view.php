<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Tanner Krewson - CS 315 Homework 5</title>
	</head>
	<body>
		<h2>Tanner Krewson - CS 315 Homework 5</h2>

		<table border="1">
			<tr>
				<th>Key</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Age</th>
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
				$result = $conn->prepare("SELECT `key`, `firstname`, `lastname`, `age` FROM `hw5`");
				$result->execute();

				// for each row in the database, get each column, and print as a table row
				while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
					$key = $row['key'];
					$first_name = $row['firstname'];
					$last_name = $row['lastname'];
					$age = $row['age'];
					echo "<tr>";
					echo "<td>$key</td>";
					echo "<td>$first_name</td>";
					echo "<td>$last_name</td>";
					echo "<td>$age</td>";
					echo "</tr>";
				}
			} catch(PDOException $e) {
				echo "Error: " . $e->getMessage();
			}
			$conn = null;
			?>
			</table>
	</body>
</html>
