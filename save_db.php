<meta charset="utf-8">
<?php 
include("condb.php");

//print_r($_POST);

 	//save checkin
 	if(isset($_POST["checkin"])){

		 	$checkdate = date('Y-m-d');
			$m_id = mysqli_real_escape_string($condb,$_POST["m_id"]);
			$checkin = mysqli_real_escape_string($condb,$_POST["checkin"]);

			$sql = "INSERT INTO tbl_check_io
			(checkdate, m_id, checkin)
			VALUES
			('$checkdate', '$m_id', '$checkin')";
			$result = mysqli_query($condb, $sql) or die ("Error in query: $sql " . mysqli_error($sql));

					mysqli_close($condb);
					if($result){
					echo "<script type='text/javascript'>";
					echo "alert('บันทึกข้อมูลสำเร็จ');";
					echo "window.location = 'member.php'; ";
					echo "</script>";
					}else{
					echo "<script type='text/javascript'>";
					echo "alert('Error');";
					echo "window.location = 'member.php'; ";
					echo "</script>";
					}

		//save checkout			
 	}elseif(isset($_POST["checkout"])) {

 		// echo $_POST["checkout"];

 		// exit;

 			$checkdate = date('Y-m-d');
 		    $m_id = mysqli_real_escape_string($condb,$_POST["m_id"]);
			$checkout = mysqli_real_escape_string($condb,$_POST["checkout"]);

			$sql2 = "UPDATE tbl_check_io SET 
			checkout='$checkout'
			WHERE m_id=$m_id  AND checkdate='$checkdate'
			";
			$result2 = mysqli_query($condb, $sql2) or die ("Error in query: $sql2 " . mysqli_error($sql2));

			// echo $sql2;
			// exit;

					mysqli_close($condb);
					if($result2){
					echo "<script type='text/javascript'>";
					echo "alert('บันทึกข้อมูลสำเร็จ');";
					echo "window.location = 'member.php'; ";
					echo "</script>";
					}else{
					echo "<script type='text/javascript'>";
					echo "alert('Error');";
					echo "window.location = 'member.php'; ";
					echo "</script>";
					}
 		 
 	} //}elseif (isset(($_POST["checkout"])) {
 else{
 			echo "<script type='text/javascript'>";
 			echo "alert('คุณได้บันทึกเวลาเข้า-ออกงานวันนี้เรียบร้อยแล้ว');";
			echo "window.location = 'member.php'; ";
			echo "</script>";
 }	
?>