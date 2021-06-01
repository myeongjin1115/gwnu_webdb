<?php
    session_start();
    $id = $_SESSION['id'];
    $con = mysql_connect('localhost', 'qwerty', '1234');
    mysql_select_db('webdb', $con);
    $query = "select lec.LNAME, c.LID, c.Score from Lecture lec, Student stu, Class c where lec.LID = c.LID and stu.SID = c.SID and '$id' = stu.SID";

    $result = mysql_query($query, $con);

    $z = 0;
	while($row = mysql_fetch_array($result)) {
	    $LNAME[$z] = $row[0];
	    $LID[$z] = $row[1];
	    $Score[$z] = $row[2];
	    $z = $z + 1;
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
            <font size="5">己利包府</font>
        </div>

        <!-- article subheader -->
        <div id="article_subhead">
            <font size="5">己利犬牢</font>
        </div>

        <!-- article main -->
        <div id="article_main">
            <center>
            <?php
                echo ("苞格/ 苞格内靛/ 己利栏肺 免仿邓聪促."."<br>"."<br>"."<br>");
                for($i = 0 ; $i < $z; $i++)
                    echo ("$LNAME[$i]"."&nbsp;&nbsp;&nbsp;&nbsp;"."$LID[$i]"."&nbsp;&nbsp;&nbsp;&nbsp;"."$Score[$i]");
            ?>
            </center>
        </div>
    </div>
</body>

</html>