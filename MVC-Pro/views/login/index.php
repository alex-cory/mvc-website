<?php include('views/elements/header.php');?>
<div class="container">
	<div class="page-header">
		<h1>Login</h1>
	</div>
</div>
</header><!-- from header.php -->
<!-- <div class="body"> -->
    <div class="container body">
		<div class="row">
	    	<div class="span8 fix-it">
				<!-- Login Form -->
				<form action="<?php echo BASE_URL; ?>/index.php/login/do_login" method="post" onsubmit="editor.post()" class="form-horizontal" role="form">
				  <div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
				    <div class="col-sm-10">
				      <input name="user_email" value="<?php echo $email; ?>" type="email" class="form-control" id="inputEmail3" placeholder="Email">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
				    <div class="col-sm-10">
				      <input name="user_password" value="<?php echo $password; ?>" type="password" class="form-control" id="inputPassword3" placeholder="Password">
				    </div>
				  </div>
				  <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <div class="checkbox">
				        <label>
				          <input type="checkbox"> Remember me
				        </label>
				      </div>
				    </div>
				  </div>
				  <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
					  <input type="hidden" name="uID" value="<?php echo $uID; ?>"/>
				      <button id="submit" type="submit" class="btn btn-default">Sign in</button>
				    </div>
				  </div>
				</form>
				<!-- End form -->
			</div>
	    </div>
	    <!-- End row -->
	</div>
<!-- </div> -->
<?php include('views/elements/footer.php'); ?>

