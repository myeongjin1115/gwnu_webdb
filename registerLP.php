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
			<td>���� ��ȹ�� ID : </td>
			<td><INPUT type=text size=25 name=LPID></td>
			<td>�����ڵ� : </td>
<?			echo "<td><INPUT type=text size=25 name=LID value=$LID readonly></td>";?>
		</tr>
		<tr align=center>
			<td>���� : </td>
			<td><INPUT type=text size=25 name=TextBook></td>
			<td>���� �ݿ� ��� : </td>
			<td><INPUT type=text size=25 name=HowToScore></td>
		</tr>
		<tr align=center>
			<td>������ǥ : </td>
			<td colspan=3><INPUT type=text size=77 name=Goal></td>
		</tr>
<?
		for($i=1;$i<16;$i++){
			echo "<tr align=center>";
				echo" <td> ".$i."���� : </td>";
				echo "<td colspan=3><textarea rows 20 cols=80 name=Plan$i></textarea></td>";
			echo "</tr>";
		}
?>

	</table>
	<table align=center>
	<tr>
		<td><INPUT type="submit" style="width:100px; height:30px;" value=���></td>
		<td><INPUT type="submit" formaction="LecturePlan(P).php" style="width:100px; height:30px;" value=�ڷ�></td>
		</form>
	</tr>
	</table>
</body>
</html>