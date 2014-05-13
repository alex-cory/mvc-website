<?php include('views/elements/admin_header.php');?>

<div class="container">

	<div class="page-header">
    <h1> the Manage Post View </h1>
  </div>

  <?php // Green Success Message  ||  Red if Not Success
  if ($message) {
    $class = 'alert-success';
  } elseif ($error) {
    $class = 'alert-danger';
  }

  if (! empty($class)):   // if the error message is set ?>

  <div class="alert <?php echo $class; ?>">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <?php echo !empty($message) ? $message : $error; ?>
  </div>

<?php endif; ?>

<div class="row">
  <div class="span8">
    <a href="<?php echo BASE_URL ?>/index.php/manageposts/add" class="btn btn-primary">New Post</a>

    <?php foreach ($posts as $p): // $posts comes from models/post.php ?>
      <div class="blog-post">
        <div class="post">
          <!-- Content Title -->
          <h4><a href="<?php echo BASE_URL; ?>/index.php/blog/post/<?php echo $p['pID'];?>"
           title="<?php echo $p['title'];?>"><?php echo $p['title'];?></a></h4>
           <a href="<?php echo BASE_URL; ?>/index.php/ajax/get_post_contents/?pID=<?php echo $p['pID']; ?>" class="btn post-loader">View Entire Post</a>
         </div>
         <!-- Main Content -->
         <!-- <p><?php echo $p['content'];?></p> -->

         <!-- <p class="cid"><strong>Category ID: </strong><?php echo $p['categoryID']; ?></p> -->

         <p><strong>Date: </strong> <?php echo $p['date']; ?></p>

         <br style="margin-bottom:16px"/>
       </div>
       <button><a href="<?php echo BASE_URL; ?>/index.php/manageposts/edit/<?php echo $p['pID']; ?>">Edit</a></button>
       <button><a href="<?php echo BASE_URL; ?>/index.php/post/delete/<?php echo $p['pID']; ?>">Delete</a></button>
       <form method="post">
        <input type="hidden" name="pID" value="<?php echo $p['pID']; ?>" />
        <input type="submit" name="action" value="delete" />
      </form>
    <?php endforeach; ?>


  </div>
</div><!-- End row -->

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
<?php include('views/elements/admin_footer.php'); ?>

