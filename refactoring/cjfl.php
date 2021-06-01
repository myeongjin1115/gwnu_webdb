<?
	session_start();
	$con=mysql_connect("localhost", "qwerty", "1234");
	mysql_select_db("webdb", $con);
			
	$i;$count;$plus;
	$i=0;$count=(String)$count;
	$plus=$_POST[$i];
	while($i<17){
		if(!isset($plus)){
			$count=(String)$count.'6';
			$i++;
			$plus=$_POST[$i];
			continue;
		}
		$count=(String)$count.(String)$plus;
		$i++;
		$plus=$_POST[$i];
	}
	$a=(String)$_SESSION[LID];
	
	echo($_SESSION['LID']);
	$query="update class set Answer='$count'
			where LID= $a and SID='$_SESSION[userSID]'";
echo($query);
			$result=mysql_query($query, $con);
	
?>