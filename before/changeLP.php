<?
	session_start();
	$ID = $_SESSION['userid'];

	if(isset($_POST["select"])){
		$database = "webdb";
		$table = "LecturePlan";
		$connect = mysql_connect('localhost', 'qwerty', '1234')or die("mySQL ���� ���� Error!");
		mysql_select_db($database, $connect);

		$LID=$_POST['select'];

		$query = "select * from $table where LID=$LID";

		$result = mysql_query($query, $connect);

		$plan = mysql_fetch_array($result);

		print "<html><head><META http-equiv='refresh' content='0 url=./LecturePlan(P).php'></head></head>";
	
?>


<html>
<head>
    <link rel="stylesheet" type="text/css" href="./style.css">
</head>
<body>
	<table align=center border=1>
<?
		echo "<tr align=center>";
			echo "<td>���� ��ȹ�� ID : </td>";
			echo "<td><INPUT type=text size=25 name=LPID value=$plan[0]></td>";
			echo "<td>�����ڵ� : </td>";
			echo "<td><INPUT type=text size=25 name=LID value=$plan[1]></td>";
		echo "</tr>";
		echo "<tr align=center>";
			echo "<td>���� : </td>";
			echo "<td><INPUT type=text size=25 name=TextBook value=$plan[2]></td>";
			echo "<td>���� �ݿ� ��� : </td>";
			echo "<td><INPUT type=text size=25 name=HowToScore value=$plan[3]></td>";
		echo "</tr>";
		echo "<tr align=center>";
			echo "<td>������ǥ : </td>";
			echo "<td colspan=3><INPUT type=text size=77 name=Goal value=$plan[4]></td>";
		echo "</tr>";
		echo "<tr align=center>";

		echo "</tr>";
		for($i=5;$i<20;$i++){
			$num=(int)$i;
			$temp = $num-4;
			$str = (string)$temp;
			echo "<tr align=center>";
				echo" <td> ".$str."���� : </td>";
				echo "<td colspan=3><textarea rows 20 cols=80>$plan[$i]</textarea></td>";
			echo "</tr>";
		}
?>
	</table>

	<table align=center>
	<tr>
		<form name="RegisterLecturePlan" action="Lecture_input_data.php" method="POST">	
		<td><INPUT type="submit" style="width:100px; height:30px;" value=���></td>
		</form>
		<form name="RegisterLecturePlan" action="LecturePlan(P).php" method="POST">
		<td><INPUT type="submit" style="width:100px; height:30px;" value=�ڷ�></td>			
		</form>
	</tr>
	</table>

</body>
</html>