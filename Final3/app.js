
/**
 * Module dependencies.
 */

var express = require('express')
  , routes = require('./routes')
  , user = require('./routes/user')
  , login = require('./routes/login')
  , engine = require('ejs-locals')
  , redis = require('redis')
  , path = require('path');

//var db = redis.createClient();
var app = express();

var http = require('http').createServer(app);


// all environments
app.engine('ejs', engine);
app.set('port', process.env.PORT || 8080);
app.set('views', __dirname + '/views');
app.set('view engine', 'ejs');
app.use(express.favicon());
app.use(express.logger('dev'));
app.use(express.bodyParser());
app.use(express.methodOverride());
  app.use(express.cookieParser('your secret here'));
  app.use(express.session());
app.use(app.router);
  app.use(require('stylus').middleware(__dirname + '/public'));
app.use(express.static(path.join(__dirname, 'public')));

// development only
if ('development' == app.get('env')) {
  app.use(express.errorHandler());
}

app.get('/', routes.index);
app.get('/users', user.list);
app.get('/login', login.loginform);




// Start http server
http.listen(app.get('port'), function(){
  console.log('Express server listening on port ' + app.get('port'));
});

var webRTC = require('webrtc.io').listen(http);

// Run when user connects to server
webRTC.rtc.on('connect', function(socket) {
	console.log('user connected');
});

// Set users info on their socket
webRTC.rtc.on('add_info', function(data, socket){//add user info to websocket
	socket["my_data"] = {};
	socket["my_data"].username = data.sender;
	socket["my_data"].room = data.room;
	
	
	var rooms = webRTC.rtc.rooms[data.room] || [];
	for(var i = 0; i < rooms.length; i++)//send user info to others in room
	{
		var socketId = rooms[i];
		var soc = webRTC.rtc.getSocket(socketId);
		if(soc){
			soc.send(JSON.stringify({
				"eventName": "user_connected",
				"data":{
					"new_user": data.sender
				}
			}));
		}
	}
});

// Broadcast a message to a group
webRTC.rtc.on('send_message', function(data, socket){
	var room = socket.my_data.room;
	var username = socket.my_data.username;
	var rooms = webRTC.rtc.rooms[room] || [];
	
	for(var i = 0; i < rooms.length; i++)
	{
		var socketId = rooms[i];
		
		if(socketId !== socket.id){ // socket belongs to someone not the original sender in the room
			var soc = webRTC.rtc.getSocket(socketId);
			if(soc){
				soc.send(JSON.stringify({
					"eventName": "receive_message",
					"data":{
						"message": data.message,
						"sender": username
					}
				}));
			}
		}
	}
});

webRTC.rtc.on('add_video', function(data, socket){
	var video = data.video_Id;
	var username = socket.my_data.username;
	var room = socket.my_data.room;
	var rooms = webRTC.rtc.rooms[room] || [];
	
	for(var i = 0; i < rooms.length; i++)
	{
		var socketId = rooms[i];
		
		var soc = webRTC.rtc.getSocket(socketId);
		if(soc){
			soc.send(JSON.stringify({
				"eventName": "new_video",
				"data":{
					"video_Id": video,
					"sender": username
				}
			}));
		}
		
	}
});




