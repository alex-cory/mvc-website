<?php include('views/elements/header.php'); ?>
	<div class="container">
		<!-- Page Title -->
		<div class="page-header">
			<h1><?php echo $title; ?></h1>
		</div>
	</div>
	</header>
    <div class="container body">
	    <div class="row">
			<?php foreach ($posts as $p): // $posts comes from models/post.php ?>
		    <?php // d($p); ?>
				<div class="blog-post">
					<div class="post">
						<!-- Content Title -->
				    	<h4>
				    		<a href="<?php echo BASE_URL; ?>blog/post/<?php echo $p['pID'];?>"
				    		   title="<?php echo $p['title'];?>"><?php echo $p['title'];?></a>
				    	</h4>
						<p class="blog-p-clr">
							<a href="<?php echo BASE_URL; ?>/index.php/ajax/get_post_contents/?pID=<?php echo $p['pID']; ?>" class="btn post-loader">View Entire Post</a>
						</p>
					</div>
					<!-- Main Content -->
					<!-- <p><?php echo $p['content'];?></p> -->
					<!-- <p class="cid"><strong>Category ID: </strong><?php echo $p['categoryID']; ?></p> -->
					<div class="pubdate"><strong>Posted On: </strong> <?php echo $p['date']; ?></div>
					<br style="margin-bottom:16px"/>
				</div>
			<?php endforeach; ?>
		</div><!-- End container -->
	</div>
	<script>
	// View Blog Content
	$(document).ready(function() {
		$(".post-loader").click(function(event) {
			event.preventDefault();
			var el = $(this);
			$.ajax({
				url: el.attr('href'),
				type: "POST",
				success: function(data){
					el.parent().append(data);
					el.remove();
				}
			});
		});
	});




	</script>


<?php include('views/elements/footer.php'); ?>