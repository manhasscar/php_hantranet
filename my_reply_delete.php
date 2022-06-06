<?php
  include ('db_connect.php');
  $mypage_num = $_POST['item'];
  $reply_num = $_POST['idx'];

  if($mypage_num && $reply_num){
    for($i=0; $i<count($_POST["item"]); $i++){
      $content = $_POST["item"][$i];


      $sql = mq("delete from book_board_reply where content like '$content%' ;");
      $sql2 = mq("delete from board_reply where content like '$content%' ;");
      $sql3 = mq("delete from recruit_board_reply where content like '$content%';");
    }       
  
  echo "
       <script>
           location.href = 'my_page_result.php?info=reply';
       </script>
     ";
  }

  if($sql&&$sql2){
    
    echo "<script>alert('게시글이 삭제되었습니다.');
    location.href='book_list.php';</script>";
}else{
    echo "<script>alert('게시글 삭제에 실패했습니다.');
    history.back();</script>";
}


?>