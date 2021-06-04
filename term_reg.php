<?php
    $con = mysql_connect('localhost', 'qwerty', '1234');
	$today = date("Y-m-d");
    mysql_select_db('webdb', $con);
    $query = "select TID, Tuition from term where RegDay <= '$today' and '$today' < StartDay";
    $result = mysql_query($query, $con);

    if(!isset($_SESSION['userid'])) {
        echo('
        <script>
            alert("로그인 후 이용하세요.");
            window.location.href="/main.html";
        </script>
        ');
    }
    else {
        echo('
        <!-- article header -->
        <div id="article_head">
            <font size="5">등록관리</font>
        </div>
    
        <!-- article subheader -->
        <div id="article_subhead">
            <font size="5">학기 등록 신청</font>
            <table align="right">
                <tr>
                    <td>
                        <form action="term_reg_func.php" method="post">
                            <input type="submit" name="term_apply" value="신청">
                        </form>
                    </td>
                </tr>
            </table>
        </div>
    
        <!-- article main -->
        <div id="article_main">
            <p>유의사항</p>
            <p>학기 등록을 신청하시겠습니까?</p>
            <br>
        ');

        if(!mysql_num_rows($result)) {
            echo('
                <p>현재 학기가 진행중이므로 등록금이 출력되지 않습니다.</p>
                <p>등록금은 학기 신청 기간동안 표기됩니다.</p>
            ');
        }
        else {
            $row = mysql_fetch_array($result);
            $Tuition = $row[1];
            echo('
                <p>학기 등록금은 '.$Tuition.'입니다.</p>
            ');
        }
        echo('
        </div>
        ');
    }
?>