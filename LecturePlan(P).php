<?
	session_start();
	$ID = $_SESSION['userid'];
	if($ID == '학생')
		print "<html><head><META http-equiv='refresh' content='0 url=./LecturePlan(S).html'></head></head>";


	$database = "webdb";
	$table = "Lecture";
	$connect = mysql_connect('localhost', 'qwerty', '1234')or die("mySQL 서버 연결 Error!");
	mysql_select_db($database, $connect);

	$ID = $_SESSION['userPID'];
	$query = "select LID, LNAME, Classification, LPID from $table where PID='$ID'";
	$query1 = "select count(*) as cnt from $table where PID='$ID'";

	$result = mysql_query($query, $connect);
	$result1 = mysql_query($query1, $connect);

	$num=mysql_fetch_array($result1);
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
        <font size="5">수업관리</font>
    </div>

    <!-- article subheader -->
    <div id="article_subhead">
        <font size="5">강의계획서 등록</font>
        <table align="right">
            <tr>
                <td>
                    <form action="LecturePlan(P).php" method="post">
                        <input type="submit" name="" value="조회">
                    </form>
                </td>
	    <td>
                    <form action="registerLP.php" method="post">
                        <input type="submit" name="" value="생성">
	    </td>
	    <td>
                        <input type="submit" formaction="changeLP.php" name="" value="수정">
                </td>
	    <td>
                    <input formaction="deleteLP.php" type="submit" name="" value="삭제">
                </td>
            </tr>
        </table>
    </div>

    <!-- article main -->
    <div id="article_main">
	<table align=center vertical-align=top width=800 height=400>
		<tr height=30 align=center>
			<th width=100>과목명</th>
			<th width=100>과목코드</th>
			<th width=100>구분</th>
			<th width=100>수업 계획서 저장 여부</th>
		</tr>
<?
	for($i=0; $i<$num[0]; $i++){
		$Lecture = mysql_fetch_array($result);
		echo "<tr align=center>";
			echo "<td height=30 width=150>".$Lecture[1]."</td>";
			echo "<td height=30 width=50>".$Lecture[0]."</td>";
			if($Lecture[2]==0)
				echo "<td height=30 width=20>전공</td>";
			else
				echo "<td height=30 width=20>교양</td>";
			if($Lecture[3])
				echo "<td height=30 width=150><INPUT type=submit formaction=checkLP.php value=O style=background-color:transparent;  border:0px transparent solid;></td>";
			else
				echo "<td height=30 width=150><INPUT type=submit formaction=registerLP.php value=X style=background-color:transparent;  border:0px transparent solid;></td>";
			echo "<td height=30 width=150><INPUT type=radio name=select value=$Lecture[0]></td>";
		echo "</tr>";
	}
?>
	</form>
	</table>
    </div>
</body>

</html>
