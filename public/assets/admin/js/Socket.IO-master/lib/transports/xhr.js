(function(){
  
  var empty = new Function;
  
  io.Transport.XHR = io.Transport.extend({
	
    connect: function(){
      this._get();
    },
    
    send: function(data){
      this._sendXhr = this._request('send', 'POST');
      this._sendXhr.send('data=' + encodeURIComponent(data));
    },
    
    disconnect: function(){
      if (this._xhr){
        this._xhr.onreadystatechange = empty;
        this._xhr.abort();
      }            
      if (this._sendXhr) this._sendXhr.abort();
			this._onClose();
			this._onDisconnect();
    },
    
    _request: function(url, method, multipart){
      var req = request();
			if (multipart) req.multipart = true;
      req.open(method || 'GET', this._prepareUrl() + (url ? '/' + url : ''));
      if (method == 'POST'){
        req.setRequestHeader('Content-type', 'application/x-www-form-urlencoded; charset=utf-8');
      }
      return req;
    }

  });
  
  var request = io.Transport.XHR.request = function(){
    if ('XMLHttpRequest' in window) return new XMLHttpRequest();
    
    try {
      var a = new ActiveXObject('MSXML2.XMLHTTP');
      return a;
    } catch(e){}
    
    try {
      var b = new ActiveXObject('Microsoft.XMLHTTP');
      return b;      
    } catch(e){}
    
    return false;
  };
  
  io.Transport.XHR.check = function(){
    try {
      if (request()) return true;
    } catch(e){}
    return false;
  };
  
})();