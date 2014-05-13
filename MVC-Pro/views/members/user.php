<?php include('views/elements/header.php');?>

<div class="container">
	<div class="page-header">
		<h1><?php echo ucwords(strtolower($user['first_name'])).' '.ucwords(strtolower($user['last_name'])); ?></h1>
		<h4><?php echo $user['email'];  ?></h4>
		<em><?php echo ucwords(strtolower($user['first_name']));  ?> has been a happy customer since <?php echo date("F j,Y",strtotime($user['date'])); ?></em>
	</div>
</div>

<?php include('views/elements/footer.php');?>

