<?php include('views/elements/header.php');?>
<div class="container">
    <div class="page-header">
	    <h1>Home</h1>
	    <ul class="nav nav-pills">
		    <li>
		        <a href="<?php echo BASE_URL; ?>/index.php">Main</a>
		    </li>
	        <li >
	            <a href="<?php echo BASE_URL; ?>/index.php/home/usatoday">USA Today</a>
	        </li>
	        <li class="active">
	            <a class="load-it" href="<?php echo BASE_URL; ?>/index.php/weather/getresults">Weather</a>
	        </li>
	        <li>
	            <a class="load-it" href="<?php echo BASE_URL; ?>/index.php/news/">The Onion</a>
	        </li>
	    </ul>
	</div>
</div>
</header><!-- from header.php -->
    <!-- Content -->
    <!-- <div class="body"> -->
	    <div class="container c-weather body">
	        <div class="row vertical-center-row">
	            <div class="col-lg-12">
	                <!-- <div class="row "> -->
                	<form class="navbar-form" role="search" action="<?php echo BASE_URL; ?>/index.php/weather/getresults" method="POST" id="weather-form" >
            	        <div class="input-group">
            	            <input placeholder="zip code" class="form-control" type="number" name="zip" value="<?php echo $zip; ?>" style="padding:6px 6px;">
            	            <div class="input-group-btn">
            	                <button class="btn btn-default" value="Search" type="submit"><i class="glyphicon glyphicon-search"></i></button>
            	            </div>
            	        </div>
        	        </form>
	                <!-- </div> -->
	                <div class="weather-wrapper">
	                    <div class="weather">
	                        <h1>Weather for <span class="city primary" style="color: blue;"><?php echo $weather->City; ?></span>, <span style="color: blue;" class="state primary"><?php echo $weather->State; ?></span></h1>
	                        <h2>High of: <span class="high primary" style="color: blue;"><?php echo $weather->ForecastResult->Forecast->Temperatures->DaytimeHigh; ?></span></h2>
	                        <h2>Description: <span class="description primary" style="color: blue;"><?php echo $weather->ForecastResult->Forecast->Desciption; // EFFING MISSPELLED XML NODE!! SCREW YOU ?></span></h2>
	                    </div>
	                </div>
	            </div>
	        </div>
	    <!-- </div> -->
		<!-- /Content End -->
	</div>
<!-- </div> -->

<!-- -------------------------------------------- -->
	<script type="text/javascript">
	$(function(){
	    $(".load-it").click(function(){
	        $.ajax({
	            url: "/index.php/weather/getresults/",
	            success: function(d){
	                $(".change-area").html(d);
	            }
	        });
	    });
	});
	// $(document).ready(function () {
	//     $('form#weather-form').on('submit', function (e) {
	//         e.preventDefault();
	//         $.ajax({
	//             url: 'http://wsf.cdyne.com/WeatherWS/Weather.asmx/GetCityForecastByZIP?zip=' + $('input[name=zip]').val(),
	//             type: "GET",
	//             datatype: 'xml',
	//             success: function (xml) {
	//                 $(xml).find('ForecastResult').each(function () {
	//                     $(this).find("Forecast").each(function () {
	//                         $(this).find("City").each(function () {
	//                             var city = $(this).text();
	//                             var c = $('.city');
	//                             // alert(city);
	//                             c.parent().append(city); // add the new stuff
	//                             c.remove();              // remove the old stuff
	//                         });
	//                         $(this).find("State").each(function () {
	//                             var state = $(this).text();
	//                             var s = $('.state');
	//                             // alert(state);
	//                             s.parent().append(state); // add the new stuff
	//                             s.remove();               // remove the old stuff
	//                         });
	//                         $(this).find("Temperatures").each(function () {
	//                             $(this).find("DaytimeHigh").each(function () {
	//                                 var htemp = $(this).text();
	//                                 var ht = $('.high');
	//                                 // alert(htemp);
	//                                 ht.parent().append(htemp); // add the new stuff
	//                                 ht.remove();               // remove the old stuff
	//                             });
	//                         });
	//                         $(this).find("Description").each(function () {
	//                             var desc = $(this).text();
	//                             var d = $('.description');
	//                             // alert(desc);
	//                             d.parent().append(desc); // add the new stuff
	//                             d.remove();              // remove the old stuff
	//                         });
	//                     });
	//                 });
	//             }
	//         });
	//     });
	// });
	    // Loading in the Weather Data
	    // $(document).ready(function() {
	    //     $('form#weather-form').submit( function(e) {
	    //         e.preventDefault();
	    //         var zip = $("input[name='zip']").val();

	    //         $.ajax({
	    //             url: "http://wsf.cdyne.com/WeatherWS/Weather.asmx/GetCityForecastByZIP=" + zip,
	    //             // data: {"zip": zip},
	    //             // dataType: 'xml';
	    //             // crossDomain: true,
				 //    dataType: 'jsonp',
	    //             success: function(d){
	    //                 alert("ajax done");

	    //             }
	    //         });
	            // var el = $(this);
	            // alert(console.log(el));

	            // $('.weather-wrapper').load('<?php echo BASE_URL; ?>/index.php/weather/getresults?zip=' + $('input[name=zip]').val() + ' .weather');

	            // $.get('<?php echo BASE_URL; ?>/index.php/weather/getresults?zip=' + $('input[name=zip]').val(), function(res) {

	                // $('.city').html(res.City);
	                // $('.state').html(res.State);
	                // alert($('input[name=zip]').val());
	                // $.ajax({
	                //  url: el.attr('href'),
	                //  type: "POST",
	                //  success: function(data){
	                //      dv.parent().append(data);
	                //      dv.remove();
	                //  }
	                // });
	                // alert(res);
	                // if ('true' != res.Success) {
	                //  return alert('Something went wrong.  Is your zip code valid?');
	                // };
	                // alert(res.City);
	                // console.log(res.City);


	                // $('.temp').html(res.Temperatures);

	                // Update other elements

	            // });
	            // $.ajax({
	            //  // url: '<?php echo BASE_URL; ?>/index.php/weather/getresults?zip=' + $('input[name=zip]').val(),
	            //  url: 'http://wsf.cdyne.com/WeatherWS/Weather.asmx/GetCityForecastByZIP?zip<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	                // <a class="navbar-brand" href="#">Title</a>
	                // <ul class="nav navbar-nav">
	                //     <li class="active">
	                //         <a href="#">Home</a>
	                //     </li>
	                //     <li>
	                //         <a href="#">Link</a>
	                //     </li>
	                // </ul>
	            // </nav>=' + $('input[name=zip]').val(),
	            //  type: "GET",
	            //  datatype: 'xml',
	            //  success: function(xml) {
	      //               $(xml).find('Forecast').each(function(){
	      //                   $(this).find("Description").each(function(){
	      //                       var name = $(this).text();
	      //                       alert(name);
	      //                   });
	      //               });
	      //           }
	            // });
	    //     });
	    // });
	</script>
 <!-- <?php // include('views/elements/footer.php');?> -->