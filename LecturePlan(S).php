<?
	session_start();
	$ID = $_SESSION['userid'];
	if($ID == '����')
		print "<html><head><META http-equiv='refresh' content='0 url=./LecturePlan(P).html'></head></head>";
	$database = "webdb";

	$connect = mysql_connect('localhost', 'qwerty', '1234')or die("mySQL ���� ���� Error!");
	mysql_select_db($database, $connect);

	$ID = $_SESSION['userSID'];	

	$query = "select * from class where SID=$ID";

	$result = mysql_query($query, $connect);
	$num=mysql_num_rows($result);
?>

<html>

<head>
    <link rel="stylesheet" type="text/css" href="./style.css">
</head>

<body>
    <!-- header -->
    <div id="header">
        <?php include "header.php";?>
    </div>

    <!-- navigator -->
    <div id="nav">
        <?php include "nav.php";?>
    </div>

    <!-- article -->
    <!-- article header -->
    <div id="article_head">
        <font size="5">��������</font>
    </div>

	<form action="LEcturePlan(S).php" method="post">	
    <!-- article subheader -->
    <div id="article_subhead">
        <font size="5">���ǰ�ȹ��</font>
        <table align="right">
            <tr>
                <td>
                    <input type="submit" name="" value="��ȸ">&nbsp;&nbsp;&nbsp;
                </td>
				<td>
                    <input type="submit" formaction="checkLP.php" value="Ȯ��">
                </td>
            </tr>
        </table>
    </div>

    <!-- article main -->
    <div id="article_main">
	<table align=center vertical-align=top width=800 height=400>
		<tr height=30 align=center>
			<th width=100>�����</th>
			<th width=100>�����ڵ�</th>
			<th width=100>����</th>
			<th width=100>���� ��ȹ�� ���� ����</th>
		</tr>
<?
	for($i=0; $i<$num; $i++){
		$source=mysql_fetch_array($result);
		$LID = $source[0];
		$query2 = "select LID, LNAME, Classification, LPID from Lecture where LID=$LID";
		$result2 = mysql_query($query2, $connect);
		$Lecture = mysql_fetch_array($result2);
		echo "<tr align=center>";
			echo "<td height=30 width=150>".$Lecture[1]."</td>";
			echo "<td height=30 width=50>".$Lecture[0]."</td>";
			if($Lecture[2]==0)
				echo "<td height=30 width=20>����</td>";
			else
				echo "<td height=30 width=20>����</td>";
			if($Lecture[3])
				echo "<td height=30 width=150>O</td>";
			else
				echo "<td height=30 width=150>X</td>";
			echo "<td height=30 width=150><INPUT type=radio name=select value=$Lecture[0]></td>";
		echo "</tr>";
	}
?>
	</table>
	</form>
    </div>
</body>

</html>