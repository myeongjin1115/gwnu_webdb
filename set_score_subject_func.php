<?php
	session_start();
	$i = $_POST["num"];
	$subject = $_POST["subject"];
	//$SID[0] = $_POST["SID[0]"];
	//echo $SID[0];
	//get_score에서 $i(반복문변수), $subject(과목), $SID(학생번호), $score(학생의 점수)가 넘어와야함
	
	/* 테스트용 변수 */
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

		/* 원래 코드*/

    $con = mysql_connect('localhost', 'qwerty', '1234') or die("MySQL 서버 연결 Error");
    mysql_select_db('webdb', $con);
    for($a = 0; $a < $i ; $a++){	
		$SID[$a] = $_POST["SID$a"];
		$score[$a] = $_POST["score$a"];
		$query = "update Class set Score = $score[$a] where LID = (select LID from Lecture where LNAME = '$subject') and SID = '$SID[$a]' ";
		$result = mysql_query($query, $con);
    }
//테스트를 통해서 쿼리문과 결과는 바뀌는것을 확인하였습니다.
	
?>

<script>
		alert('성적이 부여되었습니다.');
		location.href = 'set_score.html';
 </script>