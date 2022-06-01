<?php
  include ('db_connect.php');

  $message_idx = $_SESSION['message_idx'];
  $mode = $_GET["mode"];

  $sql = mq("delete from message where idx='$message_idx';");
  
  if($sql){
    
    echo "<script>alert('쪽지가 삭제되었습니다.');
    location.href='message_box.php?mode=$mode';</script>";
}else{
    echo "<script>alert('쪽지 삭제에 실패했습니다.');
    history.back();</script>";
}


?>