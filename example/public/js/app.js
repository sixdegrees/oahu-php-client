var App;

$(function() {
  
  // Oahu.init({
  //   consumerId  : OahuConfig.consumer_id,
  //   autoLogin   : true,
  //   debug       : true,
  //   success     : function(oahu){ },
  //   error       : function(callback){ }
  // });
  // 
  $('.oahu_share').addClass('disabled');
  
  var user_account;
  
  Oahu.init({
    appId:OahuConfig.consumer_id,
    debug: true,
    remoteUrl:'http://'+OahuConfig.connect_host+'/remote.html'
  },function(c){
    $('.oahu_share').removeClass('disabled');
    $('#website_connect_btn').removeClass('disabled');
    
    // debug('>> Oahu Init Callback',c);
    // var account = c.connect.getAccount();
    // debug('>> Oahu Account',account);
  });

  function onConnect(message,data){
    console.warn('>> Oahu Connect Event', message, data);
  }

  function addAlert(message, kind){
    alert = $('<div>').addClass('alert-message block-message fade in '+kind).html(message).data('alert','alert').prependTo('#login .row .span8');
  }
  function setLoginStatus() {
    if (user_account && user_account.fullname) {
      $('.logged_in').show();
      $('.logged_out').hide();
    } else {
      $('.logged_in').hide();
      $('.logged_out').show();      
    }
  }

  function onLoginSuccess(message,data){
    if(data) {
      user_account = data;
    } else {
      return false;
    }
    addAlert('Welcome, '+data.fullname, 'warning');
    $('#user_name').html(data.fullname);
    $('#user_picture').html($('<img>').attr('src',data.picture));
  }
  function onLogoutSuccess(message,data){
    user_account=null;
    addAlert('Logged out','error');
  }
  
  function onFacebookInfos(message,data){
    $('#user_sig').attr('value',user_account.sig);
    $('#oahu_id').attr('value',user_account._id);
    $('#fullname').attr('value',data.name);
    $('#email').attr('value',data.email);
  }
 
  //Bind on ALL connect events,
  //oahu.bind('start',onConnect);
  //Bind on a specific login success event,
  Oahu.bind('Oahu:connect:login:success',  onLoginSuccess);
  Oahu.bind('Oahu:connect:login:success',  setLoginStatus);
  Oahu.bind('Oahu:connect:logout:success', onLogoutSuccess);
  Oahu.bind('Oahu:connect:logout:success',  setLoginStatus);
  Oahu.bind('Facebook:connect:getInfos:success',onFacebookInfos);
  //oahu.bind('Oahu:connect', function() { setTimeout(setLoginStatus.apply(this), 10); });

  $('.login_btn').click(function(){
    Oahu.connect.login();
  });
  
  $('.fill_form').click(function(){
    Oahu.connect.getInfos('Facebook');
  });
  
  $('.logout_btn').click(function(){
    Oahu.connect.logout();
  });
  
  $('.fb_logout_btn').click(function(){
    Oahu.connect.logout('Facebook');
  })

  // $('.topbar').scrollSpy();
  
  $('#website_connect_btn').live('click',function(){
    $.post('./?/session',user_account,function(response){
      if (response.oahu_id) {
        $('#website_name span').html(response.name)
        $('#website_user_id span').html(response.id)
        $('#website_oahu_id span').html(response.oahu_id)
        $('.website_account').show();
        $('#website_disconnect_btn').show();
        $('#website_connect_btn').hide();
      }
    },'json');
  });
  
  $("#website_disconnect_btn").live('click',function(){
    $.ajax({
      type: 'DELETE',
      url: './?/session',
      success: function(response){
        $('.website_account').hide();
        $('#website_disconnect_btn').hide();
        $('#website_connect_btn').show();
      },
      dataType: 'json'
    });
  });
  
  $("#website_register_btn").live('click', function() {
    $("#user_form").modal({
	      backdrop:'static',
	      closeOnEscape:true
	    }).modal("show");
  });
  
  $('.oahu_share:not(.disabled)').live('click',function(e) {
    e.preventDefault();
    var link = $(this);
    Oahu.activity.share('Facebook',{
      method: 'feed',
      link: link.data('oahu-link'),
      name: link.data('oahu-name'),
      caption: link.data('oahu-caption'),
      description: link.data('oahu-description')
    }, function(message,data){
      console.log('share',message,data)
    });
  
  
  
    // Oahu.activity.share(link.data(id),function(message,data){
    //   
    // });
  })
});
