<?
	session_start();
	$today = date("Y-m-d");
	$con=mysql_connect("localhost", "qwerty", "1234");
	mysql_select_db("webdb", $con);

	$table="Lecture";
	$LID=$_POST[LID];
	$S=$_POST[StartTime];
	$E=$_POST[EndTime];

	if($S > $E) {
		echo('
		<script>
			alert("시작시간이 종료시간보다 앞입니다!");
			history.back();
		</script>
		');
	}

	$query="select LID from $table where LID='$LID'";
	$result=mysql_query($query, $con);

	if(mysql_num_rows($result)){
		echo('
		<script>
			alert("이미 존재하는 과목코드입니다!");
			self.close();
		</script>
		');
	}
	else {
		$query="insert into $table values(
		'$LID','$_POST[LNAME]','$_POST[Classification]','$_POST[Personnel]',
		'$_SESSION[userPID]','$_POST[DayOfWeek]','$S','$E',
		'$_POST[Credit]','$_POST[Room]','$_POST[LPID]'
		)";		
		$result=mysql_query($query, $con);
		$query = "select TID from term where StartDay > '$today' and '$today' >= RegDay";
		$result=mysql_query($query, $con);
		$row = mysql_fetch_array($result);
		$TID = $row[0];
		$query="insert into RegisterLecture values(
		'$TID','$LID')";		
		$result=mysql_query($query, $con);
		echo('
		<script>
			alert("등록되었습니다!");
		</script>
		');
	}
?>

<script>opener.parent.location.reload();self.close();</script>