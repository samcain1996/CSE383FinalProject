<?php


require_once('passwd.php');
            
@$mysqli = new mysqli("localhost",$user,$pass,"FinalProject");
if ($mysqli->connect_errno) {
    print $mysqli->connect_error;
    die("Cannot connect to database");
}

function getVideoLinks() {
    global $mysqli;
	$result = "";
	$query = "select pk, title, link from videolinks";

	if (!$stmts = $mysqli->prepare($query)) {
		print $mysql->error;
		die("error on getData select");
	}

	$stmts->execute();
	$stmts->bind_result($pk, $title, $id);

	while($stmts->fetch()) {
        $result .= "<tr>";
        $result .= "<td>$pk</td>";
        $result .= "<td>$title</td>";
        $result .= "<td>$id</td>";
        $result .= "</tr>";
    }

    return $result;
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

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> 

    </head>

    <body>

    <table class="table">
    <thead><th>PK</th><th>Title</th><th>ID</th><th>Delete</th></thead>
    <tbody><?php print getVideoLinks(); ?></tbody>
    </table>

    </body>
</html>