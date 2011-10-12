<?php global $config; ?>
<?php global $current_user; ?>
<?php global $oahu; ?>
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
    <script src="<?php echo $config['oahu_js_url'] ?>"></script>
    <script>
    var OahuConfig = <?php echo json_encode(array(
      "environment" => $config['oahu_env'],
      "appId"   => $config['consumer_id']
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
      <div class='hero-unit'>
        <div class="website_account" style="<?php if (!$current_user): ?>display: none;<?php endif ?>">
        <h3 id="website_oahu_id">
          User OahuID: 
          <span><?php echo $current_user ? $current_user->oahu_id : "-" ?></span>
        </h3>
        <h3 id="website_user_id">
          User ID: 
          <span><?php echo $current_user ? $current_user->id : "-" ?></span>
        </h3>
        <h4 id="website_name">
          Website User Name : 
          <span><?php echo $current_user ? $current_user->name : "-" ?></span>
        </h4>
        </div>
        <button class='btn secondary disabled' id="website_connect_btn" style="<?php if ($current_user): ?>display: none;<?php endif ?>">Authenticate with Oahu</button>
        <button class='btn secondary' id="website_disconnect_btn" style="<?php if (!$current_user): ?>display: none;<?php endif ?>">Disconnect from Site</button>
        <?php if ($current_user && !$current_user->email) : ?>
        <button class='btn primary' id="website_register_btn">Register Account</button>
        <?php endif ?>
        
        <div id="" class="">
        <form action="/?/user" method="post">
          <input type="text" name="name" value="" id="website_user_name" />
          <input type="text" name="email" value="" id="website_user_email" />
          <input type="sumbit" name="update" value="update" />
        </form>
      </div>
      </div>
      <div id="main"><?php echo $content ?></div>
      <div id="footer"></div>
    </div>
    <?php if ($oahu->connection->debug): ?>
    <div id="debug_bar">
      <div style="float:right">
        <form action="<?php echo url_for("/flush_cache"); ?>" method="post">
          <input type="submit" value="Flush Cache" />
          <input type="hidden" name="redirect_to" value="<?php echo url_for("/") ?>" />
        </form>
      </div>
      <div style="height: 40px; overflow:auto;">
      <?php foreach ($oahu->connection->debug as $k=>$v): ?>
      <?php echo $k ?>: <?php 
        if (is_array($v)) { 
          echo implode(", ", $v);  
        } else { 
          echo $v; 
        } 
      ?>
      &nbsp;|&nbsp;
      <?php endforeach; ?>
      </div>
    </div>
    <?php endif; ?>
  </body>
  
</html>