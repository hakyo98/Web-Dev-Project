<?php
session_start();

require_once('connect.php');
//create connection


//check connection

	
$fid = $_GET['foodid'];
$uid = $_SESSION['v_id'];

$check = "SELECT * FROM cart WHERE fid = $fid AND uid=$uid";
echo $check;
if ($checkexist = pg_query($conn,$check))
	{
		echo "test";
		$num_rows = pg_num_rows($checkexist);
		echo $num_rows;
	  
	}


if ($num_rows > 0) {
  header('Location:editcart.php?action=2&fid='.$fid);
}
else {

	$sql = "INSERT INTO cart(uid, fid, amount) 
	VALUES ('" . $uid . "','" . $fid . "',1)";

	if ( $res = pg_query($conn,$sql)) {
		echo('test3');
		$arr = pg_fetch_array($res,NULL,PGSQL_ASSOC);
		header('Location:menu.php');
		}
	
	else{
		echo pg_result_error($res);
	}
}

  





?>