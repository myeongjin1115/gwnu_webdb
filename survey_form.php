<?
	session_start();

    if(!$_POST["choice"]) {
        echo('
        <script>
            alert("�������縦 ������ ���Ǹ� �������ּ���!")
            self.close();
        </script>
        ');
    }
?>

<html>
    
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <form action="survey_func.php" method="post">
        <div id="article_subhead">
            <font size="5" align="center">��������</font>
            <input type="submit" value="�Ϸ�">
        </div>

        <div id="article_main" style="height: 1200px;">
<?php
	
$i=0;
$LID = $_POST["choice"];
echo "<input type = 'hidden' name ='choice' value=$LID>";
echo "<br><br>";
function checkbo($value){
    echo("
    <center>
    �ƴϴ�&nbsp;
    1&nbsp;<input type = 'radio' name =$value value='1'>&nbsp;
    2&nbsp;<input type = 'radio' name =$value value='2'>&nbsp;
    3&nbsp;<input type = 'radio' name =$value value='3'>&nbsp;
    4&nbsp;<input type = 'radio' name =$value value='4'>&nbsp;
    5&nbsp;<input type = 'radio' name =$value value='5'>&nbsp;
    �׷���</center><br>"
    );	
    $i=$i+1;
}
echo "�������� ������ ���� ǳ���� �������� ������ ������ �ִ�.";
checkbo(0);
echo "�������� �л��� ��¿� ���Ͽ� �������ֽŴ�.";
checkbo(1);
echo "�������� �л��鿡 ���Ͽ� ���� ������ ���δ�";
checkbo(2);
echo "�������� �л��鿡�� ������ Ī���� �ݷ��� ���ֽŴ�";
checkbo(3);
echo "�������� �л����� �ּ��� ����� ���ϵ��� ����ο��� �ֽŴ�.";
checkbo(4);
echo "���� ������ �� ��ǥ�� �׸� ���� �н� �ڷῡ ������ �ǹ̸� �ؼ��Ϸ��� ����Ѵ�.";
checkbo(5);
echo "���� �н��� ������ ������ �ܿ�⺸�� �� ������ ���� ���� �����غ���.";
checkbo(6);
echo "���� ������ �� ������ �κ��� ������ ���ĸƶ��� �ľ��Ͽ� ������ �����Ѵ�.";
checkbo(7);
echo "���� ������ �ذ��� �� �׻� �ؿԴ� ����� �ƴ� �ٸ� ����� ã�ƺ���.";
checkbo(8);
echo "���� �ٸ� ģ������ ��Ư�� �ǰ��� �����Ϸ��� ����Ѵ�.";
checkbo(9);
echo "���� ������ �ذ��� �� ����� ����ȭ�� ����� ����Ѵ�.";
checkbo(10);
echo "���� ������ �ذ��� �� ���� �����Ϳ� �ٰ��Ͽ� ����� �����Ѵ�.";
checkbo(11);
echo "���� �н� �ڷ� ������ �� ��Ȯ�� �ٰŸ� ���� ������ ������ ã�ƺ���.";
checkbo(12);
echo "���� �����ذ� �� ���� ���� �ڷḦ �ٰŷ� �Ͽ� ����� �����س��� ���̴�.";
checkbo(13);
echo "���� ����� �� ���� ���� �к��� �ǰ��� �ϳ��� �����Ͽ� ���ο� �ǰ��� �����Ѵ�.";
checkbo(14);
echo "���� ���� ���� ������ ��� �����ذῡ ���������� ������ �Ǵ� ����� �����Ϸ��� ����Ѵ�.";
checkbo(15);
echo "���� ���� ��� �ǰ��� ������� ������ �ϳ��� �ǰ����� �����Ѵ�.";
checkbo(16);
?>

        </div>
    </form>
</body>

</html>
