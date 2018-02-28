<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Tanner Krewson - CS 315 Homework 3</title>
	</head>
	<body>
		<h2>Tanner Krewson - CS 315 Homework 3</h2>
			<h2>A Quick Multiplication Quiz</h2>
			<?php
			function quiz()
			{
				echo <<<END
				<form action="$_SERVER[PHP_SELF]" method="post">
					<ol>
						<li>
							<h3>7 x 5 = ?</h3>
							<input type="radio" id="q1-a1"
							 name="quiz-q1" value="35">
							<label for="q1-a1">35</label>
							<br/>
							<input type="radio" id="q1-a2"
							 name="quiz-q1" value="42">
							<label for="q1-a2">42</label>
							<br/>
							<input type="radio" id="q1-a3"
							 name="quiz-q1" value="40">
							<label for="q1-a3">40</label>
							<br/>
							<input type="radio" id="q1-a4"
							 name="quiz-q1" value="28">
							<label for="q1-a4">28</label>
						</li>
						<li>
							<h3>9 x 3 = ?</h3>
							<input type="radio" id="q2-a1"
							 name="quiz-q2" value="21">
							<label for="q2-a1">21</label>
							<br/>
							<input type="radio" id="q2-a2"
							 name="quiz-q2" value="36">
							<label for="q2-a2">36</label>
							<br/>
							<input type="radio" id="q2-a3"
							 name="quiz-q2" value="27">
							<label for="q2-a3">27</label>
							<br/>
							<input type="radio" id="q2-a4"
							 name="quiz-q2" value="30">
							<label for="q2-a4">30</label>
						</li>
						<li>
							<h3>8 x 8 = ?</h3>
							<input type="radio" id="q3-a1"
							 name="quiz-q3" value="16">
							<label for="q3-a1">16</label>
							<br/>
							<input type="radio" id="q3-a2"
							 name="quiz-q3" value="88">
							<label for="q3-a2">88</label>
							<br/>
							<input type="radio" id="q3-a3"
							 name="quiz-q3" value="72">
							<label for="q3-a3">72</label>
							<br/>
							<input type="radio" id="q3-a4"
							 name="quiz-q3" value="64">
							<label for="q3-a4">64</label>
						</li>
						<li>
							<h3>5 x 13 = ?</h3>
							<input type="number" name="quiz-q4">
						</li>
						<li>
							<h3>Multiplication is repeated ___________.</h3>
							<input type="text" name="quiz-q5">
						</li>
					</ol>
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

				// see if their responses were correct
				$q1_correct = $q1 == 7*5;
				$q2_correct = $q2 == 9*3;
				$q3_correct = $q3 == 8*8;
				$q4_correct = preg_match("/^65$/", $q4); // 65 is the only answer
				$q5_correct = preg_match("/^addi(ng|tion)$/", $q5); // accepts "addition" or "adding"

				//calculate their score
				$total_correct = $q1_correct + $q2_correct + $q3_correct + $q4_correct + $q5_correct;
				$total_questions = 5;
				$score = $total_correct / $total_questions;

				// replace booleany values with strings the user will understand
				$q1_correct = $q1_correct ? "Correct!" : "Wrong, try again.";
				$q2_correct = $q2_correct ? "Correct!" : "Wrong, try again.";
				$q3_correct = $q3_correct ? "Correct!" : "Wrong, try again.";
				$q4_correct = $q4_correct ? "Correct!" : "Wrong, try again.";
				$q5_correct = $q5_correct ? "Correct!" : "Wrong, try again.";

				echo <<<END
				<h3>Your results are in!</h3>
				<p>You got $total_correct out of $total_questions correct</p>
				<ol>
					<li>$q1_correct</li>
					<li>$q2_correct</li>
					<li>$q3_correct</li>
					<li>$q4_correct</li>
					<li>$q5_correct</li>
				</ol>
END;
			}

			if (isset($_POST['stage']) && ('process' == $_POST['stage'])) {
			    results();
			} else {
			    quiz();
			}
			?>
		</form>
	</body>
</html>
