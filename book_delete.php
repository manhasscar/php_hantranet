<?php
  include ('db_connect.php');

  $board_idx = $_SESSION['board_idx'];
  $board_id = $_SESSION['board_id'];
  $book_idx = $_GET['idx'];

  $sql = mq("delete from book_board where idx='$book_idx';");
  $sql2 = mq("delete from book_board_reply where con_num='$book_idx';");
  
  if($sql&&$sql2){
    
    echo "<script>alert('게시글이 삭제되었습니다.');
    location.href='book_list.php';</script>";
}else{
    echo "<script>alert('게시글 삭제에 실패했습니다.');
    history.back();</script>";
}


?>