<?
	if(isset($_POST["select"]))
		$LID=$_POST['select'];
	else
		print "<html><head><META http-equiv='refresh' content='0 url=./LecturePlan(P).php'></head></head>";
?>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="./style.css">
</head>
<body>
	<form name="RegisterLecturePlan" action="Lecture_input_data.php" method="POST">	
	<table align=center border=1>
		<tr align=center>
			<td>강의 계획서 ID : </td>
			<td><INPUT type=text size=25 name=LPID></td>
			<td>강의코드 : </td>
<?			echo "<td><INPUT type=text size=25 name=LID value=$LID readonly></td>";?>
		</tr>
		<tr align=center>
			<td>교재 : </td>
			<td><INPUT type=text size=25 name=TextBook></td>
			<td>성적 반영 방법 : </td>
			<td><INPUT type=text size=25 name=HowToScore></td>
		</tr>
		<tr align=center>
			<td>수업목표 : </td>
			<td colspan=3><INPUT type=text size=77 name=Goal></td>
		</tr>
<?
		for($i=1;$i<16;$i++){
			echo "<tr align=center>";
				echo" <td> ".$i."주차 : </td>";
				echo "<td colspan=3><textarea rows 20 cols=80 name=Plan$i></textarea></td>";
			echo "</tr>";
		}
?>

	</table>
	<table align=center>
	<tr>
		<td><INPUT type="submit" style="width:100px; height:30px;" value=등록></td>
		<td><INPUT type="submit" formaction="LecturePlan(P).php" style="width:100px; height:30px;" value=뒤로></td>
		</form>
	</tr>
	</table>
</body>
</html>