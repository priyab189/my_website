<?php
	session_start();
 
	require_once 'conn.php';
 
	if(ISSET($_POST['login'])){
		if($_POST['username'] != "" || $_POST['password'] != ""){
			$username = $_POST['username'];
			$password = $_POST['password'];
			$sql = "SELECT * FROM `user` WHERE `username`=? AND `password`=? ";
			$query = $conn->prepare($sql);
			$query->execute(array($username,$password));
			$row = $query->rowCount();
			$fetch = $query->fetch();
			if($row > 0) {
				$_SESSION['user'] = $fetch['user_id'];
				if( $username == admin)
				{
				header("location: admin.php");
				}
				elseif($username == superadmin)
				{
					header("location: superadmin.php");
				}
				elseif($username == manager)
				{
                        header("location: manager.php");
				}
				
			else{
				echo "Invalid ahes tu";
			}		
				
			} else{
				echo "
				<script>alert('Invalid username or password')</script>
				<script>window.location = 'index.php'</script>
				";
			}
		}else{
			echo "
				<script>alert('Please complete the required field!')</script>
				<script>window.location = 'index.php'</script>
			";
		}
	}
?>