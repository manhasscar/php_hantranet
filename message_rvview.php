<?php
	
	if(isset($_SESSION['user_nic'])) $user_nic=$_SESSION['user_nic'];
	else $user_nic="";
?>
<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <title>게시판</title>
  <link href="indripress/layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
  <style>
.row1 {
    color: #4aa8d8;
    background-color: #FFFFFF;
}
.row3 {
    color: #222222;
    background-color: #FFFFFF;
}
.row4 {
    color: #CBCBCB;
    background-color: #4aa8d8;
}
.splitclrs {
    color: #929292;
    background: linear-gradient(to right, #fff 0%,#Fff 50%,#FFFFFF 50%,#FFFFFF 100%);
}
.heading{
    color: #171414;
    font-weight: bold;
}
p{
    color: #171414;
}
.plus{
    float: right !important;
}
.list-table {
	width: 100%;
	margin-top: 40px;
}
.list-table thead th{
	height:40px;
	border-top:2px solid #09C;
	border-bottom:1px solid #CCC;
	font-weight: bold;
	font-size: 17px;
}
.list-table tbody td{
	text-align:center;
	padding:10px 0;
	border-bottom:1px solid #CCC; height:20px;
	font-size: 14px
}
th {
    color: #000000;
    background-color: #FFFFFF;
    text-align: center;
}
thead {
    display: table-header-group;
    vertical-align: middle;
    border-color: inherit;
}
table, th, td, #comments .avatar, #comments input, #comments textarea{border-color:#FFFFFF;}
tr, #comments li, #comments input[type="submit"], #comments input[type="reset"] {
    color: inherit;
    background-color: #ffffff;
}
h1 {
    display: block;
    font-size: 2em;
    margin-block-start: 0.67em;
    margin-block-end: 0.67em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
    font-weight: bold;
}
td{
    color: #000000;
}
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
	<div class="wrapper row3">
  <main class="hoc container clear"> 
    <div class="content"> 
	<?php
		$mode = $_GET["mode"];
		$bno = $_GET['num']; /* bno함수에 idx값을 받아와 넣음*/
		$sql = mq("select * from message where idx='".$bno."'"); /* 받아온 idx값을 선택 */
		
		$message = $sql->fetch_array();
		$send_id=$message['send_id'];
		$_SESSION['message_idx'] = $bno; 
		
	?>
  <div id="board_read">
	  	<div id="msg_header">
                <p>보낸사람  <?php echo $message['send_id']; ?></p>
				<p>받은시간  <?php echo $message['regist_day'];?> </p>
			<div id="bo_line"></div> 
		</div>
		<div id="bo_content">
			<?php echo nl2br("$message[content]"); ?>
		</div>
		<br><br><br>
		<div id="bo_line"></div> 
	<!--- 답장 입력 폼 -->
	<div class="dap_ins">
		<form method="post" action="message_reply.php" enctype="multipart/form-data">
			<input type="hidden" name="send_id" id="send_id" class="send_id" size="15" placeholder="받은사람" value="<?php echo $user_nic;?>">
			<input type="hidden" name="rv_id" id="rv_id" class="rv_id" size="15" placeholder="보낸사람" value="<?php echo $send_id;?>">
			<div style="margin-top:10px; ">
				<textarea name="content" class="reply_content" id="re_content" ></textarea>
				<button id="rep_bt" class="re_bt">보내기</button>
			</div>
		</form>
	</div>
</div>
</div>
<?php 
$sql = mq("update message set read_ok = 1 where idx='".$bno."'");
?>

	<!-- 목록, 수정, 삭제 -->
	     <div id="bo_ser">
		     <ul>
			     <li>
                     <a href="message_box.php?mode=<?=$mode?>">[목록으로]</a>
                </li>
			    <li>
					<a href="message_delete.php?mode=<?=$mode?>">[삭제]</a>
				</li>
			
		    </ul>
	  </div> 

  </div>
</div>

</body>
</html>
