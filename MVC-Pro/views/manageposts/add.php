<?php include('views/elements/admin_header.php');?>
<div class="container">
  	<div class="page-header">
        <h1><?php echo empty($title) ? 'Add' : 'Edit'; ?> Post</h1>
    </div>
</div>
<?php if($message): ?>
    <div>
        <?php echo $message; ?>
    </div>
<?php endif; ?>
<div class="container body">
    <div class="row">
        <div class="span8">
            <!-- Add Post Form -->
            <form id="addpostform" action="<?php // DEBUG: echo BASE_URL; ?>/index.php/manageposts/<?php echo $task; ?>" class="form-horizontal form-centered" method="post" onsubmit="editor.post()">
                <label>Title</label>
                <input type="text" class="span6 form-control" name="post_title" value="<?php echo $title; ?>">
                <label>Content</label>
                <textarea id="tinyeditor" style="width:556px;height: 200px" name="post_content" ><?php echo $content; ?></textarea>
                <label>Date</label>
                <input type="text" class="span6 form-control" name="post_date" value="<?php echo $date; ?>">
                <label>Category ID</label>
                <input type="number" min="1" class="span6 form-control" name="post_categoryID" value="<?php echo $categoryID; ?>">
                 <br/>
                <input type="hidden" name="pID" value="<?php echo $pID; ?>"/>
                <button id="submit" type="submit" class="btn btn-default" >Submit</button>
            </form>
            <!-- End form -->
        </div>
    </div><!-- End row -->
</div>

<?php include('views/elements/admin_footer.php'); ?>

