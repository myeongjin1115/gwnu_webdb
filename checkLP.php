<?
	$database = "webdb";
	$connect = mysql_connect('localhost', 'qwerty', '1234')or die("mySQL 서버 연결 Error!");
	mysql_select_db($database, $connect);

	$LID=$_POST['select'];

	$query = "select * from LecturePlan where LID='$LID'";

	$result = mysql_query($query, $connect);

	if(!mysql_num_rows($result)) {
		echo('
		<script>
			alert("해당 강의는 계획서가 등록되어있지 않습니다!");
			window.location.href="./LecturePlan(S).php";
		</script>
		');
	}
	else {
		$plan = mysql_fetch_array($result);
	}
?>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="./style.css">
</head>

<body>
	<table align=center border=1>
<?
		echo "<tr align=center>";
			echo "<td>강의 계획서 ID : </td>";
			echo "<td><INPUT type=text size=25 name=LPID value=$plan[0] readonly></td>";
			echo "<td>강의코드 : </td>";
			echo "<td><INPUT type=text size=25 name=LID value=$plan[1] readonly></td>";
		echo "</tr>";
		echo "<tr align=center>";
			echo "<td>교재 : </td>";
			echo "<td><INPUT type=text size=25 name=TextBook value=$plan[2] readonly></td>";
			echo "<td>성적 반영 방법 : </td>";
			echo "<td><INPUT type=text size=25 name=HowToScore value=$plan[3] readonly></td>";
		echo "</tr>";
		echo "<tr align=center>";
			echo "<td>수업목표 : </td>";
			echo "<td colspan=3><INPUT type=text size=77 name=Goal value=$plan[4] readonly></td>";
		echo "</tr>";
		echo "<tr align=center>";

		echo "</tr>";
		for($i=5;$i<20;$i++){
			$num=(int)$i;
			$temp = $num-4;
			$str = (string)$temp;
			echo "<tr align=center>";
				echo" <td> ".$str."주차 : </td>";
				echo "<td colspan=3><textarea rows 20 cols=80 readonly>$plan[$i]</textarea></td>";
			echo "</tr>";
		}
?>
	</table>
	<table align=center>
	<tr>
		<form name="RegisterLecturePlan" action="LecturePlan(S).php" method="POST">	
<?		if($ID == '교수')
			echo "<td><INPUT type=submit style=width:100px; height:30px; value=뒤로></td>";
		else
			echo" <td><INPUT type=submit formaction=LecturePlan(S).php style=width:100px; height:30px; value=뒤로></td>";
?>		</form>

	</tr>
	</table>
</body>
</html>