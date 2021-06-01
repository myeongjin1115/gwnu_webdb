<?
	session_start();
	$ID = $_SESSION['userid'];

	if(isset($_POST["select"])){
		$database = "webdb";
		$table = "LecturePlan";
		$table1 = "Lecture";
		$connect = mysql_connect('localhost', 'qwerty', '1234')or die("mySQL 서버 연결 Error!");
		mysql_select_db($database, $connect);

		$LID=$_POST['select'];

		$query = "delete from $table where LID=$LID";
		$query1 = "update $table1 set LPID=0 where LID=$LID";
		$result = mysql_query($query, $connect);
		$result = mysql_query($query1, $connect);

		mysql_close($connect);
		print "<html><head><META http-equiv='refresh' content='0 url=./LecturePlan(P).php'></head></head>";
	} else
		print "<html><head><META http-equiv='refresh' content='0 url=./LecturePlan(P).php'></head></head>";
	
?>