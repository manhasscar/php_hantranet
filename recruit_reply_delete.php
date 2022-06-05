<?php
include ("db_connect.php");


$recruit_num = $_GET['num'];
$rno = $_GET['idx']; 

	
$sql = mq("delete from recruit_board_reply where idx='".$rno."'"); 
?>
<script type="text/javascript">alert('댓글이 삭제되었습니다.'); location.href = "recruit_read.php?num=<?php echo $recruit_num; ?>";</script>
