<?php
    define('BASE_URL', $_SERVER['DOCUMENT_ROOT'].'/gatepass/');
    require_once BASE_URL.'connection/conn.php';

	if($_REQUEST['method'] == 'restore'){
		$id = $_REQUEST['id'];
		$query = mysqli_query($conn, "UPDATE gp_users SET active = '1' WHERE id = '$id'");
		if($query){
			echo 'success';
		}
	}

	if($_REQUEST['method'] == 'archive'){
		$id = $_REQUEST['id'];
		$query = mysqli_query($conn, "UPDATE gp_users SET active = '0' WHERE id = '$id'");
		if($query){
			echo 'success';
		}
	}

	if($_REQUEST['method'] == 'update'){
		$id = $_REQUEST['id'];
		$code = $_REQUEST['code'];
		$name = $_REQUEST['name'];
		$description = $_REQUEST['description'];
		$query = mysqli_query($conn, "UPDATE gp_users SET code = '$code', name = '$name', description = '$description' WHERE id = '$id'");
		if($query){
			echo 'success';
		}
	}

    if($_REQUEST['method'] == 'find'){
    	$id = $_REQUEST['id'];
	    $query = mysqli_query($conn, "SELECT * FROM gp_users WHERE id = '$id'");
	    $data = array();
	    while($rows = mysqli_fetch_array($query)){
	        $data[] = $rows;
	    }
    	echo json_encode($data);
	}

	if($_REQUEST['method'] == 'save'){
		$code = $_REQUEST['code'];
		$name = $_REQUEST['name'];
		$description = $_REQUEST['description'];
		$query = mysqli_query($conn, "INSERT INTO gp_users (code, name, description, active) VALUES ('$code', '$name', '$description','1')");
		if($query){
			echo 'success';
		}
	}

    if($_REQUEST['method'] == 'list'){
	    $query = mysqli_query($conn, "SELECT * FROM gp_users");
	    $data = array();
	    while($rows = mysqli_fetch_array($query)){
	        $data[] = $rows;
	    }
    	echo json_encode($data);
	}

    if($_REQUEST['method'] == 'list-select'){
    	$username = $_REQUEST['username'];
	    $query = mysqli_query($conn, "SELECT * FROM gp_users WHERE active = '1' AND username = '$username' UNION ALL SELECT * FROM gp_users WHERE active = '1' AND username != '$username'");
	    $data = array();
	    while($rows = mysqli_fetch_array($query)){
	        $data[] = $rows;
	    }
    	echo json_encode($data);
	}

?>