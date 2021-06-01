<?php
    session_start();

    echo('
    <script>
        alert("로그아웃하셨습니다.");
        window.location = "main.html";
    </script>
    ');
    
    session_unset();
    session_destroy();
?>