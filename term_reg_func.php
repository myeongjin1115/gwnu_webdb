<?
    session_start();

    if($_SESSION["userid"] === "����") {
        echo('
        <script>
            alert("������ �б����� ��û�� �� �����ϴ�.");
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
                alert("��û �Ⱓ�� �ƴմϴ�");
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
                    alert("������ ���� ��û���ּ���!");
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
                        alert("�̹� ��ϵ� �л��Դϴ�!");
                        window.location.href="/main.html";
                    </script>
                    ');
                }
                else {
                    $query = "insert into registerStudent values('$termId', '$sid')";
                    $result = mysql_query($query, $con);
                    echo('
                    <script>
                        alert("�б� ��Ͽ� �����Ͽ����ϴ�!");
                        window.location.href="/main.html";
                    </script>
                    ');
                }
            }
        }
    }
?>