<?
	session_start();

	$database = "webdb";
	$table = "Lecture";
	$table_s = "Class";
	$connect = mysql_connect('localhost', 'qwerty', '1234')or die("mySQL ���� ���� Error!");
	mysql_select_db($database, $connect);

	if(!isset($_SESSION["userid"])) {
		echo('
        <script>
            alert("�α��� �� �̿��ϼ���.");
            window.location.href="/main.html";
        </script>
        ');
	}
	else if($_SESSION['userid']=='����'){		//�α����� ����� ���� �Ǵ� �л��� �����Ͽ� SQL ������ �ۼ�
		$ID = $_SESSION['userPID'];
		$query = "select LNAME, DayOfWeek, StartTime, EndTime from $table where PID='$ID'";
		$query1 = "select count(*) as cnt from $table where PID='$ID'";
		$result = mysql_query($query, $connect);
		$result1 = mysql_query($query1, $connect);

		$schedule = mysql_fetch_array($result);
		$num=mysql_fetch_array($result1);
	}
	else if($_SESSION["userid"] === "�л�") {
		$ID = $_SESSION['userSID'];
		$query = "select LID from $table_s where SID='$ID'";		//�л� ���� ���� �˻�
		$query1 = "select count(*) as cnt from $table_s where SID='$ID'";

		$result = mysql_query($query, $connect);
		$result1 = mysql_query($query1, $connect);

		$temp = mysql_fetch_array($result);
		$num=mysql_fetch_array($result1);

		$temp1 = $temp[0];	//LID
		$query2 = "select LNAME, DayOfWeek, StartTime, EndTime from $table where LID='$temp1'";		//�л� ���� ���� ���� lecture ���̺��� ���� ���� �˻�
		$result2 = mysql_query($query2, $connect);

		$schedule = mysql_fetch_array($result2);
	}

	if($_SESSION['userid']=='����'){		//�α����� ����� ���� �Ǵ� �л��� �����Ͽ� ������ �迭�� ����
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
					<th style=width:95px;></th>
					<th style=width:140px;>��</th>
					<th style=width:140px;>ȭ</th>
					<th style=width:140px;>��</th>
					<th style=width:140px;>��</th>
					<th style=width:140px;>��</th>
					<th style=width:140px;>��</th>
				</tr>
<?
				for($i=0; $i<20; $i++){		//�� ���ú� �� ĭ�� ����ϸ鼭 �ش�Ǵ� ������ ������ ���
					echo "<tr align=center>";
					echo "<td>".$i."����</td>";
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

