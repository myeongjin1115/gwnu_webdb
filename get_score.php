<?
    if(!isset($_SESSION['userid'])) {
        echo('
        <script>
            alert("�α��� �� �̿��ϼ���.");
            window.location.href="/main.html";
        </script>
        ');
    }
    else {
        echo('
        <!-- article header -->
        <div id="article_head">
            <font size="5">��������</font>
        </div>

        <!-- article subheader -->
        <div id="article_subhead">
            <font size="5">����Ȯ��</font>
            <table align="right">
                <tr>
                    <td>
                        <form action="get_score_func.php" method="post">
                            <input type="submit" name="get_score" value="��ȸ">
                        </form>
                    </td>
                </tr>
            </table>
        </div>

        <!-- article main -->
        <div id="article_main">
        <center>��ȸ��ư�� ������ ������ Ȯ�ε˴ϴ�.</center>
        </div>
    ');
    }
?>