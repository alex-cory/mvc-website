<?php include('views/elements/admin_header.php');?>
<div class="container">
  <div class="page-header">
       <h1><?php echo empty($title) ? 'Add' : 'Edit'; ?> Post</h1>
   </div>
</div>
<?php if($message): ?>
    <div>
        <button type="button" class="close" data-dismiss="alert">×</button>
        <?php echo $message; ?>
    </div>
<?php endif; ?>
<div class="container body">
   <div class="row">
       <div class="span8">
          <!-- Add Post Form -->
          <form action="<?php // DEBUG: echo BASE_URL; ?>/index.php/manageposts/<?php echo $task; ?>" class="form-horizontal form-centered" method="post" onsubmit="editor.post()">
                <label>Title</label>
                <input type="text" class="span4 form-control" name="post_title" value="<?php echo $title; ?>">
                <label>Content</label>
                <textarea id="tinyeditor" class="form-control" row="3" name="post_content" ><?php echo $content; ?></textarea>
                <label>Date</label>
                <input type="text" class="span4 form-control" name="post_date" value="<?php echo $date; ?>">
                <label>Category ID</label>
                <input type="number" min="1" class="span4 form-control" name="post_categoryID" value="<?php echo $categoryID; ?>">
                        <?php //d($category); ?>
                    <?php foreach($categories as $key => $value): ?>
                        <?php // d($key); ?>
                        <? if($category == $key): ?>
                        <?php //d($category); ?>
                        <?php // d($key); ?>
                            <option selected value ="<?php echo $key; ?>"><?php echo $value; ?></option>
                        <?php else: ?>
                        <option value ="<?php echo $key; ?>"><?php echo $value; ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <select name="category" class='input-sm' id="category">
               </select>
                <br/>
               <input type="hidden" name="pID" value="<?php echo $pID; ?>"/>
               <button id="submit" type="submit" class="btn btn-default" >Submit</button>
           </form>
           <!-- End form -->
       </div>
   </div><!-- End row -->
</div>

<?php include('views/elements/admin_footer.php'); ?>