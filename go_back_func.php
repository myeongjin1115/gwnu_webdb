<?
	session_start();
	$con=mysql_connect("localhost", "qwerty", "1234");
	mysql_select_db("webdb", $con);
		
		#학생이라면 student 테이블을 가져와 비교한후 재학중이라면 메세지만 아니면 재학으로 변경
	if($_SESSION["userid"] === "학생"){
		$table="student";
		$query="select Attend from $table  where SID='$_SESSION[userSID]'";
		$result=mysql_query($query, $con);
		$row=mysql_fetch_array($result);

		if($row[0] === '1'){
			echo ('
            <script>
                alert("이미 재학중입니다.");
			    window.location.replace("./go_back.html");
			</script>
            ');
		}

		$query="update $table set Attend=1 where SID='$_SESSION[userSID]'";
		$result=mysql_query($query, $con);
		echo('
        <script>
            alert("복학이 성공적으로 신청되었습니다.");
			history.back();
		</script>
        ');
	}
    else {	
		echo('
        <script>
            alert("학생을 제외하고 휴학할수 없습니다");
			window.location.replace("./main.html");
		</script>
        ');
	}
?>