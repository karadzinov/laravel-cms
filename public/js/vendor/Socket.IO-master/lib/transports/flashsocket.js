io.Transport.flashsocket = io.Transport.websocket.extend({

  _onClose: function(){
    if (!this.base.connected){
      // something failed, we might be behind a proxy, so we'll try another transport
      this.base.options.transports.splice(io.util.Array.indexOf(this.base.options.transports, 'flashsocket'), 1);
      this.base.transport = this.base.getTransport();
      this.base.connect();
      return;
    }
    return this.__super__();
  }

});

io.Transport.flashsocket.check = function(){
  if ('navigator' in window && navigator.plugins){
    return !! navigator.plugins['Shockwave Flash'].description;
  } 

  if ('ActiveXObject' in window){
    try {
      return !! new ActiveXObject('ShockwaveFlash.ShockwaveFlash').GetVariable('$version');
    } catch (e){}      
  }

  return false;
};