<?
	session_start();
	$con=mysql_connect('localhost', 'qwerty', '1234');
	mysql_select_db('webdb', $con);
	#로그인 id가 학생일때 
	if($_SESSION['userid']=='학생'){
		$table="student";
		$query="select Attend from $table  where SID='$_SESSION[userSID]'"; #학생 테이블 불러옴
		$result=mysql_query($query, $con);
		$row=mysql_fetch_array($result);
		if($row[0]==0){#재학중인지 휴학중인지 비교
			echo ("<script> alert('이미 휴학중입니다.')
			window.location.replace('b.php');
			</script>");
		}
		$query="update $table set Attend=0 where SID='$_SESSION[userSID]'"; #휴학중이 아니라면  휴학신청변경
		$result=mysql_query($query, $con); 
		echo ("<script> alert('휴학이 성공적으로 신청되었습니다.') 
			history.back();
			</script>");
	}else{
		
		echo ("<script> alert('학생을 제외하고 휴학할수 없습니다')
			history.back();
			</script>");
	}
?>