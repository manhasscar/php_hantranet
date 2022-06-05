<?php
		include ('db_connect.php');
        $rno = $_GET['num'];
		$username = $_SESSION['userid'];
        $usernic = $_SESSION['user_nic'];
		$date = date("Y-m-d H:i:s");
    if($rno && $username && $_POST['content']){
        $sql = mq("insert into recruit_board_reply (con_num,id,name,content,date) values ('".$rno."','".$username."','".$usernic."','".$_POST['content']."','".$date."');");
    
        echo "<script>alert('댓글이 작성되었습니다.');
        location.replace('recruit_read.php?num=$rno');</script>";
    }else{
        echo "<script>alert('댓글 작성에 실패했습니다.');
        history.back();</script>";
    }

?>