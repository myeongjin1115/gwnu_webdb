<?php
	session_start();
	$i = $_POST["num"];
	$subject = $_POST["subject"];
	//$SID[0] = $_POST["SID[0]"];
	//echo $SID[0];
	//get_score���� $i(�ݺ�������), $subject(����), $SID(�л���ȣ), $score(�л��� ����)�� �Ѿ�;���
	
	/* �׽�Ʈ�� ���� */
	//$subject = 'WebDB';
	//$SID[0] = '20161486';
	//$score[0] = 4.5;
	//$SID[1] = '20000000';
	//$score[1] = 4.0;
	//$score[0] = $_POST['score0'];
	//echo $score[0];
	//$score[1] = $_POST['score1'];
	//echo $score[1];
	//for($a = 0; $a < 2 ; $a++){

		/* ���� �ڵ�*/

    $con = mysql_connect('localhost', 'qwerty', '1234') or die("MySQL ���� ���� Error");
    mysql_select_db('webdb', $con);
    for($a = 0; $a < $i ; $a++){	
		$SID[$a] = $_POST["SID$a"];
		$score[$a] = $_POST["score$a"];
		$query = "update Class set Score = $score[$a] where LID = (select LID from Lecture where LNAME = '$subject') and SID = '$SID[$a]' ";
		$result = mysql_query($query, $con);
    }
//�׽�Ʈ�� ���ؼ� �������� ����� �ٲ�°��� Ȯ���Ͽ����ϴ�.
	
?>

<script>
		alert('������ �ο��Ǿ����ϴ�.');
		location.href = 'set_score.html';
 </script>