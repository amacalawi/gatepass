<?php
    define('BASE_URL', $_SERVER['DOCUMENT_ROOT'].'/gatepass/');
    require_once BASE_URL.'connection/conn.php';

	if($_REQUEST['method'] == 'restore'){
		$id = $_REQUEST['id'];
		$query = mysqli_query($conn, "UPDATE gp_menu_sub_menu a SET active = '1' WHERE id = '$id'");
		if($query){
			echo 'success';
		}
	}

	if($_REQUEST['method'] == 'archive'){
		$id = $_REQUEST['id'];
		$query = mysqli_query($conn, "UPDATE gp_menu_sub_menu a SET active = '0' WHERE id = '$id'");
		if($query){
			echo 'success';
		}
	}

	if($_REQUEST['method'] == 'update'){
		$id = $_REQUEST['id'];
		$code = $_REQUEST['code'];
		$name = $_REQUEST['name'];
		$description = $_REQUEST['description'];
		$query = mysqli_query($conn, "UPDATE gp_menu_sub_menu a SET code = '$code', name = '$name', description = '$description' WHERE id = '$id'");
		if($query){
			echo 'success';
		}
	}

    if($_REQUEST['method'] == 'find'){
    	$id = $_REQUEST['id'];
	    $query = mysqli_query($conn, "SELECT * FROM gp_menu_sub_menu a WHERE id = '$id'");
	    $data = array();
	    while($rows = mysqli_fetch_array($query)){
	        $data[] = $rows;
	    }
    	echo json_encode($data);
	}

	if($_REQUEST['method'] == 'save'){
		$menu = $_REQUEST['menu'];
		$sub_menu = $_REQUEST['sub_menu'];
		$query = mysqli_query($conn, "INSERT INTO gp_menu_sub_menu (menu, sub_menu, active) VALUES ('$menu', '$sub_menu', '1')");
		if($query){
			echo 'success';
		}
	}

    if($_REQUEST['method'] == 'list'){
	    $query = mysqli_query($conn, "SELECT a.id, a.menu, a.sub_menu, a.active FROM gp_menu_sub_menu a INNER JOIN gp_menu b ON a.menu = b.code INNER JOIN gp_sub_menu c ON a.sub_menu = c.code");
	    $data = array();
	    while($rows = mysqli_fetch_array($query)){
	        $data[] = $rows;
	    }
    	echo json_encode($data);
	}

    if($_REQUEST['method'] == 'list-select'){
    	$id = $_REQUEST['id'];
	    $query = mysqli_query($conn, "SELECT a.id, CONCAT(a.menu, '-', a.sub_menu) menus, a.active FROM gp_menu_sub_menu a INNER JOIN gp_menu b ON a.menu = b.code INNER JOIN gp_sub_menu c ON a.sub_menu = c.code WHERE a.id = '$id' UNION ALL SELECT a.id, CONCAT(a.menu, '-', a.sub_menu) menus, a.active FROM gp_menu_sub_menu a INNER JOIN gp_menu b ON a.menu = b.code INNER JOIN gp_sub_menu c ON a.sub_menu = c.code WHERE a.id != '$id'");
	    $data = array();
	    while($rows = mysqli_fetch_array($query)){
	        $data[] = $rows;
	    }
    	echo json_encode($data);
	}
?>