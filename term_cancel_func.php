<?php
    session_start();

    if($_SESSION["userid"] === "교수") {
        echo('
        <script>
            alert("교수는 학기취소를 신청할 수 없습니다.");
            window.location.href="/main.html";
        </script>
        ');
    }
    else {
        $today = date("Y-m-d");

        $con = mysql_connect('localhost', 'qwerty', '1234');
        mysql_select_db('webdb', $con);
        $query = "select TID from term where RegDay <= '$today' and '$today' < StartDay";
        $result = mysql_query($query, $con);

        if(!mysql_num_rows($result)) {
            echo('
            <script>
                alert("신청 취소 기간이 아닙니다!");
                window.location.href="/main.html";
            </script>
            ');
        }
        else {
            $row = mysql_fetch_row($result);

            $sid = $_SESSION["userSID"];
            $termId = $row[0];

            $query = "select * from registerStudent where SID='$sid' and TID='$termId'";
            $result = mysql_query($query, $con);
            if(mysql_num_rows($result)) {
                $query = "delete from registerStudent where SID='$sid' and TID='$termId'";
                $result = mysql_query($query, $con);
                echo('
                <script>
                    alert("학기 등록을 취소하였습니다!");
                    window.location.href="/main.html";
                </script>
                ');
            }
            else {
                echo('
                <script>
                    alert("등록되지 않은 학생입니다.");
                    window.location.href="/main.html";
                </script>
                ');
            }
        }
    }

    
?>