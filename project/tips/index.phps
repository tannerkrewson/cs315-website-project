<?php
	$currentDir = "";
	include '../includes/header.php';
?>
<div class="article">
	<?php
		function tips()
		{
			include './tip-list.php';
			echo <<<END
			<h2>Submit a Tip</h2>
			<p>
				Being a first time pet owner can be difficult. If you have any
				tips for caring for dogs or cats, please submit them below! Or, take
				a look at the other tips that have been submitted.
			</p>
			<form action="$_SERVER[PHP_SELF]" method="post">
				Name:<br>
				<input type="text" name="name"><br><br>
				Email Address:<br>
				<input type="text" name="email"><br><br>
				Enter your tip here:<br>
				<textarea name="comment" rows="4" cols="50"></textarea>
				<br><br>
				<input type="hidden" name="stage" value="process">
				<p>
					<button type="submit">Submit</button>
				</p>
			</form>
END;
		}
		function process()
		{
			// remove any html from entered text to prevent html injection
			$name = htmlspecialchars($_POST['name']);
			$email = htmlspecialchars($_POST['email']);
			$comment = htmlspecialchars($_POST['comment']);

			$email_valid = preg_match("/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/", $email);

			if ($email_valid) {

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
				    $stmt = $conn->prepare("INSERT INTO `project` (`name`, `email`, `tip`)
				    VALUES (:name, :email, :tip)");

					// bind parameters to the above command
				    $stmt->bindParam(':name', $name);
				    $stmt->bindParam(':email', $email);
					$stmt->bindParam(':tip', $comment);
				    $stmt->execute();
				} catch(PDOException $e) {
					echo "<h3>There was a problem connecting to the database. Try again!</h3>";
					echo "Error: " . $e->getMessage();
					echo <<<END
					<form>
						<button type="submit">Try Again</button>
					</form>
END;
					return;
				}
				$conn = null;

				echo <<<END
				<h3>Thanks, $name! Your tip has been received.</h3>
				<h4>Your email: $email</h4>
				<h4>Your tip: </h4>
				<p>
					$comment
				</p>
				<form>
					<button type="submit">Back</button>
				</form>
END;
			} else {
				echo <<<END
				<h3>There was a problem with your email address. Try again!</h3>
				<form>
					<button type="submit">Try Again</button>
				</form>
END;
			}
		}

		if (isset($_POST['stage']) && ('process' == $_POST['stage'])) {
			process();
		} else {
			tips();
		}
	?>

</div>

<?php
	include '../includes/footer.php';
?>
