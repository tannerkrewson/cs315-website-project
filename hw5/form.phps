<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Tanner Krewson - CS 315 Homework 5</title>
	</head>
	<body>
		<h2>Tanner Krewson - CS 315 Homework 5</h2>
			<h4>
				Command that was used to create my MySQL Table via PHPMyAdmin:
			</h4>
			<code>
				CREATE TABLE `tmk5443cs315`.`hw5`<br>
				  (<br>
				     `key`       INT UNSIGNED NOT NULL auto_increment,<br>
				     `firstname` TEXT NOT NULL,<br>
				     `lastname`  TEXT NOT NULL,<br>
				     `age`       INT UNSIGNED NOT NULL,<br>
				     PRIMARY KEY (`key`)<br>
				  )<br>
				engine = innodb;
			</code>
			<br><br>
			<?php
			function form()
			{
				echo <<<END
				<h3>Submit some info to the database: </h3>
				<form action="$_SERVER[PHP_SELF]" method="post">
					First name:<br>
				    <input type="text" name="firstname">
				    <br>
				    Last name:<br>
				    <input type="text" name="lastname">
					<br>
					Age:<br>
					<input type="number" name="age">
				    <br><br>
				    <input type="submit" value="Submit">
					<input type="hidden" name="stage" value="process">
				</form>
END;
			}
			function submit()
			{
				// grab the responses from the user
				$first_name = htmlspecialchars($_POST['firstname']);
				$last_name = htmlspecialchars($_POST['lastname']);
				$age = htmlspecialchars($_POST['age']);

				// see if their responses were in proper form
				$first_name_valid = preg_match("/^[a-zA-Z]+$/", $first_name);
				$last_name_valid = preg_match("/^[a-zA-Z]+$/", $last_name);
				$age_valid = $age >= 0 && $age < 200;

				// if there is a problem
				if (!$first_name_valid || !$last_name_valid || !$age_valid) {
					if (!$first_name_valid) {
						echo "<h4>The first name you entered was invalid. It must only contain letters.</h4>";
					}
					if (!$last_name_valid) {
						echo "<h4>The last name you entered was invalid. It must only contain letters.</h4>";
					}
					if (!$age_valid) {
						echo "<h4>The age you entered was invalid. Please enter an age between 0 and 200.</h4>";
					}
					echo "<input type=\"button\" value=\"Try Again\" onClick=\"window.location.href=window.location.href\">";
				} else {

					// sourced from https://www.w3schools.com/php/php_mysql_prepared_statements.asp
					$servername = "mysql.truman.edu";
					$username = "tmk5443";
					$password = "raewahto";
					$dbname = "tmk5443CS315";

					try {
					    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
					    // set the PDO error mode to exception
					    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

					    // insert the user's entry into the table
					    $stmt = $conn->prepare("INSERT INTO `hw5` (`firstname`, `lastname`, `age`)
					    VALUES (:firstname, :lastname, :age)");

						// bind parameters to the above command
					    $stmt->bindParam(':firstname', $first_name);
					    $stmt->bindParam(':lastname', $last_name);
					    $stmt->bindParam(':age', $age);
					    $stmt->execute();
					} catch(PDOException $e) {
					    echo "Error: " . $e->getMessage();
						return;
					}
					$conn = null;

					echo <<<END
					<h3>Your data has been submitted!</h3>
					<p>
						<a href="view.php">Click here</a> to view the contents of the database.
					</p>
END;
				}
			}

			if (isset($_POST['stage']) && ('process' == $_POST['stage'])) {
			    submit();
			} else {
			    form();
			}
			?>
		</form>
	</body>
</html>
