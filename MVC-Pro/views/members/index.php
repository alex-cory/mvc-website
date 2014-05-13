<?php include('views/elements/header.php');// If we have more than 1 user ?>
<div class="container">
	<div class="page-header">
		<h1>List of Users</h1>
	</div>
</div>
</header><!-- from header.php -->
<div class="container body">
	<div class="row">
		<?php // Loop through the users and spit out the right ones ?>
		<?php foreach ($users as $u) { ?>
			<div class="blog-post">
		    	<h2 class="news"><a href="<?php echo BASE_URL; ?>/index.php/members/user/<?php echo $u['uID'];?>"
		    		   title="<?php echo $u['first_name'];?>"><?php echo $u['first_name'] . ' ' . $u['last_name']; ?></a></h2 class="news">
				<p class="blog-p-clr"><strong>UserID:</strong> <?php echo $u['uID']; ?></p>
				<p class="pubdate"><strong>Email:</strong> <?php echo $u['email']; ?></p>
			</div>
		<?php } ?>
	</div><!-- End container -->
</div>
<?php include('views/elements/footer.php'); ?>