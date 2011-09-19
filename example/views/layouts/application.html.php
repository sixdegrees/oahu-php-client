<?php global $config; ?>
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
    <script src="public/js/bootstrap-modal.js" type="text/javascript" charset="utf-8"></script>
    <script src="public/js/bootstrap-twipsy.js" type="text/javascript" charset="utf-8"></script>
    <script src="public/js/bootstrap-popover.js" type="text/javascript" charset="utf-8"></script>
    <script src="public/js/bootstrap-scrollspy.js" type="text/javascript" charset="utf-8"></script>
    <script src="public/js/bootstrap-tabs.js" type="text/javascript" charset="utf-8"></script>

    <script src="<?= $config['oahu_js_url'] ?>"></script>
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
      <div class='hero-unit'>
        <h3 id="oahu_id">User ID: <?= $_SESSION['oahu_id']; ?></h3>
        <h4 id="website_name">Website Username : <span><?= $_SESSION['website_name']; ?></span></h4>
        <div class='logged_in'>
          <?php if(!$_SESSION['website_name']): ?>
            <button class='btn secondary' id="website_connect_btn">Authenticate with Oahu</button>
          <?php endif; ?>
        </div>
        <?php if($_SESSION['website_name']): ?>
          <button class='btn secondary' id="website_disconnect_btn">Disconnect from Site</button>
        <?php endif; ?>
      </div>
      <div id="main"><?= $content ?></div>
      <div id="footer"></div>
    </div>
  </body>
  
</html>