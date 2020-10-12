<?php
    define('BASE_URL', $_SERVER['DOCUMENT_ROOT'].'/gatepass/');
    require_once BASE_URL.'connection/conn.php';

	if($_REQUEST['method'] == 'restore'){
		$id = $_REQUEST['id'];
		$query = mysqli_query($conn, "UPDATE gp_item SET active = '1' WHERE id = '$id'");
		if($query){
			echo 'success';
		}
	}

	if($_REQUEST['method'] == 'archive'){
		$id = $_REQUEST['id'];
		$query = mysqli_query($conn, "UPDATE gp_item SET active = '0' WHERE id = '$id'");
		if($query){
			echo 'success';
		}
	}

	if($_REQUEST['method'] == 'update'){
		$id = $_REQUEST['id'];
		$code = $_REQUEST['code'];
		$name = $_REQUEST['name'];
		$description = $_REQUEST['description'];
		$qty = $_REQUEST['qty'];
		$unit_of_measurement = $_REQUEST['unit_of_measurement'];
		$query = mysqli_query($conn, "UPDATE gp_item SET code = '$code', name = '$name', description = '$description', qty = '$qty', unit_of_measurement = '$unit_of_measurement' WHERE id = '$id'");
		if($query){
			echo 'success';
		}
	}

    if($_REQUEST['method'] == 'find'){
    	$id = $_REQUEST['id'];
	    $query = mysqli_query($conn, "SELECT a.id, a.code, a.name, a.description, a.qty, a.unit_of_measurement FROM gp_item a WHERE a.id = '$id'");
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
		$qty = $_REQUEST['qty'];
		$unit_of_measurement = $_REQUEST['unit_of_measurement'];
		$query = mysqli_query($conn, "INSERT INTO gp_item (code, name, description, qty, unit_of_measurement, active) VALUES ('$code', '$name', '$description', '$qty', '$unit_of_measurement','1')");
		if($query){
			echo 'success';
		}
	}

    if($_REQUEST['method'] == 'list'){
	    $query = mysqli_query($conn, "SELECT *, CONCAT(qty, ' ', unit_of_measurement) qty_display FROM gp_item");
	    $data = array();
	    while($rows = mysqli_fetch_array($query)){
	        $data[] = $rows;
	    }
    	echo json_encode($data);
	}

?>