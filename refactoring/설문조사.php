<?
	$con=mysql_connect('localhost', 'qwerty', '1234');
		mysql_select_db('webdb', $con);
			$query="select distinct PNAME,class.LID,LNAME from class,Lecture,professor  
			where class.LID=lecture.LID and class.SID='$_SESSION[userSID]' and Lecture.PID=professor.PID";
			
			$result=mysql_query($query, $con);
		
		
	echo("
	
	<table>
		<tr>
		<td width=500><center><strong>교수명</strong></center></td>
		<td width=200><center><strong>과목코드</strong></center></td>
		<td><center><strong>과목이름</strong></center></td>
		<td></td>
		");
		while($row=mysql_fetch_array($result)){
			
			echo("
			<tr>
			<td width=500><center>'$row[0]'</center></td>
			<td><center>'$row[1]'</center></td>
			<td width=200><center>'$row[2]'<center></td>
			<td><input type='radio' name='choice'  value='$row[1]'</td>
			</tr>");
		}
	
	echo("</table>");
			
	

?>