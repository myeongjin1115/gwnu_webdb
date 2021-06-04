<?
	session_start();

	$today = date("Y-m-d");

	$connect = mysql_connect('localhost', 'qwerty', '1234')or die("mySQL 서버 연결 Error!");
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
            alert("로그인 후 이용하세요.");
            window.location.href="/main.html";
        </script>
        ');
	}
	else if($_SESSION['userid'] === '교수'){		//로그인한 사람이 교수 또는 학생을 구분하여 SQL 쿼리문 작성
		$ID = $_SESSION['userPID'];
		$query = "select Lecture.LNAME, Lecture.DayOfWeek, Lecture.StartTime, Lecture.EndTime
			from Lecture, RegisterLecture 
			where Lecture.PID='$ID' and Lecture.LID = RegisterLecture.LID and RegisterLecture.TID='$TID'";
	}
	else if($_SESSION["userid"] === "학생") {
		$ID = $_SESSION['userSID'];
		$query = "select Lecture.LNAME, Lecture.DayOfWeek, Lecture.StartTime, Lecture.EndTime
			from Lecture, Class, RegisterLecture where Class.SID='$ID' and Class.LID=Lecture.LID
			and Class.LID=RegisterLecture.LID and RegisterLecture.TID='$TID'";		//학생 수강 과목 검색
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
        <font size="5">수업관리</font>
    </div>

    <!-- article subheader -->
    <div id="article_subhead">
        <font size="5">시간표 조회</font>
        <table align="right">
            <tr>
                <td>
                    <form action="timetable.php" method="post">
                        <input type="submit" name="" value="조회">
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
					<td style=width:140px;>월</td>
					<td style=width:140px;>화</td>
					<td style=width:140px;>수</td>
					<td style=width:140px;>목</td>
					<td style=width:140px;>금</td>
					<td style=width:140px;>토</td>
				</tr>
<?
				for($i=0; $i<20; $i++){		//각 교시별 한 칸씩 출력하면서 해당되는 수업이 있으면 출력
					echo "<tr align=center>";
					echo "<td>".$i."교시</td>";
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

