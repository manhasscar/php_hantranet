<?php
include ("db_connect.php");


$board_id = $_SESSION['board_id'];
$board_idx = $_SESSION['board_idx'];
$rno = $_GET['idx']; 

	
$sql = mq("delete from ".$board_id."_reply where idx='".$rno."'"); ?>
<script type="text/javascript">alert('댓글이 삭제되었습니다.'); location.replace("read.php?board_id=<?php echo $board_id; ?>&idx=<?php echo $board_idx; ?>");</script>
	