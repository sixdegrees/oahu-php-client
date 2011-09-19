<?php global $config; ?>
<?php global $current_user; ?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link rel="stylesheet" href="public/css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="public/css/style.css" type="text/css" media="screen" title="no title" charset="utf-8" />
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="public/js/jquery.js"><\/script>')</script>

    <script src="public/js/bootstrap-alerts.js" type="text/javascript" charset="utf-8"></script>
    <script src="public/js/bootstrap-dropdown.js" type="text/javascript" charset="utf-8"></script>
    <script src="public/js/bootstrap-twipsy.js" type="text/javascript" charset="utf-8"></script>
    <script src="public/js/bootstrap-popover.js" type="text/javascript" charset="utf-8"></script>
    <script src="public/js/bootstrap-scrollspy.js" type="text/javascript" charset="utf-8"></script>
    <script src="public/js/bootstrap-tabs.js" type="text/javascript" charset="utf-8"></script>

    <script src="public/js/bootstrap-modal.js" type="text/javascript" charset="utf-8"></script>
    <script src="<?= $config['oahu_js_url'] ?>"></script>
    <script>
    var OahuConfig = <?= json_encode(array(
      "connect_host"  => $config['connect_host'],
      "consumer_id"   => $config['consumer_id']
    )); ?>
</script>
    <script src="public/js/app.js"></script>
  </head>
  <body>
    <div class="topbar" id="topbar">
      <div class="fill">
        <div class="container">
          <a class="brand">Oahu.js</a>
          <ul class='nav secondary-nav'>
            <li class='logged_in dropdown' data-dropdown='dropdown'>
              <a href='#' class='dropdown-toggle'>
                <span id='user_name'></span>
                <span id="user_picture"></span>
              </a>
              <ul class='dropdown-menu'>
                <li class='login_status'>
                  <a href="#" class='logout_btn'>Logout</a>
                </li>
              </ul>
            </li>
            <li class='logged_out login_status'>
              <a href="#" class='login_btn'>Login</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="container">
      <div id="user_form" class="modal hide fade">
        <form action="/?/user" method="post">
          <input type="text" name="name" value="" id="website_user_name" />
          <input type="text" name="email" value="" id="website_user_email" />
          <input type="sumbit" name="update" value="update" />
        </form>
      </div>
      <div class='hero-unit'>
        <div class="website_account" style="<? if (!$current_user): ?>display: none;<? endif ?>">
        <h3 id="website_oahu_id">
          User OahuID: 
          <span><?= $current_user ? $current_user->oahu_id : "-" ?></span>
        </h3>
        <h3 id="website_user_id">
          User ID: 
          <span><?= $current_user ? $current_user->id : "-" ?></span>
        </h3>
        <h4 id="website_name">
          Website User Name : 
          <span><?= $current_user ? $current_user->name : "-" ?></span>
        </h4>
        </div>
        <button class='btn secondary disabled' id="website_connect_btn" style="<? if ($current_user): ?>display: none;<? endif ?>">Authenticate with Oahu</button>
        <button class='btn secondary' id="website_disconnect_btn" style="<? if (!$current_user): ?>display: none;<? endif ?>">Disconnect from Site</button>
        <? if ($current_user && !$current_user->email): ?>
        <button class='btn primary' id="website_register_btn">Register Account</button>
        <? endif ?>
      </div>
      <div id="main"><?= $content ?></div>
      <div id="footer">
        <? _debug($current_user); ?>
      </div>
    </div>
  </body>
  
</html>