<?php
    $con = mysql_connect('localhost', 'qwerty', '1234');
	$today = date("Y-m-d");
    mysql_select_db('webdb', $con);
    $query = "select TID, Tuition from term where RegDay <= '$today' and '$today' < StartDay";
    $result = mysql_query($query, $con);

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
            <br>
        ');

        if(!mysql_num_rows($result)) {
            echo('
                <p>���� �бⰡ �������̹Ƿ� ��ϱ��� ��µ��� �ʽ��ϴ�.</p>
                <p>��ϱ��� �б� ��û �Ⱓ���� ǥ��˴ϴ�.</p>
            ');
        }
        else {
            $row = mysql_fetch_array($result);
            $Tuition = $row[1];
            echo('
                <p>�б� ��ϱ��� '.$Tuition.'�Դϴ�.</p>
            ');
        }
        echo('
        </div>
        ');
    }
?>