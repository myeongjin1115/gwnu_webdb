<?
	session_start();
	$con=mysql_connect('localhost', 'qwerty', '1234');
	mysql_select_db('webdb', $con);
	#�α��� id�� �л��϶� 
	if($_SESSION['userid']=='�л�'){
		$table="student";
		$query="select Attend from $table  where SID='$_SESSION[userSID]'"; #�л� ���̺� �ҷ���
		$result=mysql_query($query, $con);
		$row=mysql_fetch_array($result);
		if($row[0]==0){#���������� ���������� ��
			echo ("<script> alert('�̹� �������Դϴ�.')
			window.location.replace('b.php');
			</script>");
		}
		$query="update $table set Attend=0 where SID='$_SESSION[userSID]'"; #�������� �ƴ϶��  ���н�û����
		$result=mysql_query($query, $con); 
		echo ("<script> alert('������ ���������� ��û�Ǿ����ϴ�.') 
			history.back();
			</script>");
	}else{
		
		echo ("<script> alert('�л��� �����ϰ� �����Ҽ� �����ϴ�')
			history.back();
			</script>");
	}
?>