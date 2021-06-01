<?php
    if(!isset($_SESSION["userid"])) {
        echo ('
        <script>
            alert("로그인 후 이용하세요.");
            window.location.href="/main.html";
        </script>
        ');
    }
    else if($_SESSION["userid"] === "교수") {
        echo ('
        <script>
            alert("교수는 휴학할 수 없습니다.");
            window.location.href="/main.html";
        </script>
        ');
    }
    else if($_SESSION["userid"] === "학생") {
        echo('
        <div id="article_head">
            <font size="5">수업관리</font>
        </div>
        
        <div id="article_subhead">
            <font size="5">휴학신청</font>
            <form action="break_func.php" method="post">
                <input type="submit" name="변경" value="변경">
            </form>
        </div>

        <div id="article_main">
		    <font size="5">휴학 신청시 유의사항</font>
		
		    <ul style="width: 800px;">
		        <li>학적 상태가 재학상태에서만 신청이 가능합니다</li>
		    </ul>
		</div>"
        ');
    }
?>