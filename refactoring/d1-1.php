<?
	session_start();
	
	global $con;
	global $table;
    global $errormsg;
	$con=mysql_connect('localhost', 'qwerty', '1234');
	mysql_select_db('webdb', $con);
    $table="Lecture";
	$LID=$_POST[LID];
	$S =$_POST[StartTime];
	$E =$_POST[EndTime];
	$query2="select LID from $talbe where LID='$LID'";
	$result2=mysql_query($query, $con);
	if(mysql_num_rows($result2)){
			echo "<script>alert('�̹� �����ϴ� �����ڵ��Դϴ�!'); self.close();</script>";
	}else if($S>$E){
		echo "<script>alert('���۽ð��� ����ð����� ���Դϴ�!'); self.close();</script>";
	}
			$query="insert into $table values(
			'$LID','$_POST[LNAME]','$_POST[Classification]','$_POST[Personnel]',
			'$_SESSION[userPID]','$_POST[DayOfWeek]','$S','$E',
			'$_POST[Credit]','$_POST[Room]','$_POST[LPID]'
		    )";		
			$result=mysql_query($query, $con);
		

	
?>


<script>opener.parent.location.reload();self.close();</script>