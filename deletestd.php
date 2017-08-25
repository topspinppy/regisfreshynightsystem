<?php
	if(isset($_POST["name"]))
	{
			include "connect.php";
		$name = $_POST["name"];
		$sqls = "UPDATE user SET random = '0' WHERE student_id = '$name'";
		mysqli_query($conn,$sqls);
	}
?>