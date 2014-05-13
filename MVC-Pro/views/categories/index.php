<?php include('views/elements/header.php');?>
<div class="container">
  	<div class="page-header">
		<h1>Manage Categories</h1>
        <ul class="nav nav-pills">
            <li>
                <a class="btn btn-success" href="<?php echo BASE_URL ?>/index.php/manageposts/add">New Post</a>
            </li>

            <li>
                <a href="<?php echo BASE_URL ?>/index.php/manageposts/">Manage Posts</a>
            </li>
            <li class="active">
                <a class="load-it" href="<?php echo BASE_URL; ?>/index.php/categories/">Categories</a>
            </li>
        </ul>
  	</div>
</div>
</header><!-- from header.php -->
<div class="container top body">
	<?php if($message): ?>
        <div class="alert alert-success">
        <button type="button" class="close" style="margin-top: 1em;" data-dismiss="alert">×</button>
          	<?php echo $message?>
        </div>
    <?php endif; ?>
    <?php foreach($categories as $key=>$value): ?>
		<h3><?php echo $value; ?></h3>
		<a class='btn btn-warning' href="/index.php/categories/edit/<?php echo $key; ?>">Edit Category</a><hr>
	<?php endforeach; ?>
	<form class="btm-2-em" action="<?php echo BASE_URL ?>/index.php/categories/add" method="POST">
  	 	<label for="newCategory">New Category</label>
  		<input type="text" name="newCategory" class="input-sm" id="newCategory">
  		<input type="submit" class='btn btn-primary' value="Add">
	</form>
</div>
<?php include('views/elements/footer.php');?>