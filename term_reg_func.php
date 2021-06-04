<?
    session_start();

    if($_SESSION["userid"] === "교수") {
        echo('
        <script>
            alert("교수는 학기등록을 신청할 수 없습니다.");
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
                alert("신청 기간이 아닙니다");
                window.location.href="/main.html";
            </script>
            ');
        }
        else {
            $row = mysql_fetch_row($result);

            $termId = $row[0];
            $sid = $_SESSION["userSID"];

            $query = "select Attend from student where SID='$sid'";
            $result = mysql_query($query, $con);

            $row = mysql_fetch_row($result);
            $attend = $row[0];
            if($attend == '0') {
                echo('
                <script type="text/javascript" charset="utf-8">
                    alert("복학을 먼저 신청해주세요!");
                    window.location.href="/go_back.html";
                </script>
                ');
            }
            else {
                $query = "select * from registerStudent where SID='$sid' and TID='$termId'";
                $result = mysql_query($query, $con);
				
                if(mysql_num_rows($result)) {
                    echo('
                    <script>
                        alert("이미 등록된 학생입니다!");
                        window.location.href="/main.html";
                    </script>
                    ');
                }
                else {
                    $query = "insert into registerStudent values('$termId', '$sid')";
                    $result = mysql_query($query, $con);
                    echo('
                    <script>
                        alert("학기 등록에 성공하였습니다!");
                        window.location.href="/main.html";
                    </script>
                    ');
                }
            }
        }
    }
?>