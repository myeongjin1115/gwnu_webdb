<?
	session_start();
	$ID = $_SESSION['userid'];

	if(isset($_POST["select"])){
		$database = "webdb";
		$table = "LecturePlan";
		$connect = mysql_connect('localhost', 'qwerty', '1234')or die("mySQL 서버 연결 Error!");
		mysql_select_db($database, $connect);

		$LID=$_POST['select'];

		$query = "select * from $table where LID=$LID";

		$result = mysql_query($query, $connect);

		$plan = mysql_fetch_array($result);

	} else
		print "<html><head><META http-equiv='refresh' content='0 url=./LecturePlan(P).php'></head></head>";
?>


<html>
<head>
    <link rel="stylesheet" type="text/css" href="./style.css">
</head>
<body>
	<table align=center border=1>
		<form name="RegisterLecturePlan" action="Lecture_update_data.php" method="POST">	
<?
		echo "<tr align=center>";
			echo "<td>강의 계획서 ID : </td>";
			echo "<td><INPUT type=text size=25 name=LPID value=$plan[0] readonly></td>";
			echo "<td>강의코드 : </td>";
			echo "<td><INPUT type=text size=25 name=LID value=$LID readonly></td>";
		echo "</tr>";
		echo "<tr align=center>";
			echo "<td>교재 : </td>";
			echo "<td><INPUT type=text size=25 name=TextBook value=$plan[2]></td>";
			echo "<td>성적 반영 방법 : </td>";
			echo "<td><INPUT type=text size=25 name=HowToScore value=$plan[3]></td>";
		echo "</tr>";
		echo "<tr align=center>";
			echo "<td>수업목표 : </td>";
			echo "<td colspan=3><INPUT type=text size=77 name=Goal value=$plan[4]></td>";
		echo "</tr>";
		echo "<tr align=center>";

		echo "</tr>";
		for($i=5;$i<20;$i++){
			$num=(int)$i;
			$temp = $num-4;
			$str = (string)$temp;
			echo "<tr align=center>";
				echo" <td> ".$str."주차 : </td>";
				echo "<td colspan=3><textarea rows 20 cols=80 name=Plan$temp>$plan[$i]</textarea></td>";
			echo "</tr>";
		}
?>
	</table>

	<table align=center>
	<tr>
		<td><INPUT type="submit" style="width:100px; height:30px;" value=등록></td>
		<td><INPUT type="submit" formaction=LecturePlan(P).php style="width:100px; height:30px;" value=뒤로></td>			
		</form>
	</tr>
	</table>

</body>
</html>