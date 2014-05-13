<?php include('views/elements/header.php');?>
<?php
  if(isset($_SESSION['message'])){
    $message = $_SESSION['message'];
    unset($_SESSION['message']);
  }
?>
<div class="container">
  	<div class="page-header">
     <h1><?php echo $user->first_name; ?>'s Settings</h1>
    </div>
</div>
<div class="container body">
    <?php if(!empty($message)):?>
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">×</button>
          	<?php echo $message?>
        </div>
    <?php endif;?>
<!--     <div class="row">
        <div class="warn_contain"></div>
        <div class="span8">
            <form class="form-horizontal" action="<?php echo BASE_URL;?>/index.php/members/<?php echo $task?>" method="post" id='profileform' role="form">
                <label for='first_name'>First Name</label>

                <input type="text" required class="register"  name="first_name" value="<?php echo $user->first_name; ?>">

                <label for="last_name">Last Name</label>
                <input required  name="last_name" id="last_name" class="register"  type="text" value = "<?php echo $user->last_name;  ?>">
                <label for="email">Email</label>
                <input required name="email" id="email" class="register"  type="text" value = "<?php echo $user->email;  ?>">
                <label for="profile_password">Password</label>
                <input  name="profile_password" id="profile_password" class="register" value = ""  type="password">
                <label for="profile_confirmpassword"> Confirm Password</label>
                <input  name="profile_confirmpassword" id="profile_confirmpassword" class="register" value = ""  type="password">
          			<br/>
                <input type="hidden" name="uID" value="<?php echo $user->uID ?>"/>
                <button id="profilesubmit" type="submit" class="btn btn-primary" >Update</button>
            </form>
        </div>
    </div>
-->
    <div class="row">
      <div class="span8 fix-it">
        <!-- Profile Form -->
        <form class="form-horizontal" action="<?php echo BASE_URL;?>/index.php/members/<?php echo $task?>" method="post" id='profileform' role="form">
          <div class="form-group">
            <label for="first" class="col-sm-2 control-label">First Name</label>
            <div class="col-sm-10">
              <input name="first_name" required value="<?php echo $user->first_name; ?>" type="text" class="form-control" id="first" placeholder="Email">
            </div>
          </div>
          <div class="form-group">
            <label for="last" class="col-sm-2 control-label">Last Name</label>
            <div class="col-sm-10">
              <input name="last_name" required value="<?php echo $user->last_name; ?>" type="text" class="register form-control" id="last" placeholder="Last Name">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10">
              <input name="user_email" value="<?php echo $user->email; ?>" type="email" class="form-control" id="inputEmail3" placeholder="Email">
              <?php // d($user); ?>
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
            <div class="col-sm-10">
              <input name="user_password" value="" type="password" class="form-control" id="inputPassword3" placeholder="Password">
            </div>
          </div>
          <div class="form-group">
            <label for="profile_confirmpassword" class="col-sm-2 control-label">Confirm <br> Password</label>
            <div class="col-sm-10">
              <input name="profile_confirmpassword" value="" type="password" class="form-control" id="profile_confirmpassword" placeholder="Confirm Password">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <input type="hidden" name="uID" value="<?php echo $user->uID ?>"/>
              <button id="profilesubmit" type="submit" class="btn btn-default">Update</button>
            </div>
          </div>
        </form>
        <!-- End form -->
      </div>
    </div>
    <!-- End row -->
</div>
<?php include('views/elements/footer.php');?>