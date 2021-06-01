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
	강의 계획서 작성
	<br><br><br>
	교수이름<input type = 'text' name='PNAME' value="<? echo $_SESSION['username'] ?>" readonly size='5'>&nbsp;&nbsp;&nbsp; 
	강의코드<input type = 'text' name ='LID'  size='10' >&nbsp;&nbsp;&nbsp;
	강의명<input type = 'text' name ='LNAME'   size='20'>&nbsp;&nbsp;&nbsp;<br>
	전공<input type = 'radio' name ='Classification' value="0">&nbsp;&nbsp;&nbsp;
	비전공<input type = 'radio' name ='Classification' value="1">&nbsp;&nbsp;&nbsp;<br>
	정원<input type = 'text' name ='Personnel'   size='2'>&nbsp;&nbsp;&nbsp;
	요일
	<select name='DayOfWeek'>
    <option value="0">월</option>   
    <option value="1">화</option> 
    <option value="2">수</option> 
	<option value="3">목</option> 
	<option value="4">금</option> 
	<option value="5">토</option> 
	<option value="6">일</option>   
	</select>
	시작시간<select name='StartTime'>
    <option value="0">0교시</option>   
    <option value="1">1교시</option> 
    <option value="2">2교시</option> 
	<option value="3">3교시</option> 
	<option value="4">4교시</option> 
	<option value="5">5교시</option> 
	<option value="6">6교시</option>
	<option value="7">7교시</option>   
	<option value="8">8교시</option>   
	<option value="9">9교시</option>   
	<option value="10">10교시</option>   
	<option value="11">11교시</option>   
	<option value="12">12교시</option>   
	<option value="13">13교시</option>   
	<option value="14">14교시</option>   
	<option value="15">15교시</option>   
	<option value="16">16교시</option>   
	<option value="17">17교시</option>   
	<option value="18">18교시</option> 
	<option value="19">19교시</option>   	
	</select>
	종료시간<select name='EndTime'>
    <option value="0">0교시</option>   
    <option value="1">1교시</option> 
    <option value="2">2교시</option> 
	<option value="3">3교시</option> 
	<option value="4">4교시</option> 
	<option value="5">5교시</option> 
	<option value="6">6교시</option>
	<option value="7">7교시</option>   
	<option value="8">8교시</option>   
	<option value="9">9교시</option>   
	<option value="10">10교시</option>   
	<option value="11">11교시</option>   
	<option value="12">12교시</option>   
	<option value="13">13교시</option>   
	<option value="14">14교시</option>   
	<option value="15">15교시</option>   
	<option value="16">16교시</option>   
	<option value="17">17교시</option>   
	<option value="18">18교시</option> 
	<option value="19">19교시</option>    
	</select><br>
	취득학점<input type = 'text' name ='Credit'  size='2'>&nbsp;&nbsp;&nbsp;
	강의실<input type = 'text' name ='Room'  size='5'>&nbsp;&nbsp;&nbsp;
	강의계획서<input type = 'text' name ='LPID'  size='30'>&nbsp;&nbsp;&nbsp;
	<input type="submit" onclick=opener.parent.location.reload() name="생성" value ="생성">
	</center>
	
</form>
</div>


</body>
</html>
