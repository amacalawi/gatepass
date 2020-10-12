<?php
    define('BASE_URL', $_SERVER['DOCUMENT_ROOT'].'/gatepass/');
    require_once BASE_URL.'connection/conn.php';

	if($_REQUEST['method'] == 'restore'){
		$id = $_REQUEST['id'];
		$query = mysqli_query($conn, "UPDATE gp_user_access a SET active = '1' WHERE id = '$id'");
		if($query){
			echo 'success';
		}
	}

	if($_REQUEST['method'] == 'archive'){
		$id = $_REQUEST['id'];
		$query = mysqli_query($conn, "UPDATE gp_user_access a SET active = '0' WHERE id = '$id'");
		if($query){
			echo 'success';
		}
	}

	if($_REQUEST['method'] == 'update'){
		$id = $_REQUEST['id'];
		$code = $_REQUEST['code'];
		$name = $_REQUEST['name'];
		$description = $_REQUEST['description'];
		$query = mysqli_query($conn, "UPDATE gp_user_access a SET code = '$code', name = '$name', description = '$description' WHERE id = '$id'");
		if($query){
			echo 'success';
		}
	}

    if($_REQUEST['method'] == 'find'){
    	$id = $_REQUEST['id'];
	    $query = mysqli_query($conn, "SELECT * FROM gp_user_access a WHERE id = '$id'");
	    $data = array();
	    while($rows = mysqli_fetch_array($query)){
	        $data[] = $rows;
	    }
    	echo json_encode($data);
	}

	if($_REQUEST['method'] == 'save'){
		$menu_sub_menu = $_REQUEST['menu_sub_menu'];
		$username = $_REQUEST['username'];
		$query = mysqli_query($conn, "INSERT INTO gp_user_access (username, menu_sub_menu, active) VALUES ('$username', '$menu_sub_menu', '1')");
		if($query){
			echo 'success';
		}
	}

    if($_REQUEST['method'] == 'list'){
	    $query = mysqli_query($conn, "SELECT a.id, b.username, CONCAT(c.menu, ' [', c.sub_menu, ']') menus, a.active FROM gp_user_access a INNER JOIN gp_users b ON a.username = b.username INNER JOIN gp_menu_sub_menu c ON a.menu_sub_menu = c.id");
	    $data = array();
	    while($rows = mysqli_fetch_array($query)){
	        $data[] = $rows;
	    }
    	echo json_encode($data);
	}

?>