<?php
    session_start();

    $con = mysql_connect('localhost', 'qwerty', '1234');
    mysql_select_db('webdb', $con);

    if($_SESSION["userid"] === "학생") {
        $SID = $_SESSION["userSID"];
        $query = "select Lecture.LNAME, Class.LID, Class.Score
        from Lecture, Class
        where Class.SID='$SID' and Class.LID=Lecture.LID";
        $result = mysql_query($query, $con);
        $num = mysql_num_rows($result);
        
        for($i = 0; $i < $num; $i++) {
            $row = mysql_fetch_array($result);
            $LNAME[$i] = $row[0];
            $LID[$i] = $row[1];
            $Score[$i] = $row[2];
        }
    }
    else if($_SESSION["userid"] === "교수") {
        $PID = $_SESSION["userPID"];
        $query = "select Lecture.LNAME, Class.LID, Class.Score, Student.SNAME, Student.SID
        from Lecture, Class, Student
        where Lecture.PID='$PID' and Lecture.LID=Class.LID and Class.SID=Student.SID";
        $result = mysql_query($query, $con);
        $num = mysql_num_rows($result);

        for($i = 0; $i < $num; $i++) {
            $row = mysql_fetch_array($result);
            $LNAME[$i] = $row[0];
            $LID[$i] = $row[1];
            $Score[$i] = $row[2];
            $SNAME[$i] = $row[3];
            $SID[$i] = $row[4];
        }
    }
?>

<html>

<head>
    <link rel="stylesheet" type="text/css" href="./style.css">
</head>

<body>
    <!-- header -->
    <div id="header">
        <?php include "header.php";?>
    </div>

    <!-- navigator -->
    <div id="nav">
        <?php include "nav.php";?>
    </div>

    <!-- article -->
    <div id="article">
        <!-- article header -->
        <div id="article_head">
            <font size="5">성적관리</font>
        </div>

        <!-- article subheader -->
        <div id="article_subhead">
            <font size="5">성적확인</font>
        </div>

        <!-- article main -->
        <div id="article_main">
            <center>
            <?php
                if($_SESSION["userid"] === "학생") {
                    echo ("과목/ 과목코드/ 성적으로 출력됩니다."."<br>"."<br>"."<br>");
                    for($i = 0; $i < $num; $i++) {
                        echo ("$LNAME[$i]"."&nbsp;&nbsp;&nbsp;&nbsp;"."$LID[$i]"."&nbsp;&nbsp;&nbsp;&nbsp;");
                        switch($Score[$i]) {
                            case 0:
                                echo('F');
                                break;
                            case 1:
                                echo('C');
                                break;
                            case 2:
                                echo('C+');
                                break;
                            case 3:
                                echo('B');
                                break;
                            case 4:
                                echo('B+');
                                break;
                            case 5:
                                echo('A');
                                break;
                            case 6:
                                echo('A+');
                                break;
                        }
                        echo('<br>');
                    }
                }
                else if($_SESSION["userid"] === "교수") {
                    echo('과목/과목코드/학번/학생이름/점수로 출력됩니다.<br><br><br>');
                    for($i = 0; $i < $num; $i++) {
                        echo ("$LNAME[$i]"."&nbsp;&nbsp;&nbsp;&nbsp;"."$LID[$i]"."&nbsp;&nbsp;&nbsp;&nbsp;"."$SID[$i]"."&nbsp;&nbsp;&nbsp;&nbsp;"."$SNAME[$i]"."&nbsp;&nbsp;&nbsp;&nbsp;");
                        switch($Score[$i]) {
                            case 0:
                                echo('F');
                                break;
                            case 1:
                                echo('C');
                                break;
                            case 2:
                                echo('C+');
                                break;
                            case 3:
                                echo('B');
                                break;
                            case 4:
                                echo('B+');
                                break;
                            case 5:
                                echo('A');
                                break;
                            case 6:
                                echo('A+');
                                break;
                        }
                        echo('<br>');
                    }
                }
            ?>
            </center>
        </div>
    </div>
</body>

</html>