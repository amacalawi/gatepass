<?php
    define('BASE_URL', $_SERVER['DOCUMENT_ROOT'].'/gatepass/');
    require_once BASE_URL.'connection/conn.php';

	if($_REQUEST['method'] == 'restore'){
		$id = $_REQUEST['id'];
		$query = mysqli_query($conn, "UPDATE gp_item_source_disposition a SET active = '1' WHERE id = '$id'");
		if($query){
			echo 'success';
		}
	}

	if($_REQUEST['method'] == 'archive'){
		$id = $_REQUEST['id'];
		$query = mysqli_query($conn, "UPDATE gp_item_source_disposition a SET active = '0' WHERE id = '$id'");
		if($query){
			echo 'success';
		}
	}

	if($_REQUEST['method'] == 'update'){
		$id = $_REQUEST['id'];
		$code = $_REQUEST['code'];
		$name = $_REQUEST['name'];
		$description = $_REQUEST['description'];
		$query = mysqli_query($conn, "UPDATE gp_item_source_disposition a SET code = '$code', name = '$name', description = '$description' WHERE id = '$id'");
		if($query){
			echo 'success';
		}
	}

    if($_REQUEST['method'] == 'find'){
    	$id = $_REQUEST['id'];
	    $query = mysqli_query($conn, "SELECT * FROM gp_item_source_disposition a WHERE id = '$id'");
	    $data = array();
	    while($rows = mysqli_fetch_array($query)){
	        $data[] = $rows;
	    }
    	echo json_encode($data);
	}

	if($_REQUEST['method'] == 'save'){
		$item_source = $_REQUEST['item_source'];
		$disposition = $_REQUEST['disposition'];
		$query = mysqli_query($conn, "INSERT INTO gp_item_source_disposition (item_source, disposition, active) VALUES ('$item_source', '$disposition', '1')");
		if($query){
			echo 'success';
		}
	}

    if($_REQUEST['method'] == 'list'){
	    $query = mysqli_query($conn, "SELECT a.id, a.item_source, a.disposition, a.active FROM gp_item_source_disposition a INNER JOIN gp_item_source b ON a.item_source = b.code INNER JOIN gp_disposition c ON a.disposition = c.code");
	    $data = array();
	    while($rows = mysqli_fetch_array($query)){
	        $data[] = $rows;
	    }
    	echo json_encode($data);
	}

?>