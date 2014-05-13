<?php include('views/elements/header.php');?>
<div class="container">
  	<div class="page-header">
        <h1> Manage Users  </h1>
    </div>
</div>
</header><!-- from header.php -->
<div class="container body">
    <div class="row">
        <div class="span8">
        <?php if($message): ?>
            <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">×</button>
              	<?php echo $message; ?>
            </div>
        <?php endif; ?>
        <?php foreach($users as $user): ?>
            <div class="blog-post">
                <h2 class="news blog-p-color"><?php echo $user['first_name']. ' '.$user['last_name']; ?></h2>
                <ul class="nav nav-pills pill-cool">
                    <?php if($user['user_type']!=='1'): ?>
                        <li>
                            <a class='btn btn-danger' href="<?php echo BASE_URL ?>/index.php/manageusers/delete/<?php echo $user['uID'] ?>">Delete</a>
                        </li>
                    <?php endif; ?>
                    <?php if($user['active']!=='1'): ?>
                        <li>
                            <a class='btn btn-primary' href="<?php echo BASE_URL ?>/index.php/manageusers/approve/<?php echo $user['uID'] ?>">Approve</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        <?php endforeach; ?>
        </div>
    </div>
</div>
<?php include('views/elements/footer.php');?>