<?php
	include ('db_connect.php');
	if(isset($_SESSION['user_nic'])) $user_nic=$_SESSION['user_nic'];
	else $user_nic="";
?>
<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <title>게시판</title>
  <style>
  #board_read {
    width:100%;
    position: relative;
    word-break:break-all;
  }
  #user_info {
    font-size:14px;
	
  }
  #user_info ul li {
    margin-left:10px;
  }
  #user_info > p {
	display:flex;
	justify-content: flex-end;
	align-items: flex-end; 
	height: 28px;
  }
  #bo_line {
    width:100%;
    height:2px;
    background: gray;
    margin-top:20px;
  }
  #bo_content {
    margin-top:20px;
  }
  #bo_ser {
    font-size:14px;
    color:#333;
    position: absolute;
    right: 0;
  }
  #bo_ser > ul > li {
    list-style: none;
    float:left;
    margin-left:10px;
  }
  .board_img > img{
	  width: 60%;
  }
  /* 댓글 */
.reply_view {
	width:100%;
	margin-top:100px;
	word-break:break-all;
}
.dap_lo {
	font-size: 14px;
	padding:10px 0 15px 0;
	border-bottom: solid 1px gray;
}
.dap_to {
	margin-top:5px;
}
.rep_me {
	font-size:12px;
}
.rep_me ul li {
	float:left;
	width: 30px;
}
.dat_delete {
	
	display:none;
}
.dat_edit {
	display:none;
	
}
.dat_delete_bt{
	color:black;
	font-size:12px;
}
.dat_edit_bt {
	color:black;
	font-size:12px;
}
.dap_sm {
	position: absolute;
	top: 10px;
}
.dap_edit_t{
	width:520px;
	height:70px;
	position: absolute;
	top: 40px;
}
.re_mo_bt {
	position: absolute;
	top:40px;
	right: 5px;
	width: 90px;
	height: 72px;
}
#re_content {
	width:80%;
	height: 56px;
  resize: none;
}
.dap_ins {
	margin-top:50px;
}
.re_bt {
	position: absolute;
	width:100px;
	height:56px;
	font-size:16px;
	margin-left: 10px;
}
#foot_box {
	height: 50px;
}
#board_title {
	
	float: left;
	
}

#board_title > h2 {
	
	display:table-cell;
	text-align: center;
}

button{
      background-color: white;
      
      border: solid 1px gray;
    }

  </style>
</head>
<body>
<header>
        <?php include "header.php";?>
    </header>
	<?php
		$rep_number = $_SESSION['message_idx'];
		$mode = $_GET["mode"];
		$bno = $_GET['num']; /* bno함수에 message idx값을 받아와 넣음*/
		$sql = mq("select * from message where idx='".$bno."'"); /* 받아온 idx값을 선택 */
		
		$message = $sql->fetch_array();
		$send_id=$message['send_id'];
		$_SESSION['message_idx'] = $bno; 
		
	?>
  <div id="board_read">
	  	<div id="msg_header">
					<p>받는사람  <?php echo $message['rv_id'];?> </p>
					<p>보낸시간  <?php echo $message['regist_day'];?> </p>
			<div id="bo_line"></div> 
		</div>
		<div id="bo_content">
			<?php echo nl2br("$message[content]"); ?>
		</div>
		<br><br><br>
		<div id="bo_line"></div> 
 </div>

	<!-- 목록, 수정, 삭제 -->

	    <div id="bo_ser">
		     <ul>
			     <li>
                     <a href="message_box.php?mode=send">[목록으로]</a>
                </li>
				<li>
					<a href="message_delete.php?mode=<?=$mode?>">[삭제]</a>
				</li>
		    </ul>
		</div> 
  <!--- 댓글 불러오기 -->
<div class="reply_view">
	<h3>답장</h3>
		<?php
			$sql2 = mq("select * from message where rep_number='".$bno."' order by idx asc");
			while($reply = $sql2->fetch_array()){
		?>
		<div class="dap_lo">
			<div><b><?php echo $reply['send_id'];?></b></div>
			<div class="dap_to comt_edit"><?php echo nl2br("$reply[content]"); ?></div>
			<div class="rep_me dap_to"><?php echo $reply['regist_day']; ?></div>
		</div>
		<?php } ?>
</div>			 
</body>
</html>
