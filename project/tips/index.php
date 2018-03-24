<?php
	$currentDir = "";
	include '../includes/header.php';
?>
<div class="article">
	<h2>Submit a Tip</h2>
	<?php
		function tips()
		{
			echo <<<END
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

			echo <<<END
			<h3>Thanks, $name! Your tip has been received.</h3>
			<h4>Your email: $email</h4>
			<h4>Your comment: </h4>
			<p>
				$comment
			</p>
			<form>
				<button type="submit">Submit Another</button>
			</form>
END;
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
