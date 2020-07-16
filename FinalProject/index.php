<?php 




?>

<!DOCTYPE html>
<html lang="en">
  <head>
        <meta charset="utf-8">
        <title>Sam Cain</title>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"               integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="               crossorigin="anonymous"></script>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css">

        <script src="index.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> 

    </head>

    <body>
        <!-- Top Bar -->
        <header>
            <span>
                <a style="display: inline" href="http://miamioh.edu/cec/"><img src="logo.jpg" class="bannerLogo"></a>
                <h2 style="display: inline">Sam Cain Final Project</h2>
                <a style="display: inline; position: absolute; right:0" href="#"><img src="me.jpeg" id="smallme" class="bannerLogo"></a>
            </span>
        </header>

        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a id="setWeather" href="#">SetWeather</a></li>
                        <li><a href="setVideoLinks.php">SetVideoLinks</a></li>
                        <li><a href="setQuickLinks.php">SetQuickLinks</a></li>
                    </ul>
                    <div class="form-popup" id="myForm">
                        <label for="zip"><b>Zip</b></label>
                        <input id="zip" type="text" placeholder="Enter zipcode" name="zip" required>

                        <button class="btn" onClick="setZip()">Set</button>
                    </div> 
                </div>
                <div class="col-sm-8">
                    <h3>Welcome Cainsr2</h3>
                    <img src="me.jpeg" id="bigme">
 
                    <p id="location">Location: </p>
                    <p id="temp">Temperature: </p>
                    <p id="conditions">Current Conditions: </p>
                    <p id="forecast">Forecast: </p>

                    <br><br>

                    <h3>Quick Links</h3>

					<ul id="quick">
					
					</ul>

                    <br><br>

                    <h3>Video Links</h3>

					<ul id="video">
					</ul>
                </div>
            </div>
        </div>
    </body>
</html>