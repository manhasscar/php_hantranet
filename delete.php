<?php
  include ('db_connect.php');

  $board_idx = $_SESSION['board_idx'];
  $board_id = $_SESSION['board_id'];
  $mypage_num = $_POST['item'];

  $sql = mq("delete from ".$board_id." where idx='$board_idx';");
  $sql2 = mq("delete from ".$board_id."_reply where con_num='$board_idx';");
  
  if($mypage_num){
    for($i=0; $i<count($_POST["item"]); $i++){
      $num = $_POST["item"][$i];
  
      $sql = mq("select * from board where idx = $num");
      $row = mysqli_fetch_array($sql);
  
      $copied_name = $row["file_copied"];
  
      if ($copied_name)
      {
          $file_path = "./uploads/".$copied_name;
          unlink($file_path);
      }
  
      $sql = mq("delete from board where idx = '$num';");
      $sq2 = mq("delete from board_reply where con_num = '$num';");
  }       
  
  echo "
     <script>
         location.href = 'my_page_result.php?info=content';
     </script>
   ";
  }
  
  
  if($sql&&$sql2){
    
    echo "<script>alert('게시글이 삭제되었습니다.');
    location.href='board.php?board_id=$board_id';</script>";
}

else{
    echo "<script>alert('게시글 삭제에 실패했습니다.');
    history.back();</script>";
}


?>