<?
    if(!isset($_SESSION['userid'])) {
        echo('
        <script>
            alert("�α��� �� �̿��ϼ���.");
            window.location.href="/main.html";
        </script>
        ');
    }
    else if($_SESSION["userid"] === "�л�"){
        echo('
        <script>
            alert("������ �̿� �����մϴ�.");
            window.location.href="/main.html";
        </script>
        ');
    }
    else if($_SESSION["userid"] === "����") {
        echo('
        <!-- article header -->
        <div id="article_head">
            <font size="5">��������</font>
        </div>

        <!-- article subheader -->
        <div id="article_subhead">
            <font size="5">�����ο�</font>
            <table align="right">
                <tr>
                    <td>
                        <form action="set_score_subjects.php" method="post">
                            <input type="submit" name="get_subject" value="��ȸ">
                        </form>
                    </td>
                </tr>
            </table>
        </div>

        <!-- article main -->
        <div id="article_main">
        <center>��ȸ��ư�� ������ �������� ��ȸ�˴ϴ�.</center>
        </div>
    ');
    }
?>