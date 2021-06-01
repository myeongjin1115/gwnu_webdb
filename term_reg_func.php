<?php
    $today = date("Y-m-d");

    $con = mysql_connect('localhost', 'qwerty', '1234');
    mysql_select_db('webdb', $con);
    $query = "select StartDay, EndDay from term where '$today' >= startDay and '$today' <= EndDay";
    $result = mysql_query($query, $con);

    if(mysql_num_rows($result)) {
        echo('
        <script>
            alert("신청 기간이 아닙니다!");
            window.location.href="/main.html";
        </script>
        ');
    }
    else {
        $query = "select TID, StartDay, EndDay from term where StartDay=(select min(StartDay) from term where '$today' <= StartDay)";
        $result = mysql_query($query, $con);
        $row = mysql_fetch_row($result);

        $termId = $row[0];
        $startDay = $row[1];
        $endDay = $row[2];

        $query = "select * from registerStudent where SID=$sid and TID=$termId";
        $result = mysql_query($query, $con);
        if(mysql_num_rows($result)) {
            echo('
            <script>
                alert("이미 등록된 학생입니다.");
                window.location.href="/main.html";
            </script>
            ');
        }
        else {
            $query = "insert into registerStudent values($termId, $sid)";
            $result = mysql_query($query, $con);
            echo('
            <script>
                alert("학기 등록에 성공하였습니다!");
                window.location.href="/main.html";
            </script>
            ');
        }
    }
?>