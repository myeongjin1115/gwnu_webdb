<?php
    session_start();

    if($_SESSION["userid"] === "����") {
        echo('
        <script>
            alert("������ �б���Ҹ� ��û�� �� �����ϴ�.");
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
                alert("��û ��� �Ⱓ�� �ƴմϴ�!");
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
                    alert("�б� ����� ����Ͽ����ϴ�!");
                    window.location.href="/main.html";
                </script>
                ');
            }
            else {
                echo('
                <script>
                    alert("��ϵ��� ���� �л��Դϴ�.");
                    window.location.href="/main.html";
                </script>
                ');
            }
        }
    }

    
?>