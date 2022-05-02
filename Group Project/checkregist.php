<?php


	
	
require_once('connect.php');


	$u_user = $_POST['username'];
	$u_pass_uncrypt = $_POST['passwd'];
	$u_pass = md5($u_pass_uncrypt);
	$u_cpass_uncrypt = $_POST['cpasswd'];
	$u_cpass = md5($u_cpass_uncrypt);
	$u_title= $_POST['title'];
	$u_fname= $_POST['firstname'];
	$u_lname= $_POST['lastname'];
	$u_gender=$_POST['gender'];

	
	if('"'.$u_pass.'"' == '"'.$u_cpass.'"' ){
		$sql = "INSERT INTO users(username,password,firstname,lastname,gender) 
		VALUES ('$u_user','$u_pass','$u_fname','$u_lname','$u_gender');";
		$query = pg_query($conn,$sql);
		if($query){

		header("Location: login.php");}
		
}
	else
		{
			header("Location: signup.php");
		}
?>	