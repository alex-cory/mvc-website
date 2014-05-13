<?php include('views/elements/admin_header.php');?>
<div class="container">
  	<div class="page-header">
        <h1>Manage Posts</h1>
        <ul class="nav nav-pills">
            <li>
                <a class="btn btn-success" href="<?php echo BASE_URL ?>/index.php/manageposts/add">New Post</a>
            </li>

            <li class="active">
                <a href="<?php echo BASE_URL ?>/index.php/manageposts/">Manage Posts</a>
            </li>
            <li>
                <a class="load-it" href="<?php echo BASE_URL; ?>/index.php/categories/">Categories</a>
            </li>
        </ul>
    </div>
</div>
</header><!-- from header.php -->
<!-- <div class="body"> -->
    <div class="container body">
        <?php // Green Success Message  ||  Red if Not Success
       // $message = $_SESSION['message']; ?>
        <?php // if (! empty($message)):   // if the message is successful ?>
            <!-- <div class="l-r-lil-marg alert <?php // echo $message; ?>"> -->
                <!-- <button type="button" class="close" data-dismiss="alert">×</button> -->
                <!-- <p class="alertage">Looks like things were successful! :)</p> -->
            <!-- </div> -->
        <?php// else: ?>
            <!-- <div class="l-r-lil-marg alert alert-danger"> -->
                <!-- <button type="button" class="close" data-dismiss="alert">×</button> -->
                <!-- <p class="alertage">Sorry! Something went wrong :(</p> -->
            <!-- </div> -->
        <?php // endif; ?>
        <div class="row">
            <div class="span8">
                <?php foreach ($posts as $p): // $posts comes from models/post.php ?>
                  <div class="blog-post">
                    <!-- <div class="post"> -->
                      <!-- Content Title -->
                      <h2 class="news"><a class="change-area" href="<?php echo BASE_URL; ?>/index.php/blog/post/<?php echo $p['pID'];?>"
                       title="<?php echo $p['title'];?>"><?php echo $p['title'];?></a></h2>
                      <!-- Main Content -->
                      <p class="blog-p-clr wrapword"><?php echo $p['content'];?></p>
                      <!-- <p class="cid"><strong>Category ID: </strong><?php echo $p['categoryID']; ?></p> -->
                      <p class="pubdate"><strong>Date: </strong> <?php echo $p['date']; ?></p>
                      <br style="margin-bottom:16px"/>
                      <!-- Modification Buttons -->
                      <ul class="nav nav-pills pill-cool">
                          <li>
                              <a class="btn btn-success" href="<?php echo BASE_URL; ?>/index.php/manageposts/edit/<?php echo $p['pID']; ?>">Edit</a>
                          </li>

                          <li class="">
                              <a class="btn btn-danger" href="<?php echo BASE_URL; ?>/index.php/manageposts/delete/<?php echo $p['pID']; ?>">Delete</a>
                          </li>
                          <li>
                              <a class="btn btn-default" href="<?php echo BASE_URL; ?>/index.php/blog/post/<?php echo $p['pID'];?>" title="<?php echo $p['title'];?>">View Post</a>
                          </li>
                      </ul>
                   <!-- </div> -->
                </div>
                <?php endforeach; ?>
            </div>
        </div><!-- End row -->
    </div>
<!-- </div> -->
<script>
    // $(document).ready(function() {
    //   $(".post-loader").click(function(event) {
    //     event.preventDefault();
    //     var el = $(this);
    //     $.ajax({
    //       url: el.attr('href'),
    //       type: "POST",
    //       success: function(data){
    //         el.parent().append(data);
    //         el.remove();
    //       }
    //     });
    //   });
    // });

    // $('a.btn.post-loader').click(function(event) {
    //      event.preventDefault();
    //      $.ajax({
    //         url: $(this).attr('href')
    //         success: function(response) {
    //             el.parent().append(data);
    //             el.remove();
    //         }
    //      })
    //      return false; //for good measure
    // });
    // $('a.post-loader').click(function(event) {
    //    event.preventDefault();

    //    var url = $(this).attr('href');
    //    $.get(url, function(data) {
    //      alert(data);
    //     });

    //  }'
    // $(document).ready(function(){
    //   $("a.post-loader").click(function(a){
    //     a.preventDefault();

    //     var href = $(this).attr('href'));
    //       $.ajax({
    //           url: href,
    //           success: function(d){
    //               $(".change-area").replaceWith();

    //           }

    //       });


    //   });
    // })
    // $(function(){

    // });
      // // View Blog Content
      // $("a.post-loader").on("click", function(e){
      //   e.preventDefault();
      //   var inner = $(this).text(htmlstring);
      // });
      // $(document).ready(function() {
      //   $(".post-loader").click(function(event) {
      //     event.preventDefault();
      //     var el = $(this);
      //     $.ajax({
      //       url: el.attr('href'),
      //       type: "POST",
      //       success: function(data){
      //         el.parent().append(data);
      //         el.remove();
      //       }
      //     });
      //   });
      // });
</script>
<?php include('views/elements/admin_footer.php'); ?>

