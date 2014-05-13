<?php include('views/elements/header.php');?>
<div class="container">
    <div class="page-header">
        <h1>Home</h1>
        <ul class="nav nav-pills">
            <li class="active">
                <a href="<?php echo BASE_URL; ?>/index.php">Main</a>
            </li>
            <li>
                <a href="<?php echo BASE_URL; ?>/index.php/home/usatoday">USA Today</a>
            </li>
            <li>
                <a class="load-it" href="<?php echo BASE_URL; ?>/index.php/weather/getresults">Weather</a>
            </li>
            <li>
                <a class="load-it" href="<?php echo BASE_URL; ?>/index.php/news/">The Onion</a>
            </li>
        </ul>
    </div>
</div>
</header><!-- from header.php -->
<div class="container body">
    <!-- Content -->
    <div class="row">
        <?php if ($u->isRegistered()): ?>
            <div class="main-pad">
                <h2>It's good to see you again <span class="blog-p-color"><?php echo $u->first_name . ' ' . $u->last_name; ?></span>!</h2>
                <p>Be sure to check out the USA Today section for the latest news for them.  And while you're at it why don't you check out The Onion.</p>
                <p>Heck... while you're at it, just go ahead and check your weather conditions for the day.  Or check mine, because that's the default anyway so you're going to see it no matter what. :p lol</p>
            </div>
        <?php else: ?>
            <div class="main-pad">
                <!--==== About Intro ====-->
                <div class="col-md-8 col-md-offset-2">
                    <h1 class="brand-heading">Welcome</h1>
                    <p class="intro-text pull-middle">To Alex Cory's Website</p>
                </div>
                <!--==== About Content ====-->
                <div class="col-lg-8 intro-text-width">
                    <h2>About</h2>
                    <p>Alex is one of those people who just, plane and simple, never gives up.  He's an artist, but at the same time, he likes to make things happen.  The intersection of the two is where the <text class="mphsz-green">magic happens.</text></p>
                    <p>He spends most of his time learning new programming languages and tools.  When he's not in the grind, he likes to spend his time designing things, thinking of new ways to make money to help others, or exploring nature.</p>
                    <p class="wider">"<text class="mphsz-green">Sometimes, ordinary people do extraordinary things, simply because they believe they can and refuse to give up.</text>" -Alex Cory</p>
                </div>
                <img class="profimg img-circle center-block" src="http://goo.gl/Us7uqb">
            </div>
        <?php endif; ?>
    </div>
    <!-- /Content End -->
</div>
<script>
    // Switch to Weather Pill on Home Page
    // $(document).ready(function() {
    //     $(".load-it").click(function(a) {
    //         a.preventDefault();
    //         var npa = $('.nav-pills li.active');
    //         var np = $('.nav-pills li');
    //         var dv = $('.change-area-weather');
    //         var el = $(this);
    //         $.ajax({
    //             url: el.attr('href'),
    //             type: "POST",
    //             success: function(data){
    //                 dv.parent().append(data);
    //                 dv.remove();
    //             }
    //         });
    //         np.addClass('active');
    //         npa.removeClass('active');
    //         // el.removeClass('load-it');
    //         if ($('ul.nav-pills li:first-child a').hasClass('load-it')){
    //             $('ul.nav-pills li:first-child a').removeClass('load-it');
    //             $('ul.nav-pills li:nth-child(2) a').addClass('load-it');
    //         }else{
    //             $('ul.nav-pills li:nth-child(2) a').removeClass('load-it');
    //             $('ul.nav-pills li:first-child a').addClass('load-it');
    //         }
    //     });
    // });
</script>
<?php include('views/elements/footer.php');?>
