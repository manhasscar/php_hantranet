<?php
	include ('db_connect.php');
	if(isset($_SESSION['userid'])) $username = $_SESSION['userid'];
    else $userid = "";
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
	display: none;
}
.dat_edit {
	display:none;
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
  </style>
</head>
<body>
	<?php
		$bno = $_GET['num']; /* bno함수에 idx값을 받아와 넣음*/
		$hit = mysqli_fetch_array(mq("select * from book_board where idx ='".$bno."'"));
		// $hit = $hit['hit'] + 1;
		// $fet = mq("update ".$board_id." set hit = '".$hit."' where idx = '".$bno."'");
		$sql = mq("select * from book_board where idx='".$bno."'"); /* 받아온 idx값을 선택 */
		$board = $sql->fetch_array();
		$_SESSION['board_idx'] = $bno; 
		
	?>
<!-- 글 불러오기 -->

  <div id="board_read">

	  <div id="board_title">
		  <h2><?php echo $board['book_name'];?></h2>
		</div>
		   <div id="user_info">
			      <p><?php echo $board['user_name']; ?> <?php echo $board['date']; ?> </p>
                  <!-- 조회:<?php echo $board['hit']; ?> -->
				  <div id="bo_line"></div> 
			</div>
			<div></div>
			
			<?php
			if ($board['file']){
			?>
			<!-- <div>
				파일 : <a href="uploads/<?php echo $board['file'];?>" download><?php echo $board['file']; ?></a>
			</div> -->
            <div class="proudctimage">
			    <div class="borad_img">
                <?php 
                echo "<img src = 'uploads/$board[file_copied]' style=width:170px; height:114px>"
                ?>;
			    </div>
            </div>
            <div class="prdouct_area">
                <div class="product_detail">
                    <div class="product_detail_box">
                        <div class="productcategory">
                            <?php if($board['category'] == "교양")
                                echo "교양";
                                elseif($board['category']=="전공")
                                echo "전공"." > ".$board['college']." > ".$board['major'];
                            ?>
                        <p class="book_name">
                            <?php echo $board['book_name'];?>
                        </p>
                        <div class="prouctprice">
                            <strong class="cost"><?=$board['bo_price']?>
                        </div>
                    </div>
                 </div>
            </div>



			<?php
			}
			?>
			<div id="bo_content">
				<?php echo nl2br("$board[bo_state]"); ?>
			</div>

	<!-- 목록, 수정, 삭제 -->

	   <div id="bo_ser">
		     <ul>
			        <li><a href="book_list.php">[목록으로]</a></li>
              <?php
			  if (isset($_SESSION['userid']) && $board['user_name'] == $_SESSION['userid']){
				 
				  ?>
			  	
			        <li><a href="board_modify_form.php?idx=<?php echo $board['idx']; ?>">[수정]</a></li>
			        <li><a href="delete.php?idx=<?php echo $board['idx']; ?>">[삭제]</a></li>
			  
              <?php
			}
			elseif(isset($_SESSION['userid']) && $_SESSION['userid'] == 'admin'){?>
				<li><a href="board_modify_form.php?idx=<?php echo $board['idx']; ?>">[수정]</a></li>
			    <li><a href="delete.php?idx=<?php echo $board['idx']; ?>">[삭제]</a></li>
			<?php
			}
			?>
		    </ul>
	  </div>

  </div>
  <!--- 댓글 불러오기 -->
<div class="reply_view">
	<h3>댓글목록</h3>
		<?php
			$sql3 = mq("select * from book_board_reply where con_num='".$bno."' order by idx desc");
			while($reply = $sql3->fetch_array()){
		?>
		<div class="dap_lo">
			<div><b><?php echo $reply['name'];?></b></div>
			<div class="dap_to comt_edit"><?php echo nl2br("$reply[content]"); ?></div>
			<div class="rep_me dap_to"><?php echo $reply['date']; ?></div>

		</div>
	<?php 
	} 
	?>

	<!--- 댓글 입력 폼 -->
	<div class="dap_ins">
		<form action="book_reply_ok.php?board_id=book_board&num=<?php echo $bno; ?>" method="post">
			<input type="hidden" name="dat_user" id="dat_user" class="dat_user" size="15" placeholder="아이디" value=<?php isset($_SESSION['userid'])?>>
			<div style="margin-top:10px; ">
				<textarea name="content" class="reply_content" id="re_content" ></textarea>
				<button id="rep_bt" class="re_bt">댓글</button>
			</div>
		</form>
	</div>
</div><!--- 댓글 불러오기 끝 -->
<div id="foot_box"></div>
</div>
</body>
</html>
