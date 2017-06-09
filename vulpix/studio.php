<!DOCTYPE html>
<?php include "twitter/tweet.php" ; ?>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<title>Symbio Welcome</title>

		<!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.-->
		<!--<script>var __adobewebfontsappname__="dreamweaver"</script>
		<script src="http://use.edgefonts.net/quicksand:n3,n4:default.js" type="text/javascript"></script>
		-->
		<!-- include flatWeatherPlugin.css -->
		<link href="weather/css/flatWeatherPlugin.css" rel="stylesheet">
		<!-- include a copy of jquery (if you haven't already) -->
		<script src="http://code.jquery.com/jquery-3.1.1.min.js"></script>
		<!-- include flatWeatherPlugin.js -->
		<script src="weather/js/jquery.flatWeatherPlugin.min.js"></script>  
		<!-- include autoScroll plugin -->
		<script src="twitter/jquery.autoScrollTextTape.min.js"></script>  

		<script type="text/javascript">
		function startWeather() {
		$(document).ready(function() {

			//Setup the plugin, see readme for more examples
			var example = $("#example").flatWeatherPlugin({
			location: "Stockholm,Sweden",
			country: "Sweden",
			api: "yahoo",
			displayCityNameOnly : false,
			//view : "today",
			view : "simple",
			});
		});
		}
		</script>
		<style>
			
			/* style the container however you please */
			#example {
				position:absolute;
				color:#fff; 
				background: #000000;
				padding: 10px;
				margin: 30px auto;
				width: 340px;
				border-radius: 1px;
			}

			/* styling for this page only, ignore */
			body {background: #95a5a6; font-family: sans-serif; background: #000000; padding: 0; margin: 0;}
			p {color: #888; width: 200px; margin: 0 auto; text-align: center;}
		</style>
        <script>
			function startPage() {
				startTime();
				startWeather();
			}
		</script>
        <script>
			function startTime() {
				var day;
				var month;
				var hour;
				var ampm;
				var currentdate = new Date();
				switch (new Date().getDay()) {
					case 0:
					day = "Sunday";
					break;
				case 1:
 			       day = "Monday";
 			       break;
 			   case 2:
			       day = "Tuesday";
 			       break;
    			case 3:
        		   day = "Wednesday";
       			   break;
    			case 4:
        			day = "Thursday";
        			break;
    			case 5:
        			day = "Friday";
       		 		break;
    			case 6:
        			day = "Saturday";
        			break;
				}
				switch (new Date().getMonth()) {
				case 0:
					month = "January";
					break;
				case 1:
 			       month = "February";
 			       break;
 			    case 2:
			       month = "March";
 			       break;
    			case 3:
        		   month = "April";
       			   break;
    			case 4:
        			month = "May";
        			break;
    			case 5:
        			month = "June";
       		 		break;
    			case 6:
        			month = "July";
        			break;
				case 7:
        			month = "August";
        			break;
				case 8:
        			month = "September";
        			break;
				case 9:
        			month = "October";
        			break;
				case 10:
        			month = "November";
        			break;
				case 11:
        			month = "December";
        			break;
				}
				var dt = day + ", "
				+ month  + " " 
				+ currentdate.getDate() + " " ;
				document.getElementById("demo").innerHTML = dt;
				var hour;
				var ampm;
				var currentdate = new Date();
				hour = currentdate.getHours();
				if(currentdate.getMinutes() == 0)
				{
					var minutes = "00";
				}
				else if(currentdate.getMinutes()<10)
				{
					var minutes = "0" + currentdate.getMinutes();
				}
				else
				{
					var minutes = currentdate.getMinutes();
				}
				var dt = hour + ":"
                + minutes;
				document.getElementById("demo2").innerHTML = dt;
			}

		</script>
		 <script type="text/javascript">
		 $(document).ready(function(){
    		$('.text-container--with-plugin').autoTextTape();
		});
    
  		</script>
		<!-- weather widget style only -->
		 <style>
			 .java-script-menu {
				 position:absolute; 

			 }
      		.container {
        		position: relative;
        		padding: 4px 10px;
        		border: 0px solid #dadada;
        		margin: 1.5em auto 0 auto;
      		}
      		.container--m {
        		width: 912px;
				color: #FFFFFF;
				margin-top:250px; 
				font-size: 25px; 
				font-weight: bold;
      		}
      
      		.text-container {
        		text-align: center;
      		}
      		h1 { margin:150px auto 30px auto; text-align:center;}
    	</style>

	</head>
	<body onload="startPage(); setInterval('startPage()', 1000 )">
		<div style="width:912px; height:300px;align-content:center; align-self:center; align-items:center;">
			<img src="weather/img/symbio_logo.svg" alt="symbio" style="margin-top:70px;width:650px;height:150px; margin-left: 14%; ">
		</div>
    	<div style="height:0px;margin-left:400px; font-style: normal; font-weight: 500; align-content:center; align-items:center; align-self:center;">
			<p id="demo" style="width: 400px; color: #FFFFFF; font-size: 25px; font-weight: bold; align-content:center; align-self:center; align-items:center;"></p>
            <p id="demo2" style="width: 400px; color: #FFFFFF; font-size: 70px; align-content:center; align-self:center; align-items:center; margin-top:4px;"></p>
    	</div>
	
		<!-- Weatehr widget -->
		<div style="position:absolute; margin-top:-10px; margin-left:100px;" id="example"></div>

		<!-- Twitter widget -->
		<div id="jquery-script-menu">
			<div class="jquery-script-center">
	  			<div class="container container--m">
    				<div class="text-container text-container--with-plugin">This is just some really long text to make sure that everythign is on the screen as we expect and the scrolling works right.<?php // echo $tweet_text ; ?></div>
  				</div>
			</div>
		</div>
</body>
</html>