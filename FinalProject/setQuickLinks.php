<?php
    $update = false;
    $pk; $title; $url;
    if(isset($_GET['pk'])) {
        $update = true;
        $pk = $_GET['pk'];
    }
    if(isset($_GET['title'])) {
        $title = $_GET['title'];
    }
    if(isset($_GET['url'])) {
        $url = $_GET['url'];
    }

    if ($update) {
        require_once('passwd.php');
            
        @$mysqli = new mysqli("localhost",$user,$pass,"FinalProject");
            if ($mysqli->connect_errno) {
                print $mysqli->connect_error;
                die("Cannot connect to database");
            }

	    $query = "insert into quicklinks values ($pk, '$title', '$link')";

	    if (!$stmts = $mysqli->prepare($query)) {
		    print $mysql->error;
		    die("error on getData select");
	    }

	    $stmts->execute();

    }       
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

        <script src="setQuickLinks.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> 

    </head>

    <body>

    <form action="http://cainsr2.383.csi.miamioh.edu/cse383-f19-cainsr2/FinalProject/setQuickLinks.php" method="get">
  <div class="form-group">
    <label for="pk">ID: </label>
    <input type="text" class="form-control" name="pk">
  </div>
  <div class="form-group">
    <label for="title">Title: </label>
    <input type="text" class="form-control" name="title">
  </div>
  <div class="form-group">
    <label for="url">URL: </label>
    <input type="text" class="form-control" name="url">
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form> 
<br><br>

    <table class="table">
    <thead><th>ID</th><th>Title</th><th>URL</th><th>Delete</th></thead>
    <tbody id="table"></tbody>
    </table>

    </body>
</html>