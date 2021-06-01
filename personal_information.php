<?php
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
        <!-- article_header -->
        <div id="article_head">
            <font size="5">학적관리</font>
        </div>

        <!-- article_subheader -->
        <div id="article_subhead">
            <font size="5">개인정보관리</font>
            <table align="right">
                <tr>
                    <td>
                        <form action="get_personal_information.php" method=post>
                            <input type="submit" name="조회" value ="조회">&nbsp;&nbsp;&nbsp;&nbsp;
                        </form>
                    </td>
                    <td>
                        <form action="set_personal_information.php" method=post>
                            <input type="submit" name="수정" value ="수정">&nbsp;&nbsp;&nbsp;&nbsp;
                        </form>
                    </td>
                </tr>
            </table>
        </div>
        ');

        if($_SESSION["userid"] == "학생") {
            echo ('
            <div id="article_main">
            <center><strong>개인정보는 전화번호, 이메일, 주소, 상세주소를 변경할 수 있습니다.</strong><br><br>
            
            이름&nbsp;<input type="text" name="name" readonly size="5">&nbsp;&nbsp;&nbsp;
            학과&nbsp;<input type="text" name="subject" readonly size="10">&nbsp;&nbsp;&nbsp;
            학번&nbsp;<input type="text" name="number" readonly size="10">&nbsp;&nbsp;&nbsp;
            학년&nbsp;<input type="text" name="years" readonly size="1"><br><br>
            학적상태&nbsp;<input type="text" name="get" readonly size="2">&nbsp;&nbsp;&nbsp;
            이메일&nbsp;<input type="text" name="email" size="30">&nbsp;&nbsp;&nbsp;
            전화번호&nbsp;<input type="text" name="phone" size="10"><br><br>
            주소&nbsp;<input type="text" name="adress" size="60"><br><br>
            상세주소&nbsp;<input type="text" name="Dadress" size="60"><br><br>
            </center>
            </div>
		    ');	
        }
        else if($_SESSION["userid"] == "교수") {
            echo ('
            <div id="article_main">
            <center>
            <strong>개인정보는 전화번호, 이메일, 주소, 상세주소를 바꿀 수 있습니다.</strong><br><br>
            이름&nbsp;<input type="text" name="name" readonly size="5">
            학과&nbsp;<input type="text" name="subject" readonly size="10">
            사번<input type="text" name="number" readonly size="10"><br><br><br>
            이메일<input type="text" name="email" size="30">
            핸드폰<input type="text" name="phone" size="10"><br><br>
            주소<input type="text" name="adress" size="60"><br><br>
            상세주소<input type="text" name="Dadress" size="60"><br><br>
            </center>
            </div>
            ');
        }
    }
?>