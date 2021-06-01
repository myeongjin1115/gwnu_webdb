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
        <!-- article header -->
        <div id="article_head">
            <font size="5">등록관리</font>
        </div>
    
        <!-- article subheader -->
        <div id="article_subhead">
            <font size="5">학기 등록 취소</font>
            <table align="right">
                <tr>
                    <td>
                        <form action="term_cancel_func.php" method="post">
                            <input type="submit" name="term_revoke" value="취소">
                        </form>
                    </td>
                </tr>
            </table>
        </div>
    
        <!-- article main -->
        <div id="article_main">
            <p>유의사항</p>
            <p>학기 등록을 취소하시겠습니까?</p>
        </div>
        ');
    }
?>