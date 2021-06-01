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
			echo "<script>alert('이미 존재하는 과목코드입니다!'); self.close();</script>";
	}else if($S>$E){
		echo "<script>alert('시작시간이 종료시간보다 앞입니다!'); self.close();</script>";
	}
			$query="update $table set LID='$LID',LNAME='$_POST[LNAME]',Classification='$_POST[Classification]',Personnel= '$_POST[Personnel]',
			DayOfWeek='$_POST[DayOfWeek]',StartTime='$S',EndTime='$E',Credit='$_POST[Credit]',Room='$_POST[Room]',
			LPID='$_POST[LPID]',PID='$_SESSION[userPID]'
			where LID='$_POST[LID]'";		
			$result=mysql_query($query, $con);
		

	
?>


<script>self.close();</script>