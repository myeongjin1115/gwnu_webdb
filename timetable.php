<?
	session_start();

	$today = date("Y-m-d");

	$connect = mysql_connect('localhost', 'qwerty', '1234')or die("mySQL ���� ���� Error!");
	mysql_select_db("webdb", $connect);
	$query = "select TID from term where StartDay <= '$today' and '$today' <= EndDay";
	$result = mysql_query($query, $connect);
	if(!mysql_num_rows($result)) {
		$query = "select TID from term where StartDay=(select min(StartDay) from term where '$today' <= StartDay)";
		$result = mysql_query($result);
	}
	$array = mysql_fetch_array($result);
	$TID = $array[0];

	if(!isset($_SESSION["userid"])) {
		echo('
        <script>
            alert("�α��� �� �̿��ϼ���.");
            window.location.href="/main.html";
        </script>
        ');
	}
	else if($_SESSION['userid'] === '����'){		//�α����� ����� ���� �Ǵ� �л��� �����Ͽ� SQL ������ �ۼ�
		$ID = $_SESSION['userPID'];
		$query = "select Lecture.LNAME, Lecture.DayOfWeek, Lecture.StartTime, Lecture.EndTime
			from Lecture, RegisterLecture 
			where Lecture.PID='$ID' and Lecture.LID = RegisterLecture.LID and RegisterLecture.TID='$TID'";
	}
	else if($_SESSION["userid"] === "�л�") {
		$ID = $_SESSION['userSID'];
		$query = "select Lecture.LNAME, Lecture.DayOfWeek, Lecture.StartTime, Lecture.EndTime
			from Lecture, Class, RegisterLecture where Class.SID='$ID' and Class.LID=Lecture.LID
			and Class.LID=RegisterLecture.LID and RegisterLecture.TID='$TID'";		//�л� ���� ���� �˻�
	}
	$result = mysql_query($query, $connect);
	$num = mysql_num_rows($result);

	$schedule = mysql_fetch_array($result);

	$lecture;
	for($i = 0; $i < $num; $i++) {
		for($j = 0; $j < 4; $j++) {
			$lecture[$i][$j] = $schedule[$j];
		}
		$schedule = mysql_fetch_array($result);
	}
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

    <!-- article subheader -->
    <div id="article_subhead">
        <font size="5">�ð�ǥ ��ȸ</font>
        <table align="right">
            <tr>
                <td>
                    <form action="timetable.php" method="post">
                        <input type="submit" name="" value="��ȸ">
                    </form>
                </td>
            </tr>
        </table>
    </div>

    <!-- article main -->
    <div id="article_main">
			<table align=center border=1px bgcolor=white>
				<tr align=center>
					<td style=width:95px;></td>
					<td style=width:140px;>��</td>
					<td style=width:140px;>ȭ</td>
					<td style=width:140px;>��</td>
					<td style=width:140px;>��</td>
					<td style=width:140px;>��</td>
					<td style=width:140px;>��</td>
				</tr>
<?
				for($i=0; $i<20; $i++){		//�� ���ú� �� ĭ�� ����ϸ鼭 �ش�Ǵ� ������ ������ ���
					echo "<tr align=center>";
					echo "<td>".$i."����</td>";
					for($j=0; $j<6; $j++){
						for($k=0; $k<$num; $k++){
							if($lecture[$k][1]==$j){
								if($i>=$lecture[$k][2] && $i<=$lecture[$k][3]){
									echo "<td>".$lecture[$k][0]."</td>";
									$j++;
								}else
									continue;
							} else 
								continue;
						}
							echo "<td></td>";
					}
					echo "</tr>";
				}
?>
			</table>
    </div>
</body>

</html>

