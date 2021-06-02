<?
function update_data($LPID, $LID, $TextBook, $HowToScore, $Goal, $Plan1, $Plan2, $Plan3, $Plan4, $Plan5, $Plan6, $Plan7, $Plan8, $Plan9, $Plan10, $Plan11, $Plan12, $Plan13, $Plan14, $Plan15){

	$database = "webdb";

	$connect=mysql_connect('localhost', 'qwerty', '1234')or die("mySQL 서버 연결 Error!");
	mysql_select_db($database, $connect);

    $query = "update LecturePlan set Textbook='$TextBook', HowToScore='$HowToScore', Goal='$Goal', W1=$Plan1, W2=$Plan2, W3=$Plan3, W4=$Plan4, W5=$Plan5, W6=$Plan6, W7=$Plan7, W8=$Plan8, W9=$Plan9, W10=$Plan10, W11=$Plan11, W12=$Plan12, W13=$Plan13, W14=$Plan14, W15=$Plan15";

	$result = mysql_query($query, $connect);
	mysql_close($connect);
    echo($TextBook.''.$HowToScore.''.$Goal);
?>

<html>

<body>
	<center>
	<font> 저장되었습니다.</font><br>

	<a href="LecturePlan(P).php"> 강의계획서 등록 페이지로 이동</a>
	</center>
</body>
</html>
<?
}

if(empty($_POST['mode'])){

	$LPID = $_POST['LPID'];
	$LID = $_POST['LID'];
	$TextBook = $_POST['TextBook'];
	$HowToScore = $_POST['HowToScore'];
	$Goal = $_POST['Goal'];
	$Plan1 = $_POST['Plan1'];
	$Plan2 = $_POST['Plan2'];
	$Plan3 = $_POST['Plan3'];
	$Plan4 = $_POST['Plan4'];
	$Plan5 = $_POST['Plan5'];
	$Plan6 = $_POST['Plan6'];
	$Plan7 = $_POST['Plan7'];
	$Plan8 = $_POST['Plan8'];
	$Plan9 = $_POST['Plan9'];
	$Plan10 = $_POST['Plan10'];
	$Plan11 = $_POST['Plan11'];
	$Plan12 = $_POST['Plan12'];
	$Plan13 = $_POST['Plan13'];
	$Plan14 = $_POST['Plan14'];
	$Plan15 = $_POST['Plan15'];

	$temp=addslashes($HowToScore);
	$HowToScore_len=strlen($temp);
	$temp=addslashes($Goal);
	$Goal_len=strlen($temp);
	$temp=addslashes($Plan1);
	$Plan1_len=strlen($temp);
	$temp=addslashes($Plan2);
	$Plan2_len=strlen($temp);
	$temp=addslashes($Plan3);
	$Plan3_len=strlen($temp);
	$temp=addslashes($Plan4);
	$Plan4_len=strlen($temp);
	$temp=addslashes($Plan5);
	$Plan5_len=strlen($temp);
	$temp=addslashes($Plan6);
	$Plan6_len=strlen($temp);
	$temp=addslashes($Plan7);
	$Plan7_len=strlen($temp);
	$temp=addslashes($Plan8);
	$Plan8_len=strlen($temp);
	$temp=addslashes($Plan9);
	$Plan9_len=strlen($temp);
	$temp=addslashes($Plan10);
	$Plan10_len=strlen($temp);
	$temp=addslashes($Plan11);
	$Plan11_len=strlen($temp);
	$temp=addslashes($Plan12);
	$Plan12_len=strlen($temp);
	$temp=addslashes($Plan13);
	$Plan13_len=strlen($temp);
	$temp=addslashes($Plan14);
	$Plan14_len=strlen($temp);
	$temp=addslashes($Plan15);
	$Plan15_len=strlen($temp);

	if($LPID==="") $error.="강의계획서 ID를 적지 않았습니다.<br>";
	if($LID==="") $error.="강의코드를 적지 않았습니다.<br>";
	if($TextBook==="") $error.="교재를 적지 않았습니다.<br>";
	if($HowToScore==="") $error.="성적 반영 방법을 적지 않았습니다.<br>";
	if($Goal==="") $error.="수업 목표를 적지 않았습니다.<br>";
	if($Plan1==="") $error.="1주차계획을 적지 않았습니다.<br>";
	if($Plan2==="") $error.="2주차계획을 적지 않았습니다.<br>";
	if($Plan3==="") $error.="3주차계획을 적지 않았습니다.<br>";
	if($Plan4==="") $error.="4주차계획을 적지 않았습니다.<br>";
	if($Plan5==="") $error.="5주차계획을 적지 않았습니다.<br>";
	if($Plan6==="") $error.="6주차계획을 적지 않았습니다.<br>";
	if($Plan7==="") $error.="7주차계획을 적지 않았습니다.<br>";
	if($Plan8==="") $error.="8주차계획을 적지 않았습니다.<br>";
	if($Plan9==="") $error.="9주차계획을 적지 않았습니다.<br>";
	if($Plan10==="") $error.="10주차계획을 적지 않았습니다.<br>";
	if($Plan11==="") $error.="11주차계획을 적지 않았습니다.<br>";
	if($Plan12==="") $error.="12주차계획을 적지 않았습니다.<br>";
	if($Plan13==="") $error.="13주차계획을 적지 않았습니다.<br>";
	if($Plan14==="") $error.="14주차계획을 적지 않았습니다.<br>";
	if($Plan15==="") $error.="15주차계획을 적지 않았습니다.<br>";

	if($HowToScore_len>=256) $error.="문제에서 다룰 주요 내용에 입력한 문자열이 너무 깁니다.<br> 저장하게 되면 255문자 이후는 저장되지 않습니다.<br>";
	if($Goal_len>=256) $error.="문제에서 다룰 주요 내용에 입력한 문자열이 너무 깁니다.<br> 저장하게 되면 255문자 이후는 저장되지 않습니다.<br>";
	if($Plan1_len>=256) $error.="문제에서 다룰 주요 내용에 입력한 문자열이 너무 깁니다.<br> 저장하게 되면 255문자 이후는 저장되지 않습니다.<br>";
	if($Plan2_len>=256) $error.="문제에서 다룰 주요 내용에 입력한 문자열이 너무 깁니다.<br> 저장하게 되면 255문자 이후는 저장되지 않습니다.<br>";
	if($Plan3_len>=256) $error.="문제에서 다룰 주요 내용에 입력한 문자열이 너무 깁니다.<br> 저장하게 되면 255문자 이후는 저장되지 않습니다.<br>";
	if($Plan4_len>=256) $error.="문제에서 다룰 주요 내용에 입력한 문자열이 너무 깁니다.<br> 저장하게 되면 255문자 이후는 저장되지 않습니다.<br>";
	if($Plan5_len>=256) $error.="문제에서 다룰 주요 내용에 입력한 문자열이 너무 깁니다.<br> 저장하게 되면 255문자 이후는 저장되지 않습니다.<br>";
	if($Plan6_len>=256) $error.="문제에서 다룰 주요 내용에 입력한 문자열이 너무 깁니다.<br> 저장하게 되면 255문자 이후는 저장되지 않습니다.<br>";
	if($Plan7_len>=256) $error.="문제에서 다룰 주요 내용에 입력한 문자열이 너무 깁니다.<br> 저장하게 되면 255문자 이후는 저장되지 않습니다.<br>";
	if($Plan8_len>=256) $error.="문제에서 다룰 주요 내용에 입력한 문자열이 너무 깁니다.<br> 저장하게 되면 255문자 이후는 저장되지 않습니다.<br>";
	if($Plan9_len>=256) $error.="문제에서 다룰 주요 내용에 입력한 문자열이 너무 깁니다.<br> 저장하게 되면 255문자 이후는 저장되지 않습니다.<br>";
	if($Plan10_len>=256) $error.="문제에서 다룰 주요 내용에 입력한 문자열이 너무 깁니다.<br> 저장하게 되면 255문자 이후는 저장되지 않습니다.<br>";
	if($Plan11_len>=256) $error.="문제에서 다룰 주요 내용에 입력한 문자열이 너무 깁니다.<br> 저장하게 되면 255문자 이후는 저장되지 않습니다.<br>";
	if($Plan12_len>=256) $error.="문제에서 다룰 주요 내용에 입력한 문자열이 너무 깁니다.<br> 저장하게 되면 255문자 이후는 저장되지 않습니다.<br>";
	if($Plan13_len>=256) $error.="문제에서 다룰 주요 내용에 입력한 문자열이 너무 깁니다.<br> 저장하게 되면 255문자 이후는 저장되지 않습니다.<br>";
	if($Plan14_len>=256) $error.="문제에서 다룰 주요 내용에 입력한 문자열이 너무 깁니다.<br> 저장하게 되면 255문자 이후는 저장되지 않습니다.<br>";
	if($Plan15_len>=256) $error.="문제에서 다룰 주요 내용에 입력한 문자열이 너무 깁니다.<br> 저장하게 되면 255문자 이후는 저장되지 않습니다.<br>";

	if($error !=""){
		echo "계획서 저장 오류<br>";
		print "<html>\n<body>\n";
		print "$error</td></tr></table></div></p>\n";
		print "<center>\n";
		print "<form action='./Lecture_input_data.php' method=post>\n";
		print "<input type='hidden' name='LPID' value='$LPID'>\n";
		print "<input type='hidden' name='LID' value='$LID'>\n";
		print "<input type='hidden' name='TextBook' value='$TextBook'>\n";
		print "<input type='hidden' name='HowToScore' value='$HowToScore'>\n";
		print "<input type='hidden' name='Goal' value='$Goal'>\n";
		print "<input type='hidden' name='Plan1' value='$Plan1'>\n";
		print "<input type='hidden' name='Plan2' value='$Plan2'>\n";
		print "<input type='hidden' name='Plan3' value='$Plan3'>\n";
		print "<input type='hidden' name='Plan4' value='$Plan4'>\n";
		print "<input type='hidden' name='Plan5' value='$Plan5'>\n";
		print "<input type='hidden' name='Plan6' value='$Plan6'>\n";
		print "<input type='hidden' name='Plan7' value='$Plan7'>\n";
		print "<input type='hidden' name='Plan8' value='$Plan8'>\n";
		print "<input type='hidden' name='Plan9' value='$Plan9'>\n";
		print "<input type='hidden' name='Plan10' value='$Plan10'>\n";
		print "<input type='hidden' name='Plan11' value='$Plan11'>\n";
		print "<input type='hidden' name='Plan12' value='$Plan12'>\n";
		print "<input type='hidden' name='Plan13' value='$Plan13'>\n";
		print "<input type='hidden' name='Plan14' value='$Plan14'>\n";
		print "<input type='hidden' name='Plan15' value='$Plan15'>\n";
		print "<input type='hidden' name='mode' value='input'>\n";
		print "<input type='button' value='다시입력' onClick=javascript:history.back()>\n</form></center>";
		print "</body>\n</html>\n";
	} else
		update_data($LPID, $LID, $TextBook, $HowToScore, $Goal, $Plan1, $Plan2, $Plan3, $Plan4, $Plan5, $Plan6, $Plan7, $Plan8, $Plan9, $Plan10, $Plan11, $Plan12, $Plan13, $Plan14, $Plan15);
		
}
else update_data($_POST['LPID'], $_POST['LID'], $_POST['TextBook'], $_POST['HowToScore'], $_POST['Goal'], $_POST['Plan1'], $_POST['Plan2'], $_POST['Plan3'], $_POST['Plan4'], $_POST['Plan5'], $_POST['Plan6'], $_POST['Plan7'], $_POST['Plan8'], $_POST['Plan9'], $_POST['Plan10'], $_POST['Plan11'], $_POST['Plan12'], $_POST['Plan13'], $_POST['Plan14'], $_POST['Plan15']);
?>

