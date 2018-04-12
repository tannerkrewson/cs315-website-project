
var area = document.getElementById("fetch-area");
var ball = document.getElementById("fetch-ball");
var dog = document.getElementById("fetch-dog");

var animationInProgress = false;

// ran when page loads to make sure dog and ball are positioned correctly
reset();

// ran when the throw button is clicked
document.getElementById("fetch-throw").addEventListener("click", function () {
	// prevents button from being pressed multiple times and making the
	// animation buggy
	if (!animationInProgress) {
		// bring the dog back to the starting position, if not already there
		reset();

		animationInProgress = true;

		// commence the animaton
		throwBall();
	}
});

function throwBall() {
	//get the current positon of the ball
	var ballStartingPosition = ball.offsetLeft;

	// the horizontal position of the black fetch box, minus 128px
	// this is where the ball will be thrown to
	var edgeOfFetchArea = area.offsetLeft + area.offsetWidth - 128;

	// speed is the number of pixels traveled every 1/60th of a second
	var ballSpeed = 16;

	// start the animation, and the dog run out to the ball after it is thrown
	animate(ball, ballStartingPosition, edgeOfFetchArea, ballSpeed, true, function() {
		// ran after ball is thrown
		dogRetrieve(edgeOfFetchArea);
	});
}

function dogRetrieve(ballPos) {
	var dogStartingPosition = dog.offsetLeft;
	var dogSpeed = 8;
	animate(dog, dogStartingPosition, ballPos, dogSpeed, true, function () {
		// ran after dog has reached the ball
		putBallInDogsMouth();
		dogRunBallBack();
	});
}

function putBallInDogsMouth() {

	// puts the ball near the dogs mouth
	ball.style.left = (dog.offsetLeft - 32) + "px";

	// makes the dog face left
	dog.style.transform = "scaleX(-1)";
}

function dogRunBallBack() {
	var dogStartingPosition = dog.offsetLeft;
	var ballStartingPosition = ball.offsetLeft;
	var dogSpeed = 8;

	// animate the dog and the ball moving to the left simultaneously
	animate(dog, dogStartingPosition, area.offsetLeft+32, dogSpeed, false, function (){});
	animate(ball, ballStartingPosition, area.offsetLeft, dogSpeed, false, function (){
		reset();
		animationInProgress = false;
	});
}

function reset () {
	// places the dog at the left side of the box
	dog.style.left = area.offsetLeft + "px";

	// unflip image if it was flipped
	dog.style.transform = "scaleX(1)";

	// puts ball near the right of the dog
	ball.style.left = (area.offsetLeft + 128) + "px";
}

function animate(elem, position, dest, speed, goLeft, callback) {
	// if the position has not met or exceeded the destination in the direction
	// the animation is going, stillGoing is true
	var stillGoing = goLeft ? position < dest : position > dest;

	// if animation has completed
	if (!stillGoing) {
		callback();
		return;
	}

	// set new position every 1/60th of a second
	setTimeout(function () {
		var newPos;
		if (goLeft) {
			newPos = position + speed;
		} else {
			newPos = position - speed;
		}
		elem.style.left = newPos + "px";
		animate(elem, newPos, dest, speed, goLeft, callback);
	}, 1000.0/60.0); // 60 frames per second
}
