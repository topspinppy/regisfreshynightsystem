
	<?php
		ini_set('display_errors', 1);
		error_reporting(~0);
		if($_POST["name"] == "one")
		{
			include "connect.php";
			$sql = "SELECT * FROM user where status = '1' and random = '1' order by rand() limit 1 ";
			$query = mysqli_query($conn,$sql);
			if (!$query) {
				printf("Error: %s\n", $conn->error);
				exit();
			}

			$result = mysqli_fetch_array($query,MYSQLI_ASSOC);
			echo substr($result["student_id"],0,2).'-'.substr($result["student_id"],2,6).'-'.substr($result["student_id"],8,4).'-'.substr($result["student_id"],12,1).' '.$result["name"].' '.$result["lname"]." ".$result['brance'];
			// $std = $result["std_id"];
			// $sqls = "UPDATE student SET status = '1' WHERE std_id = '$std'";
			// mysqli_query($conn,$sqls);
			mysqli_close($conn);

		}
	?>
