
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>MVC Pro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="<?php echo BASE_URL?>/views/css/bootstrap.min.css" rel="stylesheet">
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>
    <link href="<?php echo BASE_URL?>/views/css/bootstrap-responsive.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo BASE_URL?>/application/plugins/tinyeditor/tinyeditor.css">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png">
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="<?php echo BASE_URL?>/index.php/">MVC Pro</a>
          <div class="nav-collapse collapse pull">

            <!-- Set Section -->
            <?php $section = trim($_SERVER['PATH_INFO'], '/');?>

            <!-- Nav Bar -->
            <ul class="nav pull-right">
              <li class="home <?php echo ($section == '') ? 'active' : ''; ?>"><a href="<?php echo BASE_URL?>/index.php">Home</a></li>
              <li class="blog <?php echo ($section == 'blog') ? 'active' : ''; ?>"><a href="<?php echo BASE_URL?>/index.php/blog">Blog</a></li>
              <li class="login <?php echo ($section == 'login') ? 'active' : ''; ?>"><a href="<?php echo BASE_URL?>/index.php/login">Login</a></li>
              <li class="addpost <?php echo ($section == 'addpost') ? 'active' : ''; ?>"><a href="<?php echo BASE_URL?>/index.php/addpost/">Add Post</a></li>
              <li class="member <?php echo ($section == 'member') ? 'active' : ''; ?>"><a href="<?php echo BASE_URL?>/index.php/member/">Member</a></li>
              <li class="register <?php echo ($section == 'register') ? 'active' : ''; ?>"><a href="<?php echo BASE_URL?>/index.php/register/">Register</a></li>
            </ul>

          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>