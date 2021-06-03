<?
    session_start();
	$today = date("Y-m-d");
    $con=mysql_connect("localhost", "qwerty", "1234");
    mysql_select_db("webdb", $con);
	$query="select TID from term where StartDay<'$today' and EndDay>'$today'";
	$result1=mysql_query($query, $con);
	if(!mysql_num_rows($result1)){
		$query="select TID from term where StartDay=(select min(StartDay) from term where '$today' <= StartDay)";
		$result1=mysql_query($query, $con);
	}
	$rows = mysql_fetch_array($result1);
    echo('
    <html>

    <head>
        <link rel="stylesheet" type="text/css" href="./style.css">
    </head>
    
    <body>
        <!-- header -->
        <div id="header">
    ');
    include "header.php";
    echo('
        </div>
    
        <!-- navigator -->
        <div id="nav">
    ');
    include "nav.php";
    echo('
        </div>
    
        <!-- article -->
        <div id="article">
        <div id="article_head">
            <font size="5">강의관리</font>
        </div>

        <div id="article_subhead">
            <font size="5">강의관리</font>
            <table align="right">
                <tr>
                    <td>
                        <form action="lecture_lookup.php" method="post">
                            <input type="submit" name="lookup" value="조회">&nbsp;&nbsp;&nbsp;&nbsp;
                        </form>
                    </td>
                    <td>
                        <form action="lecture_create.php" target="_blank" method="post">
                            <input type="submit" name="create" value="등록">&nbsp;&nbsp;&nbsp;&nbsp;
                        </form>
                    </td>
        <form action="lecture_update_delete.php" target="_blank" method="post">
                    <td>
                        <input type="submit" name="update_delete" value="수정">&nbsp;&nbsp;&nbsp;&nbsp;
                    </td>
                    <td>
                        <input type="submit" name="update_delete" value="삭제">&nbsp;&nbsp;&nbsp;&nbsp;
                    </td>
                </tr>
            </table>
        </div>
    ');
    $table="Lecture";
    $query="select LNAME,RegisterLecture.LID,LPID from $table,RegisterLecture where PID='$_SESSION[userPID]' and TID='$rows[0]' and  RegisterLecture.LID =Lecture.LID";
    $result=mysql_query($query, $con);
    
    if(!mysql_num_rows($result)){
        $errormsg="계정이 없습니다";
        return 0;
    }
    else {
        echo('
            <div id="article_main">
                <table>
                    <tr>
                        <td width="500"><center><strong>교과목명</strong></center></td>
                        <td width="200"><center><strong>과목코드</strong></center></td>
                        <td><center><strong>수업계획서</strong></center></td>
                    </tr>
        ');
        while($row=mysql_fetch_array($result)){
            echo('
                <tr>
                    <td width="500"><center>'.$row[0].'</center></td>
                    <td><center>'.$row[1].'</center></td>
                    <td width="200"><center>'.($row[2]!=""?"O":"X").'<center></td>
                    <td><input type="radio" name="choice" value="'.$row[1].'"</td>
                </tr>
            ');
        }  
        echo('
                </table>
            </div>
        ');
    }
?>