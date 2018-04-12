
// get each tip box
var tips = [
	document.getElementById("tip-1"),
	document.getElementById("tip-2"),
	document.getElementById("tip-3"),
	document.getElementById("tip-4"),
	document.getElementById("tip-5")
];

var prevBut = document.getElementById("prev-but");
var nextBut = document.getElementById("next-but");

// start with the first tip, index 0
var currentTip = 0;
showTip(currentTip);

prevBut.addEventListener("click", function () {
	// make sure next is not pressed on last tip
	if (currentTip > 0) {
		// go to next tip
		currentTip--;

		// show current tips
		showTip(currentTip);
	}
});

nextBut.addEventListener("click", function () {
	// make sure next is not pressed on last tip
	if (currentTip < tips.length-1) {
		// go to next tip
		currentTip++;

		// show current tips
		showTip(currentTip);
	}
});

function showTip(tipToShow) {

	//hide all tips except tipToShow
	for (var i = 0; i < tips.length; i++) {
		if (i !== tipToShow) {
			tips[i].style.display = "none";
		} else {
			tips[i].style.display = "block";
		}
	}

	// show or hide previous button
	if (tipToShow > 0) {
		prevBut.style.display = "block";
	} else {
		prevBut.style.display = "none";
	}

	// show or hide next button
	if (tipToShow < tips.length-1) {
		nextBut.style.display = "block";
	} else {
		nextBut.style.display = "none";
	}
}
