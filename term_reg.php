<?php
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
            <font size="5">��ϰ���</font>
        </div>
    
        <!-- article subheader -->
        <div id="article_subhead">
            <font size="5">�б� ��� ��û</font>
            <table align="right">
                <tr>
                    <td>
                        <form action="term_reg_func.php" method="post">
                            <input type="submit" name="term_apply" value="��û">
                        </form>
                    </td>
                </tr>
            </table>
        </div>
    
        <!-- article main -->
        <div id="article_main">
            <p>���ǻ���</p>
            <p>�б� ����� ��û�Ͻðڽ��ϱ�?</p>
        </div>
        ');
    }
?>