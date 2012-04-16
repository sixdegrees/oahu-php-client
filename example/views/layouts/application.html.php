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

    <script src="public/js/bootstrap.js" type="text/javascript" charset="utf-8"></script>

    <script src="//<?php echo $config['host'] ?>/assets/oahu.js"></script>
    <script>
    var OahuConfig = <?php echo json_encode(array(
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
        <?php if ($current_user): ?>
        <h2>Connected on Server as <?php echo $current_user->name; ?></h2>
        <br/>
        <a href="#" id="website_disconnect_btn" class="btn primary">Destroy User Session</a>
        <?php else: ?>
        <a href="#" id="website_connect_btn" class="btn primary">Create User Session</a>          
        <?php endif ?>
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