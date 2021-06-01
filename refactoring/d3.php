<?
	session_start();
	
	global $con;
	global $table;
    global $errormsg;
	if($_SESSION['code']==''){
		echo("<script>self.close();</script>");
	}
	$con=mysql_connect('localhost', 'qwerty', '1234');
		mysql_select_db('webdb', $con);
    $table="Lecture";
	$query="delete from $table  where LID='$_SESSION[code]'";
	$result=mysql_query($query, $con);
	
	unset($_SESSION['code']);
?>
<script>self.close();</script>