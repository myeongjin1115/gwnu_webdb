<?php
    if(!isset($_SESSION["userid"])) {
        // 시간표, 수강중인 과목 X
    }
    else {
        $today = date("Y-m-d");

        $con = mysql_connect("localhost", "qwerty", "1234")or die("mySQL 서버 연결 Error!");
        mysql_select_db("webdb", $con);
        $query = "select TID from term where StartDay <= '$today' and '$today' <= EndDay";
        $result = mysql_query($query, $con);
        if(!mysql_num_rows($result)) {
            $query = "select TID from term where StartDay=(select min(StartDay) from term where '$today' <= StartDay)";
            $result = mysql_query($query, $con);
        }
        $array = mysql_fetch_array($result);
        $TID = $array[0];

        if($_SESSION["userid"] === "교수"){		//로그인한 사람이 교수 또는 학생을 구분하여 SQL 쿼리문 작성
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
        $result = mysql_query($query, $con);
        $num = mysql_num_rows($result);
        $schedule = mysql_fetch_array($result);

        $lecture;
        for($i = 0; $i < $num; $i++) {
            for($j = 0; $j < 4; $j++) {
                $lecture[$i][$j] = $schedule[$j];
            }
            $schedule = mysql_fetch_array($result);
        }
    }
?>

<div id="main">
    <div id="clock">
        
    </div>

    <div id="timetable">
        <table border=1px>
            <tr>
                <td></td><td>월</td><td>화</td><td>수</td><td>목</td><td>금</td><td>토</td>
            </tr>
<?php
    for($i = 0; $i < 20; $i++) {
        echo('
            <tr>
                <td>'.$i.'교시</td>
        ');
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

    <div id="lecture">
<?php
    if($_SESSION["userid"] === "교수") {
        $query="select LNAME, RegisterLecture.LID
            from Lecture, RegisterLecture
            where PID='$_SESSION[userPID]' and TID='$TID' and RegisterLecture.LID=Lecture.LID";
        $result = mysql_query($query, $con);

        if(!mysql_num_rows($result)){
            
        }
        else {
            echo('
                <table>
                    <tr>
                        <td><center><strong>교과목명</strong></center></td>
                        <td><center><strong>과목코드</strong></center></td>
                    </tr>
            ');
            while($row=mysql_fetch_array($result)){
                echo('
                <tr>
                    <td><center>'.$row[0].'</center></td>
                    <td><center>'.$row[1].'</center></td>
                </tr>
                ');
            }  
            echo('
                </table>
            ');
        }
    }
    else if($_SESSION["userid"] === "학생") {
        $query="select LNAME, RegisterLecture.LID
            from Lecture, RegisterLecture, Class
            where Class.SID='$_SESSION[userSID]' and RegisterLecture.LID=Class.LID and TID='$TID' and RegisterLecture.LID=Lecture.LID";
        $result = mysql_query($query, $con);

        if(!mysql_num_rows($result)){
           
        }
        else {
            echo('
                <table>
                    <tr>
                        <td><center><strong>교과목명</strong></center></td>
                        <td><center><strong>과목코드</strong></center></td>
                    </tr>
            ');
            while($row=mysql_fetch_array($result)){
                echo('
                <tr>
                    <td><center>'.$row[0].'</center></td>
                    <td><center>'.$row[1].'</center></td>
                </tr>
                ');
            }  
            echo('
                </table>
            ');
        }
    }   
?>
    </div>
</div>