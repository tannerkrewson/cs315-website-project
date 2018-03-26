
document.getElementById("the-form").addEventListener("submit", function(e){
	// prevent form from submitting as a GET request
	e.preventDefault();

	// gets strings from inputs, trims off any whitespace, and splits into an array
	var time = document.getElementById("input-1").value;
	var offset = document.getElementById("input-2").value;

	// check for basic formatting
	if (time.length > 7 || time.length < 4) {
		error(time, "Incorrect time format");
		return;
	}
	if (offset.length !== 5) {
		error(offset, "Incorrect time difference format");
		return;
	}

	// trims off any whitespace, and splits into an array
	time = time.trim().split(":");
	offset = offset.trim().split(":");

	// if there is no or too many colons
	if (time.length !== 2) {
		error(time, "Incorrect time format");
		return;
	}
	if (offset.length !== 2) {
		error(offset, "Incorrect time difference format");
		return;
	}

	// parse data out of time input
	var timeHour = parseInt(time[0]);
	var timeMins = parseInt(time[1].substring(0,2));
	var timeAmPm = time[1].substring(2).toUpperCase();

	if (timeHour < 1 || timeHour > 12) {
		error(timeHour, "Hours of first time out of range, must be between 1 and 12");
		return;
	}

	if (timeMins < 0 || timeMins >= 60) {
		error(timeMins, "Minutes of first time out of range, must be between 0 and 59");
		return;
	}

	// AM or PM not present so assuming AM
	if (timeAmPm === "") {
		timeAmPm = "AM";
	}

	if (timeAmPm !== "AM" && timeAmPm !== "PM") {
		error(timeAmPm, "Time AM or PM invalid");
		return;
	}

	// parse data out of offset input
	var offsetHour = parseInt(offset[0]);
	var offsetMins = parseInt(offset[1]);

	if (offsetHour < 0 || offsetHour > 24) {
		error(offsetHour, "Hours of second time out of range, must be between 0 and 24");
		return;
	}

	if (offsetMins < 0 || offsetMins >= 60) {
		error(offsetMins, "Minutes of second time out of range, must be between 0 and 59");
		return;
	}

	if (offsetHour === 24 && offsetMins !== 0) {
		error(offsetHour + ":" + (offsetMins < 10 ? "0" : "") + offsetMins, "Time difference cannot exceed 24:00");
		return;
	}

	var resHours, resMins, resAmPm, resSuffix;

	// convert timeHour to military time
	if (timeHour < 12 && timeAmPm === "PM") {
		// 1:00 PM to 11:59 PM
		resHours = 12 + timeHour;
	} else if (timeHour === 12 && timeAmPm === "AM") {
		// 12:00 AM to 12:59 AM
		resHours = 0;
	} else {
		// 1:00 AM to 12:59 PM
		resHours = timeHour;
	}

	resHours += offsetHour; // resHours will now be 0 to 47

	resMins = timeMins + offsetMins;

	// check if offset minutes put time into next hour
	if (resMins >= 60) {
		resMins -= 60;
		resHours++;
	}

	// check if offset puts time into next day
	if (resHours >= 24) {
		resHours -= 24;
		resSuffix = " + 1 day";
	} else {
		resSuffix = "";
	}

	// convert hours to non-military time
	if (resHours > 12) {
		resHours -= 12;
		resAmPm = "PM";
	} else if (resHours === 12) {
		resAmPm = "PM";
	} else {
		resAmPm = "AM";
	}

	// convert 0 am to 12 am
	if (resHours === 0) {
		resHours = 12;
	}

	// add leading zero to minutes
	if (resMins < 10) {
		resMins = "0" + resMins;
	}

	document.getElementById("result").innerHTML =
		resHours + ":" + resMins + " " + resAmPm + resSuffix;

});

function error(entered, msg) {
	var temp = msg + ". You entered " + entered + ".";
	document.getElementById("result").innerHTML = temp;
}
