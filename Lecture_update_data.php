<?
function update_data($LPID, $LID, $TextBook, $HowToScore, $Goal, $Plan1, $Plan2, $Plan3, $Plan4, $Plan5, $Plan6, $Plan7, $Plan8, $Plan9, $Plan10, $Plan11, $Plan12, $Plan13, $Plan14, $Plan15){

	$database = "webdb";

	$connect=mysql_connect('localhost', 'qwerty', '1234')or die("mySQL ���� ���� Error!");
	mysql_select_db($database, $connect);

    $query = "update LecturePlan set Textbook='$TextBook', HowToScore='$HowToScore', Goal='$Goal', W1=$Plan1, W2=$Plan2, W3=$Plan3, W4=$Plan4, W5=$Plan5, W6=$Plan6, W7=$Plan7, W8=$Plan8, W9=$Plan9, W10=$Plan10, W11=$Plan11, W12=$Plan12, W13=$Plan13, W14=$Plan14, W15=$Plan15";

	$result = mysql_query($query, $connect);
	mysql_close($connect);
    echo($TextBook.''.$HowToScore.''.$Goal);
?>

<html>

<body>
	<center>
	<font> ����Ǿ����ϴ�.</font><br>

	<a href="LecturePlan(P).php"> ���ǰ�ȹ�� ��� �������� �̵�</a>
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

	if($LPID==="") $error.="���ǰ�ȹ�� ID�� ���� �ʾҽ��ϴ�.<br>";
	if($LID==="") $error.="�����ڵ带 ���� �ʾҽ��ϴ�.<br>";
	if($TextBook==="") $error.="���縦 ���� �ʾҽ��ϴ�.<br>";
	if($HowToScore==="") $error.="���� �ݿ� ����� ���� �ʾҽ��ϴ�.<br>";
	if($Goal==="") $error.="���� ��ǥ�� ���� �ʾҽ��ϴ�.<br>";
	if($Plan1==="") $error.="1������ȹ�� ���� �ʾҽ��ϴ�.<br>";
	if($Plan2==="") $error.="2������ȹ�� ���� �ʾҽ��ϴ�.<br>";
	if($Plan3==="") $error.="3������ȹ�� ���� �ʾҽ��ϴ�.<br>";
	if($Plan4==="") $error.="4������ȹ�� ���� �ʾҽ��ϴ�.<br>";
	if($Plan5==="") $error.="5������ȹ�� ���� �ʾҽ��ϴ�.<br>";
	if($Plan6==="") $error.="6������ȹ�� ���� �ʾҽ��ϴ�.<br>";
	if($Plan7==="") $error.="7������ȹ�� ���� �ʾҽ��ϴ�.<br>";
	if($Plan8==="") $error.="8������ȹ�� ���� �ʾҽ��ϴ�.<br>";
	if($Plan9==="") $error.="9������ȹ�� ���� �ʾҽ��ϴ�.<br>";
	if($Plan10==="") $error.="10������ȹ�� ���� �ʾҽ��ϴ�.<br>";
	if($Plan11==="") $error.="11������ȹ�� ���� �ʾҽ��ϴ�.<br>";
	if($Plan12==="") $error.="12������ȹ�� ���� �ʾҽ��ϴ�.<br>";
	if($Plan13==="") $error.="13������ȹ�� ���� �ʾҽ��ϴ�.<br>";
	if($Plan14==="") $error.="14������ȹ�� ���� �ʾҽ��ϴ�.<br>";
	if($Plan15==="") $error.="15������ȹ�� ���� �ʾҽ��ϴ�.<br>";

	if($HowToScore_len>=256) $error.="�������� �ٷ� �ֿ� ���뿡 �Է��� ���ڿ��� �ʹ� ��ϴ�.<br> �����ϰ� �Ǹ� 255���� ���Ĵ� ������� �ʽ��ϴ�.<br>";
	if($Goal_len>=256) $error.="�������� �ٷ� �ֿ� ���뿡 �Է��� ���ڿ��� �ʹ� ��ϴ�.<br> �����ϰ� �Ǹ� 255���� ���Ĵ� ������� �ʽ��ϴ�.<br>";
	if($Plan1_len>=256) $error.="�������� �ٷ� �ֿ� ���뿡 �Է��� ���ڿ��� �ʹ� ��ϴ�.<br> �����ϰ� �Ǹ� 255���� ���Ĵ� ������� �ʽ��ϴ�.<br>";
	if($Plan2_len>=256) $error.="�������� �ٷ� �ֿ� ���뿡 �Է��� ���ڿ��� �ʹ� ��ϴ�.<br> �����ϰ� �Ǹ� 255���� ���Ĵ� ������� �ʽ��ϴ�.<br>";
	if($Plan3_len>=256) $error.="�������� �ٷ� �ֿ� ���뿡 �Է��� ���ڿ��� �ʹ� ��ϴ�.<br> �����ϰ� �Ǹ� 255���� ���Ĵ� ������� �ʽ��ϴ�.<br>";
	if($Plan4_len>=256) $error.="�������� �ٷ� �ֿ� ���뿡 �Է��� ���ڿ��� �ʹ� ��ϴ�.<br> �����ϰ� �Ǹ� 255���� ���Ĵ� ������� �ʽ��ϴ�.<br>";
	if($Plan5_len>=256) $error.="�������� �ٷ� �ֿ� ���뿡 �Է��� ���ڿ��� �ʹ� ��ϴ�.<br> �����ϰ� �Ǹ� 255���� ���Ĵ� ������� �ʽ��ϴ�.<br>";
	if($Plan6_len>=256) $error.="�������� �ٷ� �ֿ� ���뿡 �Է��� ���ڿ��� �ʹ� ��ϴ�.<br> �����ϰ� �Ǹ� 255���� ���Ĵ� ������� �ʽ��ϴ�.<br>";
	if($Plan7_len>=256) $error.="�������� �ٷ� �ֿ� ���뿡 �Է��� ���ڿ��� �ʹ� ��ϴ�.<br> �����ϰ� �Ǹ� 255���� ���Ĵ� ������� �ʽ��ϴ�.<br>";
	if($Plan8_len>=256) $error.="�������� �ٷ� �ֿ� ���뿡 �Է��� ���ڿ��� �ʹ� ��ϴ�.<br> �����ϰ� �Ǹ� 255���� ���Ĵ� ������� �ʽ��ϴ�.<br>";
	if($Plan9_len>=256) $error.="�������� �ٷ� �ֿ� ���뿡 �Է��� ���ڿ��� �ʹ� ��ϴ�.<br> �����ϰ� �Ǹ� 255���� ���Ĵ� ������� �ʽ��ϴ�.<br>";
	if($Plan10_len>=256) $error.="�������� �ٷ� �ֿ� ���뿡 �Է��� ���ڿ��� �ʹ� ��ϴ�.<br> �����ϰ� �Ǹ� 255���� ���Ĵ� ������� �ʽ��ϴ�.<br>";
	if($Plan11_len>=256) $error.="�������� �ٷ� �ֿ� ���뿡 �Է��� ���ڿ��� �ʹ� ��ϴ�.<br> �����ϰ� �Ǹ� 255���� ���Ĵ� ������� �ʽ��ϴ�.<br>";
	if($Plan12_len>=256) $error.="�������� �ٷ� �ֿ� ���뿡 �Է��� ���ڿ��� �ʹ� ��ϴ�.<br> �����ϰ� �Ǹ� 255���� ���Ĵ� ������� �ʽ��ϴ�.<br>";
	if($Plan13_len>=256) $error.="�������� �ٷ� �ֿ� ���뿡 �Է��� ���ڿ��� �ʹ� ��ϴ�.<br> �����ϰ� �Ǹ� 255���� ���Ĵ� ������� �ʽ��ϴ�.<br>";
	if($Plan14_len>=256) $error.="�������� �ٷ� �ֿ� ���뿡 �Է��� ���ڿ��� �ʹ� ��ϴ�.<br> �����ϰ� �Ǹ� 255���� ���Ĵ� ������� �ʽ��ϴ�.<br>";
	if($Plan15_len>=256) $error.="�������� �ٷ� �ֿ� ���뿡 �Է��� ���ڿ��� �ʹ� ��ϴ�.<br> �����ϰ� �Ǹ� 255���� ���Ĵ� ������� �ʽ��ϴ�.<br>";

	if($error !=""){
		echo "��ȹ�� ���� ����<br>";
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
		print "<input type='button' value='�ٽ��Է�' onClick=javascript:history.back()>\n</form></center>";
		print "</body>\n</html>\n";
	} else
		update_data($LPID, $LID, $TextBook, $HowToScore, $Goal, $Plan1, $Plan2, $Plan3, $Plan4, $Plan5, $Plan6, $Plan7, $Plan8, $Plan9, $Plan10, $Plan11, $Plan12, $Plan13, $Plan14, $Plan15);
		
}
else update_data($_POST['LPID'], $_POST['LID'], $_POST['TextBook'], $_POST['HowToScore'], $_POST['Goal'], $_POST['Plan1'], $_POST['Plan2'], $_POST['Plan3'], $_POST['Plan4'], $_POST['Plan5'], $_POST['Plan6'], $_POST['Plan7'], $_POST['Plan8'], $_POST['Plan9'], $_POST['Plan10'], $_POST['Plan11'], $_POST['Plan12'], $_POST['Plan13'], $_POST['Plan14'], $_POST['Plan15']);
?>

