var OahuExampleApp = function(connectHost) {
  var self = this;
  this.account = {};
  this.oahu = Oahu.init({ 
    autoLogin: true, 
    debug: false, 
    remoteUrl: "http://" + connectHost + "/remote.html" 
  }, function(c) {
    c.bind('connect', function(msg, data) { console.log("[Event: " + msg + "]", data); });
    // Oahu events Listeners
    // c.bind('connect:getAccount:(success|error)',  __bind(self.updateUserAccount, self));
    // c.bind('connect:login:(success|error)',       __bind(self.onProviderLoggedIn, self));
    // c.bind('connect:logout:(success|error)',      __bind(self.onProviderLoggedOut, self));
    // UI Listeners
    $(".login_btn").click(function() {
      Oahu.show('connect');
    });
    
    $(".logout_btn").click(function() {
      c.connect.logout();
    });
    
    // Init
    c.connect.login()
    c.connect.getAccount();
  });
};

OahuExampleApp.prototype.updateUserAccount = function(msg, userAccountData) {
  if (msg.split(":").pop() == "error") {
    $("#user_login").show();
  } else {
    $("#user_login").hide();
    this.account = userAccountData;
    // $("#user_account .account_name").text(userAccountData.fullname);
    // $("#user_account .account_picture").attr("src", userAccountData.picture);
    $("#user_account").show();
    console.log("Setting userAccout: ", this.account);
  }
}

OahuExampleApp.prototype.onProviderLoggedIn = function(msg, data) {
  console.log("Provider LoggedIn", msg, data);
  // this.oahu.connect.getAccount();
};

OahuExampleApp.prototype.onProviderLoggedOut = function(msg, data) {
  console.warn("User Logged out", msg, data);
  // c.connect.getAccount();
}