<?
	session_start();
	$today = date("Y-m-d");
	$con=mysql_connect("localhost", "qwerty", "1234");
	mysql_select_db("webdb", $con);
	$query = "select TID from term where StartDay > '$today' and '$today' >= RegDay";
	$result=mysql_query($query, $con);
	if(!mysql_num_rows($result)){
		echo('
		<script>
			alert("���� ��� ��¥�� �ƴմϴ�!");
			history.back();
		</script>
		');
	}else{
		$TID = mysql_fetch_array($result);
		$table="Lecture";
		$LID=$_POST[LID];
		$S=$_POST[StartTime];
		$E=$_POST[EndTime];

		if($S > $E) {
			echo('
			<script>
				alert("���۽ð��� ����ð����� ���Դϴ�!");
				history.back();
			</script>
			');
		}

		$query="select LID from $table where LID='$LID'";
		$result=mysql_query($query, $con);

		if(mysql_num_rows($result)){
			echo('
			<script>
				alert("�̹� �����ϴ� �����ڵ��Դϴ�!");
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
			
			$query="insert into RegisterLecture values(
			'$TID[0]','$LID')";		
			$result=mysql_query($query, $con);
			echo('
			<script>
				alert("��ϵǾ����ϴ�!");
			</script>
			');
		}
	}
?>

<script>opener.parent.location.reload();self.close();</script>