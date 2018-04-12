
var dogPic = document.getElementById("dog-pic");
var catPic = document.getElementById("cat-pic");

// flip the pics when the mouse goes over either the dog or the cat
dogPic.addEventListener("mouseover", onPic);
catPic.addEventListener("mouseover", onPic);

// unflip them when the mouse leaves the dog
dogPic.addEventListener("mouseout", offPic);
catPic.addEventListener("mouseout", offPic);

// flips the pictures between each other
function onPic (e) {
	dogPic.src = "cat.png";
	catPic.src = "dog.png";
}

// flips them back
function offPic (e) {
	dogPic.src = "dog.png";
	catPic.src = "cat.png";
}
