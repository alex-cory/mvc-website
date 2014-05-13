<?php include('views/elements/header.php');?>
<div class="container">
    <div class="page-header">
        <h1>Home</h1>
        <ul class="nav nav-pills">
            <li>
                <a href="<?php echo BASE_URL; ?>/index.php">Main</a>
            </li>
            <li>
                <a href="<?php echo BASE_URL; ?>/index.php/home/usatoday">USA Today</a>
            </li>
            <li>
                <a class="load-it" href="<?php echo BASE_URL; ?>/index.php/weather/getresults">Weather</a>
            </li>
            <li class="active">
                <a class="load-it" href="<?php echo BASE_URL; ?>/index.php/news/">The Onion</a>
            </li>
        </ul>
    </div>
</div>
</header><!-- from header.php -->
<div class="container body">
    <!-- Content -->
    <div class="row">
        <?php foreach ($items as $item): // $items found in: models/rssdisplay.php ?>
            <div class="blog-post">
                <br>
                <a href="<?php echo $item['link']; ?>" target="rss"><h2 class="news"><?php echo $item['title']; ?></h2></a>
                <img src="<?php echo $channelInfo->image->url; ?>" alt="">
                <div class="news-image"><?php echo $item['description']; ?></div>
                <div class="pubdate"><?php echo $item['pubDate']; ?></div>
            </div>
        <?php endforeach; ?>
    </div>
    <!-- /Content End -->
</div>
<?php include('views/elements/footer.php');?>