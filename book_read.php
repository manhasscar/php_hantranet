<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>게시판</title>
  <link rel="stylesheet" type="text/css" href="mystyle.css"/>
  <link rel="icon" href="favicon.ico" type="image/x-icon" sizes="16x16">
  <link href="indripress/layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
  <link rel="stylesheet" type="text/css" href="css/common.css"/>
  <link rel="stylesheet" type="text/css" href="css/read.css"/>
  <style>
	.split > div{display:block; float:left; width:80%; padding:80px 0px 80px 0; }
 .comment{
	margin-top: 80px ;
}
 #comments li {
    color: inherit;
    background-color: #FBFBFB;
}
#comments .comcont {
    display: block;
    margin: 0;
	padding: 10px 0 15px 0;
    border-bottom: solid 1px gray;
}
#popup_menu_area{
	
	position: absolute;
	
	width: 150px;
	height: 23px;
	text-align: center;
	background-color: white;
    border: solid 1px gray;
}

.splitclrs{ background:#ffffff;}
@media screen and (max-width:750px){
	.splitclrs{background:none;}
	.split > div:first-child{color:inherit; background-color:#F6F6F6;}
	.split > div:last-child{color:inherit; background-color:#FFFFFF;}
}
img{
    margin: 0 15px 10px 0;
    clear: left;
}
</style>
</head>
<body id="top">
<header>
    <?php include "header.php";?>
</header>
<div class="wrapper row3">
	<main class="hoc container clear">
		<div class="content"> 
	<h1>
	<?php
		$bno = $_GET['num']; /* bno함수에 idx값을 받아와 넣음*/
		$hit = mysqli_fetch_array(mq("select * from book_board where idx ='".$bno."'"));
		$sql = mq("select * from book_board where idx='".$bno."'"); /* 받아온 idx값을 선택 */
		$board = $sql->fetch_array();
		$_SESSION['board_idx'] = $bno; 
		
	?>
	</h1>
<!-- 글 불러오기 -->
<div id="board_read">
	<div id="board_title">
		<h2><?php echo $board['title'];?></h2>
  	</div>
	 <div id="user_info">
		<p><a href="javascript:doDisplay();" style = margin:0px;><?php echo $board['nic_name']; ?></a>&nbsp<?php echo $board['date']; ?> </p>
		<div id="bo_line"></div> 
	 </div>
	<div class="wrapper splitclrs">
  		<div class="split clear">
		<?php 
			echo "<img src = 'uploads/$board[file_copied]' style=width:170px; height:114p>";
	    ?>
			<div> 
			<p class="nospace font-xs">
			<?php if($board['category'] == "교양")
				echo "교양";
			elseif($board['category']=="전공")
				echo "전공"." > ".$board['college']." > ".$board['major'];
			else
				echo "기타";
			?></p>
			<h3 class="heading"><?php echo $board['title'];?></h3>
			<p><strong class="cost"><?=$board['bo_price']?>원</strong></p>
			<p>저자/출판사: <?=$board['bo_author']?>/<?=$board['bo_publisher']?></p>
			<p>출판일: <?=$board['bo_date']?></p>
    		</div>
			<p> 정보 : <?php echo nl2br("$board[bo_state]"); ?></p>
 	    </div>
	</div>
 	<div id="popup_menu_area" style="z-index: 9999; display: none;">			
   		<a href = "message_send_in_board.php?rv_id=<?php echo $board['nic_name']; ?>">쪽지 보내기</a>	
	</div>         
	<!-- 목록, 수정, 삭제 -->
	   <div id="bo_ser">
			<ul>
				<li><a href="book_list.php">[목록으로]</a></li>
				<?php
				if (isset($_SESSION['userid']) && $board['user_id'] == $_SESSION['userid']){
				?>
			    <li><a href="book_modify.php?idx=<?php echo $board['idx']; ?>">[수정]</a></li>
			    <li><a href="book_delete.php?idx=<?php echo $board['idx']; ?>">[삭제]</a></li>
              	<?php
				}
				elseif(isset($_SESSION['userid']) && $_SESSION['userid'] == 'admin'){?>
				<li><a href="book_modify.php?idx=<?php echo $board['idx']; ?>">[수정]</a></li>
				<li><a href="book_delete.php?idx=<?php echo $board['idx']; ?>">[삭제]</a></li>
				<?php
				}
				?>
		    </ul>
	 	 </div>

  <!--- 댓글 불러오기 -->
	<div  id="comments" style="margin-top:100px;">
		<h3>댓글목록</h3>
		<ul>
        	<li>
       		 <article>
			<?php
				$sql3 = mq("select * from book_board_reply where con_num='".$bno."' order by idx desc");
				while($reply = $sql3->fetch_array()){
			?>
			<div class="dap_lo">
				<div><b><?php echo $reply['name'];?></b></div>
				<div class="dap_to comt_edit"><?php echo nl2br("$reply[content]"); ?></div>
				<div class="rep_me dap_to"><?php echo $reply['date']; ?></div>
				<?php
			 		 if (isset($_SESSION['userid']) && $reply['id'] == $_SESSION['userid']){
				?>
				<a class="dat_delete_bt" href="book_reply_delete.php?idx=<?php echo $reply['idx']; ?>&num=<?php echo $bno; ?>">삭제</a> 
              	<?php
				}
				elseif(isset($_SESSION['userid']) && $_SESSION['userid'] == 'admin'){?>
					<a class="dat_delete_bt" href="book_reply_delete.php?idx=<?php echo $reply['idx']; ?>&num=<?php echo $bno; ?>">삭제</a>
				<?php
				}
				?>
			</div>	
			<?php 
			} 
			?>
			</article>
          	</li>
        </ul>
	</div>
	<!--- 댓글 입력 폼 -->
	<div class="dap_ins">
		<form action="book_reply_ok.php?board_id=book_board&num=<?php echo $bno; ?>" method="post">
			<input type="hidden" name="dat_user" id="dat_user" class="dat_user" size="15" placeholder="아이디" value=<?php isset($_SESSION['userid'])?>>
			<div style="margin-top:10px;display:flex; ">
				<textarea name="content" class="reply_content" id="re_content" ></textarea>
				<button id="rep_bt" class="re_bt">댓글</button>
			</div>
		</form>
	</div>
</div><!--- 댓글 불러오기 끝 -->
</body>
</html>
<script type="text/javascript">
var bDisplay = true;
let elem = document.querySelector('#user_info');
let rect = elem.getBoundingClientRect();

function doDisplay(){
	var con = document.getElementById("popup_menu_area");
	
	
	if(con.style.display =='none'){
		con.style.display = 'block';
		con.style.top = "50px";
		con.style.right = "20px";
	}else{
		con.style.display = 'none';
	}
}



</script>
