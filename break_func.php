<?
	session_start();
	$today = date("Y-m-d");
    $con = mysql_connect("localhost", "qwerty", "1234");
	mysql_select_db("webdb", $con);
	#로그인 id가 학생일때 
	$query = "select TID from term where StartDay > '$today' and '$today' >= RegDay";
	$result1 = mysql_query($query, $con);
	$TID = mysql_fetch_array($result1);
	if(!mysql_num_rows($result1)){
		echo('
		<script>
		 alert("휴학기간이 아닙니다.") ;
		 window.location.replace("break.html");
		 </script>
		');
	}
	else if($_SESSION["userid"] == "학생"){
		$table = "student";
		$query = "select Attend from $table where SID='$_SESSION[userSID]'"; #학생 테이블 불러옴
		$result = mysql_query($query, $con);
		$row = mysql_fetch_array($result);
        
		if($row[0] === '0'){ #재학중인지 휴학중인지 비교
			echo ('
            <script>
                alert("이미 휴학중입니다.")
			    window.location.replace("break.html");
			</script>
            ');
		}
		$query="select * from RegisterStudent where TID='$TID[0]' and SID='$_SESSION[userSID]'";
		$result=mysql_query($query, $con);
		if(mysql_num_rows($result)){
			echo ('
            <script>
                alert("이미 학기에 등록되었습니다 학기 등록을 취소하고 휴학하세요.");
			    window.location.replace("break.html");
			</script>
            ');
		}else{
			$query = "update $table set Attend=0 where SID='$_SESSION[userSID]'"; #휴학중이 아니라면  휴학신청변경
			$result = mysql_query($query, $con); 
			echo ('
			<script>
				alert("휴학이 성공적으로 신청되었습니다.") 
				history.back();
			</script>
			');
		}
	} else {
		echo ('
        <script>
            alert("학생을 제외하고 휴학할 수 없습니다.")
			history.back();
		</script>
        ');
	}
	mysql_close();
?>