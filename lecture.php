<?php
    if(!isset($_SESSION["userid"])) {
        echo('
        <script>
            alert("�α��� �� �̿��ϼ���.");
            window.location.href="/main.html";
        </script>
        ');
    }
    else if($_SESSION["userid"] === "�л�") {
        echo('
        <script>
            alert("���� ������ �����ϴ�!");
            window.location.href="/main.html";
        </script>
        ');
    }
    else if($_SESSION["userid"] === "����") {
        echo('
            <div id="article_head">
                <font size="5">���ǰ���</font>
            </div>

            <div id="article_subhead">
                <font size="5">���ǰ���</font>
                <table align="right">
                    <tr>
                        <td>
                            <form action="lecture_lookup.php" method="post">
                                <input type="submit" name="lookup" value="��ȸ">&nbsp;&nbsp;&nbsp;&nbsp;
                            </form>
                        </td>
                        <td>
                            <form action="lecture_create.php" target="_blank" method="post">
                                <input type="submit" name="create" value="���">&nbsp;&nbsp;&nbsp;&nbsp;
                            </form>
                        </td>
            <form action="lecture_update_delete.php" target="_blank" method="post">
                        <td>
                            <input type="submit" name="update_delete" value="����">&nbsp;&nbsp;&nbsp;&nbsp;
                        </td>
                        <td>
                            <input type="submit" name="update_delete" value="����">&nbsp;&nbsp;&nbsp;&nbsp;
                        </td>
                    </tr>
                </table>
            </div>

            <div id="article_main">
                
            </div>
            </form>
        ');
    }
?>
