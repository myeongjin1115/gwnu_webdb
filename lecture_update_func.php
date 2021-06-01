<?
	session_start();

	$con=mysql_connect("localhost", "qwerty", "1234");
	mysql_select_db("webdb", $con);
    $table="Lecture";
	$LID=$_POST[LID];
	$S=$_POST[StartTime];
	$E=$_POST[EndTime];
	$query="select LID from $table where LID='$LID'";
	$result=mysql_query($query, $con);
    if($S>$E){
		echo "<script>alert('시작시간이 종료시간보다 앞입니다!'); self.close();</script>";
	}
    $query="update $table set LID='$LID',LNAME='$_POST[LNAME]',Classification='$_POST[Classification]',Personnel='$_POST[Personnel]',
    DayOfWeek='$_POST[DayOfWeek]',StartTime='$S',EndTime='$E',Credit='$_POST[Credit]',Room='$_POST[Room]',
    LPID='$_POST[LPID]',PID='$_SESSION[userPID]'
    where LID='$_POST[LID]'";
    $result=mysql_query($query, $con);
?>

<script>self.close();</script>