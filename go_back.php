<?php
    if(!isset($_SESSION["userid"])) {
        echo ('
        <script>
            alert("�α��� �� �̿��ϼ���.");
            window.location.href="/main.html";
        </script>
        ');
    }
    else if($_SESSION["userid"] === "����") {
        echo ('
        <script>
            alert("������ ������ �� �����ϴ�.");
            window.location.href="/main.html";
        </script>
        ');
    }
    else if($_SESSION["userid"] === "�л�") {
        echo('
        <div id="article_head">
            <font size="5">��������</font>
        </div>

        <div id="article_subhead">
            <font size="5">���н�û</font>
            <form action="go_back_func.php" method="post"> <!--���н�û -->
                <input type="submit" name="����" value ="����">
            </form>
        </div>

        <div id="article_main">
            <font size="6">���� ��û�� ���ǻ���</font>
            <ul style="width: 800px;">
                <li>���� ���°� ���л��¿����� ��û�� �����մϴ�</li>
            </ul>
        </div>
        ');
    }
?>