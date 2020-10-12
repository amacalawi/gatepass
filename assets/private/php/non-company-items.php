<?php
    define('BASE_URL', $_SERVER['DOCUMENT_ROOT'].'/gatepass/');
    require_once BASE_URL.'connection/conn.php';

	if($_REQUEST['method'] == 'restore'){
		$id = $_REQUEST['id'];
		$query = mysqli_query($conn, "UPDATE gp_non_company_items SET active = '1' WHERE id = '$id'");
		if($query){
			echo 'success';
		}
	}

	if($_REQUEST['method'] == 'archive'){
		$id = $_REQUEST['id'];
		$query = mysqli_query($conn, "UPDATE gp_non_company_items SET active = '0' WHERE id = '$id'");
		if($query){
			echo 'success';
		}
	}

	if($_REQUEST['method'] == 'update'){
		$id = $_REQUEST['id'];
		$code = $_REQUEST['code'];
		$name = $_REQUEST['name'];
		$description = $_REQUEST['description'];
		$query = mysqli_query($conn, "UPDATE gp_non_company_items SET code = '$code', name = '$name', description = '$description' WHERE id = '$id'");
		if($query){
			echo 'success';
		}
	}

    if($_REQUEST['method'] == 'find'){
    	$id = $_REQUEST['id'];
	    $query = mysqli_query($conn, "SELECT * FROM gp_non_company_items WHERE id = '$id'");
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
		$query = mysqli_query($conn, "INSERT INTO gp_non_company_items (code, name, description, active) VALUES ('$code', '$name', '$description','1')");
		if($query){
			echo 'success';
		}
	}

    if($_REQUEST['method'] == 'list'){
	    $query = mysqli_query($conn, "SELECT b.created_date, CONCAT(b.item_source, ' [' ,b.disposition,']') item_source_disposition, a.name, a.purchase_no, b.non_company_items_no, b.item, b.brand, b.serial_no, b.qty, b.username, b.remarks, b.active FROM gp_non_company_items a INNER JOIN gp_non_company_items_line b ON a.id = b.non_company_items_id");
	    $data = array();
	    while($rows = mysqli_fetch_array($query)){
	        $data[] = $rows;
	    }
    	echo json_encode($data);
	}

    if($_REQUEST['method'] == 'list-select'){
    	$code = $_REQUEST['code'];
	    $query = mysqli_query($conn, "SELECT * FROM gp_non_company_items WHERE active = '1' AND code = '$code' UNION ALL SELECT * FROM gp_non_company_items WHERE active = '1' AND code != '$code'");
	    $data = array();
	    while($rows = mysqli_fetch_array($query)){
	        $data[] = $rows;
	    }
    	echo json_encode($data);
	}
?>