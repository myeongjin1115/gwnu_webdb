<?
	session_start();
	$today = date("Y-m-d");
	$con=mysql_connect("localhost", "qwerty", "1234");
	mysql_select_db("webdb", $con);
	$query = "select TID from term where StartDay > '$today' and '$today' >= RegDay";
	$result1 = mysql_query($query, $con);
	if((!mysql_num_rows($result1))){
		echo('
		<script>
		 alert("���бⰣ�� �ƴմϴ�.") ;
		 window.location.replace("go_back.html");
		 </script>
		');
	}
		#�л��̶�� student ���̺��� ������ ������ �������̶�� �޼����� �ƴϸ� �������� ����
	if($_SESSION["userid"] === "�л�"){
		$table="student";
		$query="select Attend from $table  where SID='$_SESSION[userSID]'";
		$result=mysql_query($query, $con);
		$row=mysql_fetch_array($result);

		if($row[0] === '1'){
			echo ('
            <script>
                alert("�̹� �������Դϴ�.");
			    window.location.replace("./go_back.html");
			</script>
            ');
		}
		
		
		$query="update $table set Attend=1 where SID='$_SESSION[userSID]'";
		$result=mysql_query($query, $con);
		echo('
        <script>
            alert("������ ���������� ��û�Ǿ����ϴ�.");
			history.back();
		</script>
        ');
	}
    else {	
		echo('
        <script>
            alert("�л��� �����ϰ� �����Ҽ� �����ϴ�");
			window.location.replace("./main.html");
		</script>
        ');
	}
?>