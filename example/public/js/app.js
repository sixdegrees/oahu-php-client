
var AppInit = function(connectHost, appId) {
  
  var App = SC.Application.create({
    oahuInit: function() {
      var self = this;
      this.set('yo', 'satlu');
      this.set('userAccount', "undefined YEAH");
      var oahu = Oahu.init({ 
        appId: appId,
        autoLogin: true, 
        debug: false, 
        remoteUrl: "http://" + connectHost + "/remote.html" 
      }, function(c) {
        console.log("Oahu init ok", c);
        c.connect.getAccount();
      });

      oahu.bind('connect', function(msg, data) { console.warn("[Event: " + msg + "]", data); });
      oahu.bind('Oahu:connect:getAccount:success', function(msg, data) {
        self.set('userAccount', App.UserAccount.create(data));
      });
      this.set('oahu', oahu);
    }
  });
  
  App.UserAccount = SC.Object.extend({
    fullname: null,
    picture: null
  });

  App.userAccountView = SC.View.extend({
    userAccountBinding: 'App.userAccount'
    
  });
  
  return App;
};
