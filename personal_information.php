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
        <!-- article_header -->
        <div id="article_head">
            <font size="5">��������</font>
        </div>

        <!-- article_subheader -->
        <div id="article_subhead">
            <font size="5">������������</font>
            <table align="right">
                <tr>
                    <td>
                        <form action="get_personal_information.php" method=post>
                            <input type="submit" name="��ȸ" value ="��ȸ">&nbsp;&nbsp;&nbsp;&nbsp;
                        </form>
                    </td>
                    <td>
                        <form action="set_personal_information.php" method=post>
                            <input type="submit" name="����" value ="����">&nbsp;&nbsp;&nbsp;&nbsp;
                        </form>
                    </td>
                </tr>
            </table>
        </div>
        ');

        if($_SESSION["userid"] == "�л�") {
            echo ('
            <div id="article_main">
            <center><strong>���������� ��ȭ��ȣ, �̸���, �ּ�, ���ּҸ� ������ �� �ֽ��ϴ�.</strong><br><br>
            
            �̸�&nbsp;<input type="text" name="name" readonly size="5">&nbsp;&nbsp;&nbsp;
            �а�&nbsp;<input type="text" name="subject" readonly size="10">&nbsp;&nbsp;&nbsp;
            �й�&nbsp;<input type="text" name="number" readonly size="10">&nbsp;&nbsp;&nbsp;
            �г�&nbsp;<input type="text" name="years" readonly size="1"><br><br>
            ��������&nbsp;<input type="text" name="get" readonly size="2">&nbsp;&nbsp;&nbsp;
            �̸���&nbsp;<input type="text" name="email" size="30">&nbsp;&nbsp;&nbsp;
            ��ȭ��ȣ&nbsp;<input type="text" name="phone" size="10"><br><br>
            �ּ�&nbsp;<input type="text" name="adress" size="60"><br><br>
            ���ּ�&nbsp;<input type="text" name="Dadress" size="60"><br><br>
            </center>
            </div>
		    ');	
        }
        else if($_SESSION["userid"] == "����") {
            echo ('
            <div id="article_main">
            <center>
            <strong>���������� ��ȭ��ȣ, �̸���, �ּ�, ���ּҸ� �ٲ� �� �ֽ��ϴ�.</strong><br><br>
            �̸�&nbsp;<input type="text" name="name" readonly size="5">
            �а�&nbsp;<input type="text" name="subject" readonly size="10">
            ���<input type="text" name="number" readonly size="10"><br><br><br>
            �̸���<input type="text" name="email" size="30">
            �ڵ���<input type="text" name="phone" size="10"><br><br>
            �ּ�<input type="text" name="adress" size="60"><br><br>
            ���ּ�<input type="text" name="Dadress" size="60"><br><br>
            </center>
            </div>
            ');
        }
    }
?>