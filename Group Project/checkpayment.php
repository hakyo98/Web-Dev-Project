<?php
session_start();

require_once('connect.php');
$uid = $_SESSION['v_id'];
$sql = "DELETE FROM cart WHERE uid =".$uid;
$query = pg_query($conn,$sql);
if($query){

	header("Location: index.php");}
		

	else
		{
			header("Location: Menu.php");
		}
	

	

?>
