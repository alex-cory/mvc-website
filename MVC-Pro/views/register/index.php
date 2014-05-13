<?php include('views/elements/header.php');?>
<div class="container">
  	<div class="page-header">
        <h1> Register</h1>
    </div>
</header><!-- from header.php -->
</div>
<!-- <div class="body"> -->
    <div class="container body">
      <?php if($message){?>
          <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert">×</button>
              <?php echo $message?>
          </div>
      <?php }?>
        <div class="row">
            <div class="warncontain"></div>
                <div class="span8 lil-pad">
                    <!-- <form action="<?php echo BASE_URL;?>/index.php/register/<?php echo $task?>" method="post" id='registerform'>
                        <label for='first_name'>First Name</label>
                        <input type="text" required class="register"  name="first_name" value="<?php echo $first_name; ?>">
                        <label for="last_name">Last Name</label>
                        <input required  name="last_name" id="last_name" class="register"  type="text" value = "<?php echo $last_name;  ?>">
                        <label for="email">Email</label>
                        <input required name="email" id="email" class="register"  type="text" value = "<?php echo $email;  ?>">
                        <label for="password">Password</label>
                        <input required name="password" id="password"  value = "<?php echo $password ?>"  type="password">
                        <label for="confirmpassword"> Confirm Password</label>
                        <input required name="confirmpassword" id="confirmpassword"  value = ""  type="password">
                  			<br/>
                        <input type="hidden" name="uID" value="<?php echo $uID ?>"/>
                        <button id="registersubmit" type="submit" class="btn btn-primary" >Submit</button>

                    </form> -->
                          <form method="POST" action="<?php echo BASE_URL;?>/index.php/register/<?php echo $task?>"
                                role="form" class="form-signin" id='registerform'>
                              <input name="_token" type="hidden" value="6XXFsSuBkPyk8TRNqsQ1DOPsjjEHltWFmY3jNNVC">
                              <!-- <fieldset> -->
                                  <input class="form-control l-half" placeholder="First Name" type="text" required class="register"  name="first_name" value="<?php echo $first_name; ?>">
                                  <input class="form-control r-half" placeholder="Last Name" type="text" required  name="last_name" value="<?php echo $last_name; ?>">
                                  <br>
                                  <input class="form-control middle" placeholder="E-mail" required name="email" id="email"   type="text" value = "<?php echo $email;  ?>">
                                  <br>
                                  <input class="form-control bottom l-half" placeholder="Password" required name="password" id="password"  value = "<?php echo $password ?>"  type="password">
                                  <br>
                                  <input class="form-control bottom r-half" placeholder="Confirm Password" required name="confirmpassword" id="confirmpassword"  value = ""  type="password">
                                  <br>
                                  <input type="hidden" name="uID" value="<?php echo $uID ?>"/>
                                  <input class="btn btn-lg btn-primary btn-block" type="submit" value="Register">
                                  <!-- <p class="text-center" style="margin-top:10px;">OR</p> -->
                                  <!-- <a class="btn btn-lg btn-default btn-block" href="http://bootsnipp.com/login/github"><i class="icon-github"></i> Register with Github</a> -->
                                  <br>
                                  <p class="text-center"><a href="<?php echo BASE_URL; ?>/index.php/login/do_login">Already have an account?</a></p>
                              <!-- </fieldset> -->
                          </form>
                </div>
            </div>
        </div>
    <!-- </div> -->
</div>
<?php include('views/elements/footer.php');?>