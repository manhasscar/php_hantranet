<?php
		include ('db_connect.php');
        $bno = $_GET['num'];
		$username = $_SESSION['userid'];
		$date = date("Y-m-d H:i:s");
    if($bno && $username && $_POST['content']){
        $sql = mq("insert into book_board_reply (con_num,id,name,content,date) values ('".$bno."','".$username."','".$username."','".$_POST['content']."','".$date."');");
    
        echo "<script>alert('댓글이 작성되었습니다.');
        location.replace('book_read.php?num=$bno');</script>";
    }else{
        echo "<script>alert('댓글 작성에 실패했습니다.');
        history.back();</script>";
    }

?>