<?
	session_start();
	
	global $con;
	global $table;
    global $errormsg;
	

        	
	
?>
<html><head>

 <style>
  input[type=text]{
  
  font-size:20px;
}</style>
<link rel="stylesheet" type="text/css" href="style.css">
 </head>
<body>
<form action="d1-1.php" method=post>
<div id='article_main'>
	<center>
	���� ��ȹ�� �ۼ�
	<br><br><br>
	�����̸�<input type = 'text' name='PNAME' value="<? echo $_SESSION['username'] ?>" readonly size='5'>&nbsp;&nbsp;&nbsp; 
	�����ڵ�<input type = 'text' name ='LID'  size='10' >&nbsp;&nbsp;&nbsp;
	���Ǹ�<input type = 'text' name ='LNAME'   size='20'>&nbsp;&nbsp;&nbsp;<br>
	����<input type = 'radio' name ='Classification' value="0">&nbsp;&nbsp;&nbsp;
	������<input type = 'radio' name ='Classification' value="1">&nbsp;&nbsp;&nbsp;<br>
	����<input type = 'text' name ='Personnel'   size='2'>&nbsp;&nbsp;&nbsp;
	����
	<select name='DayOfWeek'>
    <option value="0">��</option>   
    <option value="1">ȭ</option> 
    <option value="2">��</option> 
	<option value="3">��</option> 
	<option value="4">��</option> 
	<option value="5">��</option> 
	<option value="6">��</option>   
	</select>
	���۽ð�<select name='StartTime'>
    <option value="0">0����</option>   
    <option value="1">1����</option> 
    <option value="2">2����</option> 
	<option value="3">3����</option> 
	<option value="4">4����</option> 
	<option value="5">5����</option> 
	<option value="6">6����</option>
	<option value="7">7����</option>   
	<option value="8">8����</option>   
	<option value="9">9����</option>   
	<option value="10">10����</option>   
	<option value="11">11����</option>   
	<option value="12">12����</option>   
	<option value="13">13����</option>   
	<option value="14">14����</option>   
	<option value="15">15����</option>   
	<option value="16">16����</option>   
	<option value="17">17����</option>   
	<option value="18">18����</option> 
	<option value="19">19����</option>   	
	</select>
	����ð�<select name='EndTime'>
    <option value="0">0����</option>   
    <option value="1">1����</option> 
    <option value="2">2����</option> 
	<option value="3">3����</option> 
	<option value="4">4����</option> 
	<option value="5">5����</option> 
	<option value="6">6����</option>
	<option value="7">7����</option>   
	<option value="8">8����</option>   
	<option value="9">9����</option>   
	<option value="10">10����</option>   
	<option value="11">11����</option>   
	<option value="12">12����</option>   
	<option value="13">13����</option>   
	<option value="14">14����</option>   
	<option value="15">15����</option>   
	<option value="16">16����</option>   
	<option value="17">17����</option>   
	<option value="18">18����</option> 
	<option value="19">19����</option>    
	</select><br>
	�������<input type = 'text' name ='Credit'  size='2'>&nbsp;&nbsp;&nbsp;
	���ǽ�<input type = 'text' name ='Room'  size='5'>&nbsp;&nbsp;&nbsp;
	���ǰ�ȹ��<input type = 'text' name ='LPID'  size='30'>&nbsp;&nbsp;&nbsp;
	<input type="submit" onclick=opener.parent.location.reload() name="����" value ="����">
	</center>
	
</form>
</div>


</body>
</html>