<?php
	$currentDir = "";
	include '../includes/header.php';
?>
<div class="article">
	<h2>Quiz: Should you get a dog or cat?</h2>
	<?php
		function quiz()
		{
			echo <<<END
			<form action="$_SERVER[PHP_SELF]" method="post">
				<div class="quiz-question">
					<h3>Question 1: What describes you better?</h3>
					<input type="radio" id="q1-a1"
					 name="quiz-q1" value="1">
					<label for="q1-a1">Energetic and outdoorsy</label>
					<br/>
					<input type="radio" id="q1-a2"
					 name="quiz-q1" value="-1">
					<label for="q1-a2">Busy lifestyle and indoorsy</label>
				</div>
				<div class="quiz-question">
					<h3>Question 2: Which characteristics do you want in your pet?</h3>
					<input type="radio" id="q2-a1"
					 name="quiz-q2" value="-1">
					<label for="q2-a1">Quiet and independant</label>
					<br/>
					<input type="radio" id="q2-a2"
					 name="quiz-q2" value="1">
					<label for="q2-a2">Active and playful</label>
				</div>
				<div class="quiz-question">
					<h3>Question 3: Do you prefer a larger or smaller pet?</h3>
					<input type="radio" id="q3-a1"
					 name="quiz-q3" value="2">
					<label for="q3-a1">Larger</label>
					<br/>
					<input type="radio" id="q3-a2"
					 name="quiz-q3" value="0">
					<label for="q3-a2">Smaller</label>
					<br/>
					<input type="radio" id="q3-a3"
					 name="quiz-q3" value="1">
					<label for="q3-a3">No preference</label>
				</div>
				<div class="quiz-question">
					<h3>Question 4: Do you want a pet that requires lots of attention?</h3>
					<input type="radio" id="q4-a1"
					 name="quiz-q4" value="1">
					<label for="q4-a1">Yes</label>
					<br/>
					<input type="radio" id="q4-a2"
					 name="quiz-q4" value="-1">
					<label for="q4-a2">No</label>
				</div>
				<div class="quiz-question">
					<h3>Question 5: Where do you spend more of your time?</h3>
					<input type="radio" id="q5-a1"
					 name="quiz-q5" value="-1">
					<label for="q5-a1">Inside</label>
					<br/>
					<input type="radio" id="q5-a2"
					 name="quiz-q5" value="1">
					<label for="q5-a2">Outside</label>
				</div>
				<input type="hidden" name="stage" value="process">
				<p>
					<button type="submit">Submit</button>
				</p>
			</form>
END;
		}
		function results()
		{
			// grab the responses from the user
			$q1 = $_POST['quiz-q1'];
			$q2 = $_POST['quiz-q2'];
			$q3 = $_POST['quiz-q3'];
			$q4 = $_POST['quiz-q4'];
			$q5 = $_POST['quiz-q5'];

			//calculate their score
			$score = $q1 + $q2 + $q3 + $q4 + $q5;

			// score positive => prefer dog
			// score negative => prefer cat
			// score zero     => no preference
			$result = "";
			if ($score > 0) {
				$result = "You should get a dog!";
			} else if ($score < 0) {
				$result = "You should get a cat!";
			} else {
				$result = "Take your pick! Either a cat or a dog would work for you.";
			}

			echo <<<END
			<h3>Your results are in: $result</h3>
			<form>
				<button type="submit">Try Again</button>
			</form>
END;
		}

		if (isset($_POST['stage']) && ('process' == $_POST['stage'])) {
			results();
		} else {
			quiz();
		}
	?>

</div>

<?php
	include '../includes/footer.php';
?>
