(function($) {
	"use strict";

	$(function() {

		// Place your public-facing JavaScript here
		var eventMethod = window.addEventListener ? "addEventListener" : "attachEvent";
		var eventer = window[eventMethod];
		var messageEvent = eventMethod == "attachEvent" ? "onmessage" : "message";

		//cache jquery objects
		var $redditjs_post = $('#redditjs_post')

		// Listen to message from child window
		eventer(messageEvent, function(e) {

			if (typeof e === 'undefined' && typeof e.data === 'undefined') {
				//error checking
				return;
			}

			if (typeof e.data.newWidth !== 'undefined' || typeof e.data.newHeight !== 'undefined') {
				$redditjs_post.addClass('iframePostLoaded');

				var newHeight = e.data.newHeight || window.wp_redditjs.height
				var newWidth = e.data.newWidth || window.wp_redditjs.width

				setHeight($redditjs_post, newHeight)
				setWidth($redditjs_post, newWidth)

			}

		}, false);

		function setHeight(iframe, newHeight) {
			iframe.height = newHeight
			iframe.css('height', newHeight)

		}

		function setWidth(iframe, newWidth) {
			iframe.width = newWidth
			iframe.css('width', newWidth)
		}

	});

}(jQuery));