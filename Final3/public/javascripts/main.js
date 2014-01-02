var player;
var videos = [];
var next = 0;
function onYouTubeIframeAPIReady() {
	
	
	player = new YT.Player('player', {
	  height: '390',
	  width: '640',
	  videoId: 'M7lc1UVf-VE',
	  events: {
		'onStateChange': onPlayerStateChange
	  }
	});
}


function onPlayerStateChange(event) {
	if (event.data == YT.PlayerState.ENDED) {
	if(videos[next]){
		player.loadVideoById(videos[next]);
		next = next + 1;
	  }
	}
}
function stopVideo() {
	player.stopVideo();
}

function nextVideo(){
	
}


$(document).ready(function (){
	var my_username;
	var my_groupname;
	var username_set = false;
	var info_sent = false;
	
	var PeerConnection = window.PeerConnection || window.webkitPeerConnection00 || window.webkitRTCPeerConnection || window.mozRTCPeerConnection || window.RTCPeerConnection;	
	
	// Add video of latest joined person
	rtc.on('add remote stream', function(stream, socket){
		temp_id = socket;
		console.log(temp_id);
		$('#videos').append('<video id="' + temp_id + '" autoplay></video>');
		rtc.attachStream(stream, temp_id);
	});
	
	// Other person disconnected
	rtc.on('disconnect stream', function(data){
		console.log('peer' + data + 'disconnected');
	});
	
	// Append a received message to message div
	rtc.on('receive_message', function(data){
		var message_print = data.sender + ': ' + data.message;
		$('#my_message_data').append($('<b class="recvtxt">' + message_print + '</b><br />').hide().fadeIn(500));
		$("#my_message_data").animate({scrollTop:$("#my_message_data")[0].scrollHeight}, 1500);
	});
	
	//Add a user to user list
	rtc.on('user_connected', function(data){
		var new_user = data.new_user;
		console.log(new_user);
		$('#user_list').append($('<b class="usertxt">' + new_user + '</b><br />').hide().fadeIn(500));
		$("#user_list").animate({scrollTop:$("#user_list")[0].scrollHeight}, 1500);
	});
	
	//Add a video to playlist
	rtc.on('new_video', function(data){
		var new_video = data.video_Id;
		var video_user = data.username;
		videos.push(new_video);
		//player.loadVideoById(new_video);
	});
	
	// Connect to stream, set username and group
	$('#join_chat').click(function(){
		my_username = $('#username').val();
		my_groupname = $('#groupname').val();
		if(my_username == '' || my_groupname == '')
		{
			window.alert('please enter valid username and groupname');
		}
		else{
			if(PeerConnection){
			rtc.createStream({"video": true, "audio": true}, function(stream){
				rtc.attachStream(stream, 'me');
			});
			rtc.connect('ws://localhost:8080', my_groupname);// use server name here
						
			$('#username').val('');
			$('#groupname').val('');
			$('.mytext').remove();
			$('#cur_username').append($('<b class="mytext">' + my_username + '</b>').hide().fadeIn(500));
			$('#cur_group').append($('<b class="mytext">' + my_groupname + '</b>').hide().fadeIn(500));
			username_set = true;
			info_sent = false;
			}
			else{
				window.alert('Error loading PeerConnection');
			}
		}
	});
	
	// Send a message
	$('#send_message').click(function(){
		if(username_set){
			if(!info_sent){ // Sets your username and groupname on the socket
				rtc._socket.send(JSON.stringify({
						"eventName": "add_info",
						"data": {
							"sender": my_username,
							"room": my_groupname
						}
				}));
				info_sent = true;
			}
			
			var my_message = $('#my_message').val();
			$('#my_message_data').append($('<b class="sendtxt">' + my_message + '</b><br />').hide().fadeIn(500));
			rtc._socket.send(JSON.stringify({
					"eventName": "send_message",
					"data": {
						"message": my_message,
					}
				}));			
			$('#my_message').val('');
			$("#my_message_data").animate({scrollTop:$("#my_message_data")[0].scrollHeight}, 1500);
		}
		else
			window.alert("Please enter a username and groupname");
		});
	
	$('#add_video').click(function() {
		if(username_set){
			if(!info_sent){ // Sets your username and groupname on the socket
				rtc._socket.send(JSON.stringify({
						"eventName": "add_info",
						"data": {
							"sender": my_username,
							"room": my_groupname
						}
				}));
				info_sent = true;
			}
			
			video_Id = $('#video_ID').val();
			if(video_Id.length > 11)
			{
				video_Id = video_Id.split('v=')[1];
				var ampersand = video_Id.indexOf('&');
				if(ampersand != -1) {
					video_Id = video_Id.substring(0, ampersand);
				}
				console.log(video_Id);
			}
			if(video_Id.length == 11){
			rtc._socket.send(JSON.stringify({
				"eventName": "add_video",
				"data":{
					"video_Id": video_Id,
					"sender": my_username
				}
			}));
			$('#video_ID').val('');
			}
			else{
				window.alert('invalid URL');
			}
		}
		else{
			window.alert('Please enter a username and groupname');
		}
	});

	
});

