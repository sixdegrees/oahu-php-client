<? global $config ?>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link rel="stylesheet" href="./public/css/style.css" type="text/css" media="screen" charset="utf-8" />
    <script src="./public/js/jquery.js"></script>
    <script src="./public/js/sproutcore-2.0.beta.3.js"></script>
    <script src="<?= $config['oahu_js_url'] ?>"></script>
    <script src="./public/js/app.js"></script>
    <script>
      var App;
      $(function() {
        var connectHost = "<?= $config['connect_host'] ?>";
        var appId = "<?= $config['consumer_id'] ?>";
        console.log("ConnectHost: ", connectHost);
        App = AppInit(connectHost, appId);
        App.oahuInit();
      });
    </script>
  </head>
  <body>
    <div id="header">
      <script type="text/x-handlebars">
      {{#view App.userAccountView}}
      {{#if userAccount.fullname }}
      <div id="user_login">
        <a href="#" class="login_btn" onclick="App.oahu.show('connect')">Connection Status</a>
      </div>
      <div id="account_box">
        <div id="user_account">
          <span class="account_name">{{userAccount.fullname}}</span>
          (<a href="#" class="logout_btn" onclick="App.oahu.connect.logout();">logout</a>)
          <img {{bindAttr src="userAccount.picture"}} class="account_picture" />
        </div>
      </div>
      {{else}}
        {{#if userAccount.offline}}
        <a href="#" onclick="App.oahu.show('connect');">Login with Oahu Connect</a>
        {{else}}
        <span>Connecting to Oahu...</span>
        {{/if}}
      {{/if}}
      {{/view}}
      </script>
    </div>

    <div id="main"><?= $content ?></div>
    <div id="footer"></div>
  </body>
  
</html>