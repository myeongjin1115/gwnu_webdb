<?
	session_start();
	$today = date("Y-m-d");
    $con = mysql_connect("localhost", "qwerty", "1234");
	mysql_select_db("webdb", $con);
	#�α��� id�� �л��϶� 
	$query = "select TID from term where StartDay > '$today' and '$today' >= RegDay";
	$result1 = mysql_query($query, $con);
	$TID = mysql_fetch_array($result1);
	if(!mysql_num_rows($result1)){
		echo('
		<script>
		 alert("���бⰣ�� �ƴմϴ�.") ;
		 window.location.replace("break.html");
		 </script>
		');
	}
	else if($_SESSION["userid"] == "�л�"){
		$table = "student";
		$query = "select Attend from $table where SID='$_SESSION[userSID]'"; #�л� ���̺� �ҷ���
		$result = mysql_query($query, $con);
		$row = mysql_fetch_array($result);
        
		if($row[0] === '0'){ #���������� ���������� ��
			echo ('
            <script>
                alert("�̹� �������Դϴ�.")
			    window.location.replace("break.html");
			</script>
            ');
		}
		$query="select * from RegisterStudent where TID='$TID[0]' and SID='$_SESSION[userSID]'";
		$result=mysql_query($query, $con);
		if(mysql_num_rows($result)){
			echo ('
            <script>
                alert("�̹� �б⿡ ��ϵǾ����ϴ� �б� ����� ����ϰ� �����ϼ���.");
			    window.location.replace("break.html");
			</script>
            ');
		}else{
			$query = "update $table set Attend=0 where SID='$_SESSION[userSID]'"; #�������� �ƴ϶��  ���н�û����
			$result = mysql_query($query, $con); 
			echo ('
			<script>
				alert("������ ���������� ��û�Ǿ����ϴ�.") 
				history.back();
			</script>
			');
		}
	} else {
		echo ('
        <script>
            alert("�л��� �����ϰ� ������ �� �����ϴ�.")
			history.back();
		</script>
        ');
	}
	mysql_close();
?>