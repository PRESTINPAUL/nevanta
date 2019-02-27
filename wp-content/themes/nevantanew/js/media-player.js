// Sample Media Player using HTML5's Media API
// 
// Ian Devlin (c) 2012
// http://iandevlin.com
// http://twitter.com/iandevlin
//
// This was written as part of an article for the February 2013 edition of .net magazine (http://netmagazine.com/)

// Wait for the DOM to be loaded before initialising the media player
document.addEventListener("DOMContentLoaded", function() { initialiseMediaPlayer(); }, false);

// Variables to store handles to various required elements
var mediaPlayer;
var playPauseBtn;
var playPauseBtnNew;
var muteBtn;
var progressBar;
var volume = jQuery('.volume');


var updateVolume = function(x, vol) {
	var volume = jQuery('.volume');
	var percentage;
	//if only volume have specificed
	//then direct update volume
	if(vol) {
		percentage = vol * 100;
	}
	else {
		var position = x - volume.offset().left;
		percentage = 100 * position / volume.width();
	}
	
	if(percentage > 100) {
		percentage = 100;
	}
	if(percentage < 0) {
		percentage = 0;
	}
	
	//update volume bar and video volume
	jQuery('.volumeBar').css('width',percentage+'%');	
	//console.log("Per: " + percentage);
	if(mediaPlayer){
	mediaPlayer.volume = percentage / 100;
	
	//change sound icon based on volume
	//console.log(mediaPlayer.volume);
	if(mediaPlayer.volume == 0){
		jQuery('.sound').removeClass('sound2').addClass('muted');
	}
	else if(mediaPlayer.volume > 0.5){
		jQuery('.sound').removeClass('muted').addClass('sound2');
	}
	else{
		jQuery('.sound').removeClass('muted').removeClass('sound2');
	}}
		
};


function initialiseMediaPlayer() {
	// Get a handle to the player
	mediaPlayer = document.getElementById('media-video');
	
	// Get handles to each of the buttons and required elements
	playPauseBtn = document.getElementById('play-pause-button');
	playPauseBtnNew = document.getElementById('play-pause-button-new');
	muteBtn = document.getElementById('mute-button');
	jQuery('.current-time-video-player').text(timeFormat(0));
	updateVolume(0, 0.7);
	//progressBar = document.getElementById('progress-bar');
	/*var volumeBar = document.getElementById("volume-bar");*/
	
	// Hide the browser's default controls
	if(mediaPlayer){
	mediaPlayer.controls = false;
	
	
	//get HTML5 video time duration
//mediaPlayer.on('loadedmetadata', function() {
    jQuery('.duration').text(mediaPlayer.duration);
	
	
//});
	
	// Add a listener for the timeupdate event so we can update the progress bar
	mediaPlayer.addEventListener('timeupdate', updateProgressBar, false);
	
	// Add a listener for the play and pause events so the buttons state can be updated
	mediaPlayer.addEventListener('play', function() {
		// Change the button to be a pause button
		changeButtonType(playPauseBtn, 'pause');
		if(playPauseBtnNew != null){
			changeButtonType(playPauseBtnNew, 'pause');
		}
	}, false);
	mediaPlayer.addEventListener('pause', function() {
		// Change the button to be a play button
		changeButtonType(playPauseBtn, 'play');
		if(playPauseBtnNew != null){
			changeButtonType(playPauseBtnNew, 'play');
		}
	}, false);
	
	// need to work on this one more...how to know it's muted?
	/*mediaPlayer.addEventListener('volumechange', function(e) { 
		// Update the button to be mute/unmute
		if (mediaPlayer.muted) changeButtonType(muteBtn, 'unmute');
		else changeButtonType(muteBtn, 'mute');
	}, false);*/

	// Event listener for the volume bar
	/*volumeBar.addEventListener("change", function() {
		// Update the video volume
		mediaPlayer.volume = volumeBar.value;
	});*/
	
	mediaPlayer.addEventListener('ended', function() { 
		this.pause();
		/* exit fullscreen mode */
		/*if(jQuery.isFunction(mediaPlayer.webkitExitFullscreen)) {
			mediaPlayer.webkitExitFullscreen();
		}	
		else if (jQuery.isFunction(mediaPlayer.mozCancelFullscreen)) {
			mediaPlayer.mozCancelFullscreen();
		}
		else{
			mediaPlayer.exitFullscreen();
		}*/
	}, false);}
	
}

function togglePlayPause() {
		
	
	// If the mediaPlayer is currently paused or has ended
	if (mediaPlayer.paused || mediaPlayer.ended) {
		if(jQuery.isFunction(mediaPlayer.webkitExitFullscreen)) {
			jQuery(".video-overlay-button").show();
		}	
		else if (jQuery.isFunction(mediaPlayer.mozCancelFullscreen)) {
			jQuery(".video-overlay-button").show();
		}
		else{
			jQuery(".video-overlay-button").hide();
		}
		jQuery("#video_html5").removeClass('inner-content-onhover');
		jQuery(".slider-text.on-video-content").hide();
		// Change the button to be a pause button
		changeButtonType(playPauseBtn, 'pause');
		if(playPauseBtnNew != null){
			changeButtonType(playPauseBtnNew, 'pause');
		}
		// Play the media
		mediaPlayer.play();			
	}	
	// Otherwise it must currently be playing
	else {
		if(jQuery.isFunction(mediaPlayer.webkitExitFullscreen)) {
			jQuery(".video-overlay-button").hide();
		}	
		else if (jQuery.isFunction(mediaPlayer.mozCancelFullscreen)) {
			jQuery(".video-overlay-button").hide();
		}
		else{
			jQuery(".video-overlay-button").show();			
		}
		jQuery("#video_html5").addClass('inner-content-onhover');
		// Change the button to be a play button
		changeButtonType(playPauseBtn, 'play');
		if(playPauseBtnNew != null){
			changeButtonType(playPauseBtnNew, 'play');
		}
		// Pause the media
		mediaPlayer.pause();
	}
		
	//jQuery('#media-controls').css("display", "none !important");
	//jQuery('#media-controls').hide();
	//console.log('This Works 1');	
}

function togglePlayPauseOnScreen() {
	// If the mediaPlayer is currently paused or has ended
	if (mediaPlayer.paused || mediaPlayer.ended) {
		if(jQuery.isFunction(mediaPlayer.webkitExitFullscreen)) {
			jQuery(".video-overlay-button").toggle();
		}	
		else if (jQuery.isFunction(mediaPlayer.mozCancelFullscreen)) {
			jQuery(".video-overlay-button").toggle();
		}
		else{
			jQuery(".video-overlay-button").toggle();
		}
		if(playPauseBtnNew == null){
			//jQuery("#media-controls").toggle();
		}
		jQuery("#video_html5").removeClass('inner-content-onhover');
		jQuery(".slider-text.on-video-content").toggle();
		// Change the button to be a pause button
		changeButtonType(playPauseBtn, 'pause');
		if(playPauseBtnNew != null){
			changeButtonType(playPauseBtnNew, 'pause');
		}
		// Play the media
		mediaPlayer.play();
		
		/*jQuery('#media-player').css({
			 position: 'fixed',top: 0,
			});*/
			if(jQuery('#wpadminbar').length > 0){
				var mediavideoheight = jQuery(window).height() - 196;
			}
			else{
				var mediavideoheight = jQuery(window).height() - 164;
			}
			jQuery('#media-video').height(mediavideoheight);
			//jQuery('#media-player').height( jQuery(window).height() );
		
	}
	// Otherwise it must currently be playing
	else {
		if(jQuery.isFunction(mediaPlayer.webkitExitFullscreen)) {
			jQuery(".video-overlay-button").toggle();
		}	
		else if (jQuery.isFunction(mediaPlayer.mozCancelFullscreen)) {
			jQuery(".video-overlay-button").toggle();
		}
		else{
			jQuery(".video-overlay-button").toggle();
		}
		// Change the button to be a play button
		changeButtonType(playPauseBtn, 'play');
		if(playPauseBtnNew != null){
			changeButtonType(playPauseBtnNew, 'play');
		}
		// Pause the media
		mediaPlayer.pause();
	}
}


// Stop the current media from playing, and return it to the start position
function stopPlayer() {
	mediaPlayer.pause();
	mediaPlayer.currentTime = 0;
}

// Changes the volume on the media player
function changeVolume(direction) {
	if (direction === '+') mediaPlayer.volume += mediaPlayer.volume == 1 ? 0 : 0.1;
	else mediaPlayer.volume -= (mediaPlayer.volume == 0 ? 0 : 0.1);
	mediaPlayer.volume = parseFloat(mediaPlayer.volume).toFixed(1);
}

// Toggles the media player's mute and unmute status
/*function toggleMute() {
	if (mediaPlayer.muted) {
		// Change the cutton to be a mute button
		changeButtonType(muteBtn, 'mute');
		// Unmute the media player
		mediaPlayer.muted = false;
		
		jQuery('.volumeBar').css('width', mediaPlayer.volume*100+'%');
	}
	else {
		// Change the button to be an unmute button
		changeButtonType(muteBtn, 'unmute');
		// Mute the media player
		mediaPlayer.muted = true;
		
		jQuery('.volumeBar').css('width',0);
	}
}*/

// Replays the media currently loaded in the player
function replayMedia() {
	resetPlayer();
	mediaPlayer.play();
}

// Update the progress bar
function updateProgressBar() {
	//alert(mediaPlayer.currentTime);return false;
	 jQuery('.current-time-video-player').text(timeFormat(mediaPlayer.currentTime));
	 
	var currentPos = mediaPlayer.currentTime; //Get currenttime
    var maxduration = mediaPlayer.duration; //Get video duration
    var percentage = 100 * currentPos / maxduration;
    jQuery('.timeBar').css('width', percentage+'%');
	if(mediaPlayer.currentTime == mediaPlayer.duration){
		resetPlayer();
		v=mediaPlayer.currentSrc;
		mediaPlayer.src='';
		mediaPlayer.src=v;
		mediaPlayer.load();
		jQuery('#media-video').css('height','auto');
		jQuery(".video-overlay-button").show();
		jQuery(".slider-text.on-video-content").show();
		jQuery("#media-controls").hide();
		jQuery(".media-controls-new").hide();
		jQuery(".video-info-div").hide();
		jQuery('.slider-poster').show();
		jQuery('#media-video').hide();
		jQuery('#media-controls').addClass("hidecontrols");
		//console.log("video ended");	
		jQuery('#media-video').removeClass('display-media-video');
		jQuery('#media-video').removeClass('display-media-video');
		jQuery('#media-video').addClass('display-none-media-video');
		jQuery('#media-video').hide();
					//jQuery('.slider-poster').show();
		jQuery('.slider-poster').addClass('add-slider-poster');			
		
	}
	else{
		if(jQuery('#wpadminbar').length > 0){
			var mediavideoheight = jQuery(window).height() - 196;
		}
		else{
			var mediavideoheight = jQuery(window).height() - 164;
		}
		jQuery('#media-video').css('height', mediavideoheight);
		jQuery('#media-video').show();
		if(playPauseBtnNew != null){
			jQuery(".media-controls-new").show();
		}
		else{
			jQuery("#media-controls").show();
		}
		jQuery(".video-info-div").show();
		jQuery('.slider-poster').hide();
		if (mediaPlayer.paused) {
			jQuery(".video-overlay-button").show();
		}
		else{
			jQuery(".video-overlay-button").hide();
		}
		jQuery(".slider-text.on-video-content").hide();
	}
}




// Updates a button's title, innerHTML and CSS class to a certain value
function changeButtonType(btn, value) {
	btn.title = value;
	btn.innerHTML = value;
	btn.className = value;
}

// Loads a video item into the media player
function loadVideo() {
	for (var i = 0; i < arguments.length; i++) {
		var file = arguments[i].split('.');
		var ext = file[file.length - 1];
		// Check if this media can be played
		if (canPlayVideo(ext)) {
			// Reset the player, change the source file and load it
			resetPlayer();
			mediaPlayer.src = arguments[i];
			mediaPlayer.load();
			break;
		}
	}
}

// Checks if the browser can play this particular type of file or not
function canPlayVideo(ext) {
	var ableToPlay = mediaPlayer.canPlayType('video/' + ext);
	if (ableToPlay == '') return false;
	else return true;
}

// Resets the media player
function resetPlayer() {
	// Reset the progress bar to 0
	jQuery('.timeBar').css('width', '0%');
	// Move the media back to the start
	mediaPlayer.currentTime = 0;
	// Ensure that the play pause button is set as 'play'
	changeButtonType(playPauseBtn, 'play');
	if(playPauseBtnNew != null){
		changeButtonType(playPauseBtnNew, 'play');
	}
}

//Time format converter - 00:00
function timeFormat(seconds){
	var m = Math.floor(seconds/60)<10 ? "0"+Math.floor(seconds/60) : Math.floor(seconds/60);
	var s = Math.floor(seconds-(m*60))<10 ? "0"+Math.floor(seconds-(m*60)) : Math.floor(seconds-(m*60));
	return m+":"+s;
}
jQuery(document).ready(function(){
//fullscreen button clicked
	jQuery('.fullscreen').on('click', function() {
		if(jQuery.isFunction(mediaPlayer.webkitEnterFullscreen)) {
			mediaPlayer.webkitEnterFullscreen();
		}	
		else if (jQuery.isFunction(mediaPlayer.mozRequestFullScreen)) {
			mediaPlayer.mozRequestFullScreen();
		}
		else {
			alert('Your browsers doesn\'t support fullscreen');
		}
	});
	
	
	
	
var timeDrag = false;   /* Drag status */
jQuery('.progressBar').mousedown(function(e) {
    timeDrag = true;
    updatebar(e.pageX);
});
jQuery(document).mouseup(function(e) {
    if(timeDrag) {
        timeDrag = false;
        updatebar(e.pageX);
    }
});
jQuery(document).mousemove(function(e) {
    if(timeDrag) {
		timeDrag = true;
        updatebar(e.pageX);
    }
});

//update Progress Bar control
var updatebar = function(x) {
    var progress = jQuery('.progressBar');
    var maxduration = mediaPlayer.duration; //Video duraiton
    var position = x - progress.offset().left; //Click pos
    var percentage = 100 * position / progress.width();
 
    //Check within range
    if(percentage > 100) {
        percentage = 100;
    }
    if(percentage < 0) {
        percentage = 0;
    }
 
    //Update progress bar and video currenttime
    jQuery('.timeBar').css('width', percentage+'%');
	
	//jQuery('#gettime').value();
	//var gettimeval = document.getElementById('gettime');
	/*if(percentage > '99.9'){
		//alert(percentage);
		jQuery('#media-controls').hide();		
	}*/
	
    mediaPlayer.currentTime = maxduration * percentage / 100;
};

//sound button clicked
	jQuery('.sound').click(function() {
		mediaPlayer.muted = !mediaPlayer.muted;
		jQuery(this).toggleClass('muted');
		if(mediaPlayer.muted) {
			jQuery('.volumeBar').css('width',0);
		}
		else{
			jQuery('.volumeBar').css('width', mediaPlayer.volume*100+'%');
		}
	});

//Volume control clicked
var volumeDrag = false;
jQuery('.volume').on('mousedown', function(e) {
		volumeDrag = true;
		mediaPlayer.muted = false;
		jQuery('#sound').removeClass('muted');
		//console.log(e.pageX);
		updateVolume(e.pageX);
	});
	jQuery(document).on('mouseup', function(e) {
		if(volumeDrag) {
			volumeDrag = false;
			updateVolume(e.pageX);
		}
	});
	jQuery(document).on('mousemove', function(e) {
		if(volumeDrag) {
			updateVolume(e.pageX);
		}
	});
	
	var vid = document.getElementById("media-video");
	if(vid){
	vid.onvolumechange = function() {
	//console.log("Muted" + mediaPlayer.muted);
	if(mediaPlayer.muted == false){updateVolume('',vid.volume);}
};}

	//alert(1)
	/*jQuery('#progress-bar').on('click', function(e) {
		 var progressBar = jQuery(this).val();
		 var x = e.pageX - this.offsetLeft // or e.offsetX (less support, though)
		 var  y = e.pageY - this.offsetTop // or e.offsetY
		 clickedValue = x * this.max / this.offsetWidth,
			isClicked = clickedValue > this.value;
			
		if (isClicked) {
			//alert('You clicked within the value range at: ' + clickedValue);
			var percentage = Math.floor((100 / mediaPlayer.duration) * mediaPlayer.currentTime);
			//alert(percentage);
			var newper = percentage + 10;
			//alert(newper);
			jQuery("#progress-bar").val(newper);
			//progressBar.value = newper;
			//progressBar.innerHTML = newper + '% played';
			//jQuery('span.current-time').text(timeFormat(mediaPlayer.currentTime));
		}
	});*/
	// HD Video change source 
	
});

/*jQuery('#media-video').on('ended', function(e) {
	jQuery('#media-controls').css("display", "none !important");
	jQuery('#media-controls').hide();
	console.log('This Works 2');	
});*/
