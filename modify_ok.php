<?php
include ('db_connect.php');

$board_id = $_SESSION['board_id'];
$board_idx = $_SESSION['board_idx'];
$bno = $_GET['idx'];
$title = $_POST['title'];
$content = $_POST['content'];
$sql = mq("update ".$board_id." set title='".$title."',content='".$content."' where idx='".$bno."'"); ?>

<script type="text/javascript">alert("수정되었습니다."); </script>
<?php
echo "<script>
      
      location.href='board.php?board_id=$board_id';</script>";
      ?>