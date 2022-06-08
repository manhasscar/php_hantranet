<?php
		include ('db_connect.php');
        $ino = $_GET['num'];//중고거래게시글 번호
		$username = $_SESSION['userid'];
        $usernic = $_SESSION['user_nic'];
		$date = date("Y-m-d H:i:s");
    if($ino && $username && $_POST['content']){
        $sql = mq("insert into item_board_reply (con_num,id,name,content,date) values ('".$ino."','".$username."','".$usernic."','".$_POST['content']."','".$date."');");
    
        echo "<script>alert('댓글이 작성되었습니다.');
        location.replace('item_read.php?num=$ino');</script>";
    }else{
        echo "<script>alert('댓글 작성에 실패했습니다.');
        history.back();</script>";
    }

?>