<?php 

function getJSON() {
    $jsonIn = file_get_contents("php://input");
    $json = array();
    $response = array();
    try {
        $json = json_decode($jsonIn, false);
        return $json;
    } catch (Exception $e) {
        header("HTTP/1.0 500 Invalid content");
        $response['status'] = "fail";
        $response['message'] = $e->getMessage();
        print json_encode($response);
        exit;
    }
}

function deleteQuickLink() {
    global $mysqli;
    $body = getJSON();

    $query = "delete from quicklinks where pk = ?";
    if (!$stmt = $mysqli->prepare($query)) {
        die("error on getData Select\n");
    }
    $stmt->bind_param("i", $body->token);

    if(!$stmt->execute()) {
        die("error on execute");
    }

    return json_encode($body);


}

function getQuickLinks() {
	global $mysqli;
	$result = array();
    $query = "select pk, title, link from quicklinks";

	if (!$stmts = $mysqli->prepare($query)) {
		print $mysql->error;
		die("error on getData select");
	}

	$stmts->execute();
	$stmts->bind_result($id, $title, $link);

	while($stmts->fetch()) {
		$result[$id] = array(
            'id' => $id,
            'title' => $title,
            'url' => $link
        );
    }
    
    return json_encode($result);
}

function getVideoLinks() {
	global $mysqli;
	$result = array();
	$query = "select pk, title, link from videolinks";

	if (!$stmts = $mysqli->prepare($query)) {
		print $mysql->error;
		die("error on getData select");
	}

	$stmts->execute();
	$stmts->bind_result($pk, $title, $id);

	while($stmts->fetch()) {
		$result[$pk] = array(
            'pk' => $pk,
            'title' => $title,
            'id' => $id
        );
    }

	return json_encode($result);
}

    require_once('passwd.php');

    header('Content-Type: application/json');
			    
    @$mysqli = new mysqli("localhost",$user,$pass,"FinalProject");
    if ($mysqli->connect_errno) {
        print $mysqli->connect_error;
        die("Cannot connect to database");
    }

    $parts;

    $method = $_SERVER['REQUEST_METHOD'];

    if(isset($_SERVER['PATH_INFO'])) {
        $parts = explode('/', $_SERVER['PATH_INFO']);
    }

    if ($parts[1] == 'v1' && $parts[2] == 'quickLink' && $method == 'GET') {
        print getQuickLinks();
    }

    else if ($parts[1] == 'v1' && $parts[2] == 'videoLink' && $method == 'GET') {
        print getVideoLinks();
    }

    else if ($parts[1] == 'v1' && $parts[2] == 'quickLink' && $method == 'DELETE') {
        print deleteQuickLink();
    }

?>