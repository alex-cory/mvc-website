<?php include('views/elements/header.php'); # HEADER

# BODY
// If we only have 1 post

	// Pulling out all the variables from the $post array so we can access them easily
	extract($post); // $post: found in post model. check getPost() ?>

	<div class="container page-header">
		<h1><?php echo $title; ?></h1>
		<h4>Posted: <?php echo $date; ?></h4>
	</div>

	<div class="container body">
		<div class="blog-post">
			<!-- Main Content -->
			<h2 class="news"><?php echo $titls ?></h2>
			<p class="blog-p"><?php echo $content; ?></p>
		</div>
		<div class="page-header">
			<h4>Comments</h4>
		</div>

		<?php // Login or Register to post a comment ?>
		<?php if (!$u->isRegistered() && !$u->isAdmin()): ?>
			<h4><a href="<?php echo BASE_URL; ?>/index.php/login" class="primary">Login</a> or <a href="<?php echo BASE_URL; ?>/index.php/register">Register</a> to post comment!</h4>
		<?php endif; ?>

		<?php // Displaying comments ?>
		<?php foreach ($comments as $comment): ?>
			<?php if ($u->isRegistered()): ?>
				<div class="sweet">
					<p><?php echo $comment['commentText']; ?></p>
					<p><?php // echo $comment['commentID']; ?></p>
					<?php if ($u->isAdmin()): ?>
					<form method="post">
						<input type="hidden" name="commentID" value="<?php echo $comment['commentID']; ?>" />
						<input class="comment-delete btn btn-danger" type="submit" name="action" value="Delete" />
					</form>
					<?php endif; ?>
				</div>
			<?php endif; ?>
		<?php endforeach; ?>

		<?php // Adding comments ?>
		<?php if ($u->isRegistered()): ?>
			<div class="commentage">
				<form method="post">
					<input type="hidden" name="postID" value="<?php echo $pID; ?>" />
					<input type="hidden" name="uID" value="<?php echo $u->uID; ?>" />
					<label for="comment">Comment</label>
					<textarea class="form-control" rows="3" id="comment" name="commentText"></textarea>
					<input class="btn btn-success" type="submit" name="action" value="Add Comment">
				</form>
			</div>
		<?php endif; ?>

	</div><!-- End container -->

<?php
# FOOTER
include('views/elements/footer.php'); ?>