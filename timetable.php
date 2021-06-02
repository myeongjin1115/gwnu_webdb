<?
	session_start();

	$database = "webdb";
	$table = "Lecture";
	$table_s = "Class";
	$connect = mysql_connect('localhost', 'qwerty', '1234')or die("mySQL 서버 연결 Error!");
	mysql_select_db($database, $connect);

	if(!isset($_SESSION["userid"])) {
		echo('
        <script>
            alert("로그인 후 이용하세요.");
            window.location.href="/main.html";
        </script>
        ');
	}
	else if($_SESSION['userid']=='교수'){		//로그인한 사람이 교수 또는 학생을 구분하여 SQL 쿼리문 작성
		$ID = $_SESSION['userPID'];
		$query = "select LNAME, DayOfWeek, StartTime, EndTime from $table where PID='$ID'";
		$query1 = "select count(*) as cnt from $table where PID='$ID'";
		$result = mysql_query($query, $connect);
		$result1 = mysql_query($query1, $connect);

		$schedule = mysql_fetch_array($result);
		$num=mysql_fetch_array($result1);
	}
	else if($_SESSION["userid"] === "학생") {
		$ID = $_SESSION['userSID'];
		$query = "select LID from $table_s where SID='$ID'";		//학생 수강 과목 검색
		$query1 = "select count(*) as cnt from $table_s where SID='$ID'";

		$result = mysql_query($query, $connect);
		$result1 = mysql_query($query1, $connect);

		$temp = mysql_fetch_array($result);
		$num=mysql_fetch_array($result1);

		$temp1 = $temp[0];	//LID
		$query2 = "select LNAME, DayOfWeek, StartTime, EndTime from $table where LID='$temp1'";		//학생 수강 과목에 대해 lecture 테이블에서 과목 정보 검색
		$result2 = mysql_query($query2, $connect);

		$schedule = mysql_fetch_array($result2);
	}

	if($_SESSION['userid']=='교수'){		//로그인한 사람이 교수 또는 학생을 구분하여 데이터 배열에 저장
		for($k=0;$k<$num[0] ;$k++){	
			for($j=0;$j<4;$j++)
				$lecture[$k][$j] = $schedule[$j];
			$schedule = mysql_fetch_array($result);
		}
	}else {
		for($k=0;$k<$num[0] ;$k++){
			for($j=0;$j<4;$j++)
				$lecture[$k][$j] = $schedule[$j];
			$temp = mysql_fetch_array($result);
			$temp1 = $temp[0];	//LID
			$query2 = "select LNAME, DayOfWeek, StartTime, EndTime from $table where LID='$temp1'";
			$result2 = mysql_query($query2, $connect);
			$schedule = mysql_fetch_array($result2);
		}
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
					<th style=width:95px;></th>
					<th style=width:140px;>월</th>
					<th style=width:140px;>화</th>
					<th style=width:140px;>수</th>
					<th style=width:140px;>목</th>
					<th style=width:140px;>금</th>
					<th style=width:140px;>토</th>
				</tr>
<?
				for($i=0; $i<20; $i++){		//각 교시별 한 칸씩 출력하면서 해당되는 수업이 있으면 출력
					echo "<tr align=center>";
					echo "<td>".$i."교시</td>";
					for($j=0; $j<6;$j++){
						for($k=0;$k<$num[0];$k++){
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

