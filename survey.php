<?php
    if(!isset($_SESSION["userid"])) {
        echo('
        <script>
            alert("로그인 후 이용하세요.");
            window.location.href="/main.html";
        </script>
        ');
    }
    else if($_SESSION["userid"] === "교수") {
        echo('
        <script>
            alert("학생만 이용 가능합니다.");
            window.location.href="/main.html";
        </script>
        ');
    }
    else if($_SESSION["userid"] === "학생") {
        $con=mysql_connect("localhost", "qwerty", "1234");
		mysql_select_db("webdb", $con);
        $query="select distinct PNAME,class.LID,LNAME from class,Lecture,professor  
        where class.LID=lecture.LID and class.SID='$_SESSION[userSID]' and Lecture.PID=professor.PID";
        
        $result=mysql_query($query, $con);

        echo('
        <!-- article header -->
        <div id="article_head">
            <center><font size="5">수업관리</font></center>
        </div>

        <!-- article subheader -->
        <form action="survey_form.php" target="_blank" method="post">
        <div id="article_subhead">
            <font size="5" align="center">설문조사</font>
            <table align="right">
                <tr>
                    <td><input type="submit" name="진행" value ="진행">&nbsp;&nbsp;&nbsp;&nbsp;</td>
                </tr>
            </table>
        </div>

        <!-- article main -->
        <div id="article_main">
            <table>
                <tr>
                    <td width=500><center><strong>교수명</strong></center></td>
                    <td width=200><center><strong>과목코드</strong></center></td>
                    <td><center><strong>과목이름</strong></center></td>
                    <td></td>
                </tr>
        ');
        while($row=mysql_fetch_array($result)){
			echo('
			<tr>
                <td width=500><center>'.$row[0].'</center></td>
                <td><center>'.$row[1].'</center></td>
                <td width=200><center>'.$row[2].'<center></td>
                <td><input type="radio" name="choice" value="'.$row[1].'"></td>
			</tr>
            ');
		}
        echo('
            </table>
        </div>
        ');
    }
?>

