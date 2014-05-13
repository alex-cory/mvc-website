<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>MVC Pro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <!-- Le fav and touch icons -->
    <!-- <link rel="shortcut icon" href="ico/favicon.ico"> -->
    <!-- <link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png"> -->
    <!-- <link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png"> -->
    <!-- <link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png"> -->
    <!-- <link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png"> -->
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>

    <!-- Le scripts -->
    <script type="text/javascript" src="<?php echo BASE_URL; ?>/views/js/jquery.js"></script>

    <!-- Bootstrap Themage -->
    <!-- <link rel="stylesheet" href="//startbootstrap.com/templates/freelancer/css/bootstrap.min.css"> -->
    <!-- <link rel="stylesheet" href="//startbootstrap.com/templates/freelancer/css/freelancer.css"> -->
    <!-- <link href="<?php echo BASE_URL?>/views/css/bootstrap.min.css" rel="stylesheet"> -->
    <!-- <link href="<?php echo BASE_URL?>/views/css/bootstrap-responsive.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="//startbootstrap.com/templates/freelancer/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Montserrat:400,700">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="//startbootstrap.com/templates/grayscale/css/grayscale.css">
    <link href="<?php echo BASE_URL?>/views/css/main.css" rel="stylesheet">
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

  </head>
      <?php $section = trim($_SERVER['PATH_INFO'], '/');?>
      <body id="page-top" data-spy="scroll" data-target=".navbar-custom">
          <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
              <div class="container">
                  <div class="navbar-header page-scroll">
                      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                          <i class="fa fa-bars"></i>
                      </button>
                      <a class="navbar-brand" href="#page-top">
                          <i class="fa fa-play-circle"></i>  <span class="light">Alex</span> Cory
                      </a>
                  </div>
                  <!-- Default Nav Links -->
                  <div class="collapse navbar-collapse navbar-left navbar-main-collapse">
                      <ul class="nav navbar-nav">
                          <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                          <li class="hidden">
                              <a href="#page-top"></a>
                          </li>
                          <li class="home page-scroll">
                              <a href="<?php echo BASE_URL; ?>/index.php">Home</a>
                          </li>
                          <li class="blog page-scroll <?php echo ($section == 'blog') ? 'active' : ''; ?>">
                              <a href="<?php echo BASE_URL?>/index.php/blog">Blog</a>
                          </li>
                          <li class="members page-scroll <?php echo ($section == 'members') ? 'active' : ''; ?>">
                              <a href="<?php echo BASE_URL?>/index.php/members/">Members</a>
                          </li>
                          <?php if (!$u->isRegistered()): ?>
                            <li class="register page-scroll <?php echo ($section == 'register') ? 'active' : ''; ?>">
                                <a href="<?php echo BASE_URL?>/index.php/register/">Register</a>
                            </li>
                          <?php endif; ?>
                      </ul>
                  </div>
                  <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                      <ul class="nav navbar-nav pull-right">
                          <li class="dropdown">
                              <?php // if the user HAS SIGNED IN ?>
                              <?php if ($u->isRegistered()): ?>
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $u->getUserName(); ?><b class="caret"></b></a>
                              <ul class="dropdown-menu">
                                  <li class="logout"><a href="<?php echo BASE_URL?>/index.php/logout">Logout</a></li>
                                  <li class="divider"></li>
                                  <?php // if the user has SINED IN  <AND> they are an ADMIN ?>
                                  <?php if ($u->isAdmin()): ?>
                                      <li class="manageposts"><a href="<?php echo BASE_URL?>/index.php/manageposts/" tabindex="-1">Manage Posts</a></li>
                                      <li class="divider"></li>
                                      <li class="manageposts"><a href="<?php echo BASE_URL?>/index.php/categories/" tabindex="-1">Manage Categories</a></li>
                                      <li class="divider"></li>
                                      <li><a href="<?php echo BASE_URL?>/index.php/manageusers">Manage Users</a>
                                      <li class="divider"></li>
                                  <?php endif; ?>
                                  <li><a href="<?php echo BASE_URL?>/index.php/members/profile">Settings</a></li>
                              <?php // Otherwise, if nobody is signed in, show a Login button ?>
                              <?php else: // if not registered ?>
                                  <!-- The drop down menu -->
                                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Login<b class="caret"></b></a>
                                  <div class="dropdown-menu" style="padding: 15px; padding-bottom: 0px;">
                                      <form action="<?php // DEBUG: echo BASE_URL; ?>/index.php/login/do_login" method="post" onsubmit="editor.post()">
                                          <input placeholder="Username" type="text" class="span6" name="user_email" value="<?php echo $email; ?>">
                                          <input placeholder="*******" type="password" class="span6" name="user_password" value="<?php echo $password; ?>">
                                          <br/>
                                          <input type="hidden" name="uID" value="<?php echo $uID; ?>"/>
                                          <button id="submit" type="submit" class="btn btn-primary btn-block" >Login</button>
                                      </form>
                                  </div>
                              <?php endif; ?>
                              </ul>
                          </li>
                      </ul>
                  </div>
                  <!-- /.navbar-collapse -->
              </div>
              <!-- /.container -->
          </nav>