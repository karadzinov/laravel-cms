(function(){
	
	var json = io.util.JSON;
	
	// abstract
	io.Transport = ioClass({

	  include: [io.util.Events, io.util.Options],

	  init: function(base, options){
	    this.base = base;
	    this.setOptions(options);
	  },

	  send: function(){
	    throw new Error('Missing send() implementation');  
	  },

	  connect: function(){
	    throw new Error('Missing connect() implementation');  
	  },

	  disconnect: function(){
	    throw new Error('Missing disconnect() implementation');  
	  },

	  _onData: function(data){
			try {
				var msgs = json.decode(data);
				if (msgs.messages){
					for (var i = 0, l = msgs.messages.length; i < l; i++){
						this._onMessage(msgs.messages[i]);	
					}					
				}				
			} catch(e){}
	  },

		_onMessage: function(message){
			if (!('sessionid' in this)){
				try {
					var obj = json.decode(message);
		      if (obj.sessionid){
		        this.sessionid = obj.sessionid;
						this._onConnect();
		      }
				} catch(e){}				
			} else {	
				this.base._onMessage(message);
			}		
		},

		_onConnect: function(){
			this.connected = true;
			this.base._onConnect();
		},

		_onDisconnect: function(){
			if (!this.connected) return;
			this.connected = false;
			this.base._onDisconnect();
		},

	  _prepareUrl: function(){
	    return (this.base.options.secure ? 'https' : 'http') 
	      + '://' + this.base.host 
	      + ':' + this.base.options.port
	      + '/' + this.base.options.resource
				+ '/' + this.type
				+ (this.sessionid ? ('/' + this.sessionid) : '');
	  }

	});
	
})();