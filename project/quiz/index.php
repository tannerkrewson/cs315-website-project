<?php
	$currentDir = "";
	include '../includes/header.php';
?>
<div class="article">
	<form>
		<h2>Quiz: Should you get a dog or cat?</h2>
		<div class="quiz-question">
			<h3>Question 1: What describes you better?</h3>
			<input type="radio" id="q1-a1"
			 name="quiz-q1" value="1">
			<label for="q1-a1">Energetic and outdoorsy</label>
			<br/>
			<input type="radio" id="q1-a2"
			 name="quiz-q1" value="2">
			<label for="q1-a2">Busy lifestyle and indoorsy</label>
		</div>
		<div class="quiz-question">
			<h3>Question 2: Which characteristics do you want in your pet?</h3>
			<input type="radio" id="q2-a1"
			 name="quiz-q2" value="1">
			<label for="q2-a1">Quiet and independant</label>
			<br/>
			<input type="radio" id="q2-a2"
			 name="quiz-q2" value="2">
			<label for="q2-a2">Active and playful</label>
		</div>
		<div class="quiz-question">
			<h3>Question 3: Do you prefer a larger or smaller pet?</h3>
			<input type="radio" id="q3-a1"
			 name="quiz-q3" value="1">
			<label for="q3-a1">Larger</label>
			<br/>
			<input type="radio" id="q3-a2"
			 name="quiz-q3" value="2">
			<label for="q3-a2">Smaller</label>
			<br/>
			<input type="radio" id="q3-a3"
			 name="quiz-q3" value="3">
			<label for="q3-a3">No preference</label>
		</div>
		<div class="quiz-question">
			<h3>Question 4: Do you want a pet that requires lots of attention?</h3>
			<input type="radio" id="q4-a1"
			 name="quiz-q4" value="1">
			<label for="q4-a1">Yes</label>
			<br/>
			<input type="radio" id="q4-a2"
			 name="quiz-q4" value="2">
			<label for="q4-a2">No</label>
		</div>
		<div class="quiz-question">
			<h3>Question 5: Where do you spend more of your time?</h3>
			<input type="radio" id="q5-a1"
			 name="quiz-q5" value="1">
			<label for="q5-a1">Inside</label>
			<br/>
			<input type="radio" id="q5-a2"
			 name="quiz-q5" value="2">
			<label for="q5-a2">Outside</label>
		</div>
		<p>
			<button type="submit">Submit</button>
		</p>
	</form>
</div>

<?php
	include '../includes/footer.php';
?>
