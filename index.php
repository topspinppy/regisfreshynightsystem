<?php include "connect.php"
	
?>
<!DOCTYPE html>
<html>
	<head>
		<title></title>
	</head>
	<body>
		<form method="post" style="text-align: center;margin-top: 200px;">
			<input type="text" name="student_id" autofocus style="width: 30%;height: 50px;font-size: 50px;">
			<br><br>
			<input type="submit" name="submit" value="บันทึก" style="width: 30%;height: 50px;font-size: 30px;">
		</form>
	</body>
</html>

<?php
	if($_POST['submit']!=null){
		$student_id=$_POST['student_id'];
		$select="select * from user where student_id='".$student_id."'";
		$result=$conn->query($select);
		$rs=$result->fetch_assoc();
		if($rs['status']==1){echo "<script>alert('รหัสนี้ลงทะเบียนไปแล้ว')</script>";}
		else if($rs['status']==null){echo "<script>alert('ไม่มีรหัสนี้อยู่ในระบบ')</script>";}
		else{
			$sql="UPDATE `user` SET `status`='1' where student_id='".$student_id."'";
			$conn->query($sql);
		}
		echo "<br><div style='font-size:30px;text-align:center'>".$student_id." ".$rs['name']." ".$rs['lname']." ".$rs['brance']."</div>";
	}

?>