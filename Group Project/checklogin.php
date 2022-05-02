
<?php
session_start();

if (isset($_POST['username']))
{	
	$u_user = $_POST['username'];
	$u_pass_uncrypt = $_POST['password'];
	$u_pass = md5($u_pass_uncrypt);
	
	$sql = "SELECT * FROM users ".
	"         WHERE username='".$u_user."' AND password='".$u_pass."'            ";
	
	require_once('connect.php');
	if ($query = pg_query($conn,$sql))
	{	 
		$arr = pg_fetch_array($query,NULL,PGSQL_ASSOC);
		if (
				isset($arr['username']) &&
				isset($arr['firstname']) &&
				isset($arr['lastname'])
			)
			{
				
				
				$_SESSION['loggedin'] = True;
				$_SESSION['v_id'] = $arr['id'];
				$_SESSION['v_name'] = $arr['firstname'];
				$_SESSION['v_username'] = $arr['username'];
				$_SESSION['v_lname'] = $arr['lastname'];
				$message = "Successful Login";
				echo "<script type='text/javascript'>alert('$message');</script>";
				header("Location: index.php");
				

			}
		else
			$message = "Error";
			echo "<script type='text/javascript'>alert('$message');</script>";
			header("Location: index.php");
	}
	else
	{
		$message = "Incorrect user/password";
		echo "<script type='text/javascript'>alert('$message');</script>";
		header("Location: index.php");
	}

}	
?>
