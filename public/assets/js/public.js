(function($) {
	"use strict";

	$(function() {

		// Place your public-facing JavaScript here
		var eventMethod = window.addEventListener ? "addEventListener" : "attachEvent";
		var eventer = window[eventMethod];
		var messageEvent = eventMethod == "attachEvent" ? "onmessage" : "message";

		// Listen to message from child window
		eventer(messageEvent, function(e) {
			if (typeof e !== 'undefined' && typeof e.data !== 'undefined' && typeof e.data.newHeight !== 'undefined') {
				document.getElementById('redditjs_post').height = e.data.newHeight + 'px';
			}
		}, false);

	});

}(jQuery));