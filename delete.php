<?php
  include ('db_connect.php');

  $board_idx = $_SESSION['board_idx'];
  $board_id = $_SESSION['board_id'];

  $sql = mq("delete from ".$board_id." where idx='$board_idx';");
  $sql2 = mq("delete from ".$board_id."_reply where con_num='$board_idx';");
  
  if($sql&&$sql2){
    
    echo "<script>alert('게시글이 삭제되었습니다.');
    location.href='board.php?board_id=$board_id';</script>";
}else{
    echo "<script>alert('게시글 삭제에 실패했습니다.');
    history.back();</script>";
}


?>