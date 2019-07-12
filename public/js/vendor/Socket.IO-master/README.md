socket.io Client: Sockets for the rest of us
============================================

The `socket.io` client is basically a simple HTTP Socket interface implementation. It allows you to establish a realtime connection with a server (see `socket.io` server [here](http://github.com/RosePad/Socket.IO-node)), hiding the complexity of the different transports (WebSocket, Flash, forever iframe, XHR long polling, XHR multipart encoded, etc).

## Features

- Supports 
	- WebSocket
	- Adobe Flash Socket
	- ActiveX HTMLFile (IE) 
	- Server-Sent Events (Opera)
	- XHR with multipart encoding
	- XHR with long-polling
	
- ActionScript Socket is known not to work behind proxies, as it doesn't have access to the user agent proxy settings to implement the CONNECT HTTP method. If it fails, `socket.io` will try something else.
	
- On a successful connection, it remembers the transport for next time (stores it in a cookie).

- Small. Closure Compiled with all deps: 5.82kb (gzipped).

- Easy to use! See [socket.io-node](http://github.com/RosePad/Socket.IO-node) for the server to connect to.

## How to use
	
In your head
	
	<script src="/path/to/socket.io.min.js">
	<script>
		io.setPath('/path/to/socket.io/');
	</script>
	
In your code

	socket = new io.Socket('localhost');
	socket.connect();
	socket.send('some data');
	socket.addEvent('message', function(data){
		alert('got some data' + data);
	});
	
For an example, check out the chat [source](https://github.com/RosePad/Socket.IO-node/blob/master/test/chat.html).

## Documentation 

### io.Socket

	new io.Socket(host, [options]);

Options:

- *port*

		80
	
	The port `socket.io` server is attached to

- *resource*

		socket.io

  The resource is what allows the `socket.io` server to identify incoming connections by `socket.io` clients. In other words, any HTTP server can implement socket.io and still serve other normal, non-realtime HTTP requests.

- *transports*

		['websocket', 'server-events', 'flashsocket', 'htmlfile', 'xhr-multipart', 'xhr-polling']

	A list of the transports to attempt to utilize (in order of preference)
	
- *transportOptions*
	
		{
			someTransport: {
				someOption: true
			},
			...
		}
				
	An object containing (optional) options to pass to each transport.

Properties:

- *options*

	The passed in options combined with the defaults

- *connected*

	Whether the socket is connected or not.
	
- *connecting*

	Whether the socket is connecting or not.
	
- *transport*	

	The transport instance.

Methods:
	
- *connect*

	Establishes a connection	
	
- *send(message)*
	
	A string of data to send.
	
- *disconnect*

	Closes the connection
	
- *addEvent(event, λ)*

	Adds a listener for the event *event*
	
- *removeEvent(event, λ)*

	Removes the listener λ for the event *event*
	
Events:

- *connect*

	Fired when the connection is established and the handshake successful
	
- *message(message)*
	
	Fired when a message arrives from the server

- *close*

	Fired when the connection is closed. Be careful with using this event, as some transports will fire it even under temporary, expected disconnections (such as XHR-Polling).
	
- *disconnect*

	Fired when the connection is considered disconnected.
	
## Credits

Guillermo Rauch [guillermo@rosepad.com]

## License 

(The MIT License)

Copyright (c) 2009 RosePad &lt;dev@rosepad.com&gt;

Permission is hereby granted, free of charge, to any person obtaining
a copy of this software and associated documentation files (the
'Software'), to deal in the Software without restriction, including
without limitation the rights to use, copy, modify, merge, publish,
distribute, sublicense, and/or sell copies of the Software, and to
permit persons to whom the Software is furnished to do so, subject to
the following conditions:

The above copyright notice and this permission notice shall be
included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED 'AS IS', WITHOUT WARRANTY OF ANY KIND,
EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT.
IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY
CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT,
TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE
SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.