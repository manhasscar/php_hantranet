<?php
include ('db_connect.php');
    
    $rno = $_GET['idx'];
	$sql = mq("select * from recruit_board where idx='$rno';");
	$board = $sql->fetch_array();
?>
<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>게시판</title>
<link rel="stylesheet" type="text/css" href="css/board.css">
<script>
  function check_input() {
      if (!document.board_form.title.value)
      {
          alert("제목을 입력하세요!");
          document.board_form.title.focus();
          return;
      }
      if (!document.board_form.content.value)
      {
          alert("내용을 입력하세요!");    
          document.board_form.content.focus();
          return;
      }
	  if (!document.board_form.category.value)
      {
          alert("분야를 선택하세요!");    
          document.board_form.category.focus();
          return;
      }
	  if (!document.board_form.startdate.value)
      {
          alert("시작 기간을 선택하세요!");    
          document.board_form.startdate.focus();
          return;
      }
	  if (!document.board_form.enddate.value)
      {
          alert("마감 기간을 선택하세요!");    
          document.board_form.enddate.focus();
          return;
      }
      document.board_form.submit();
   }
</script>
</head>
<body> 
<section>
   	<div id="board_box">
	    <h3 id="board_title">
	    		글 쓰기
		</h3>
	    <form  name="board_form" method="post" action="recruit_modify_ok.php?idx=<?php echo $rno; ?>" enctype="multipart/form-data">
	    	 <ul id="board_form">		
	    		<li>
	    			<span class="col1">제목 : </span>
	    			<span class="col2"><input name="title" type="text" value=<?php echo $board['title']; ?>></span>
	    		</li>	   
                <li>
	    			<span class="col1">분야 : </span>
					<span class="col2"><select name ="category">
                        <option value="<?php echo $board['category'];?>" selected><?php echo $board['category']; ?></option>
                        <option value="봉사" >봉사</option>
                        <option value="과제" >과제</option>
                        <option value="팀플" >프로젝트</option>
                        <option value="공부" >스터디</option>
                        <option value="동활" >동아리</option>
                        <option value="기타" >기타</option>
                    </select></span>
	    		</li>
                <li>
	    			<span class="col1">모집 기간 : </span>
	    			<span class="col2"><input name="startdate" type="date" width="50" value=<?php echo $board['period_s']; ?>> ~ <input name="enddate" type="date" width="50" value=<?php echo $board['period_e']; ?>></span>
	    		</li>
	    		<li id="text_area">	
	    			<span class="col1">내용 : </span>
	    			<span class="col2">
	    				<textarea name="content"><?php echo $board['content']; ?></textarea>
	    			</span>
	    		</li>
	    		<li>
			        <span class="col1"> 첨부 파일</span>
			        <span class="col2"><input type="file" name="file"></span>
			    </li>
	    	    </ul>
	    	<ul class="buttons">
				<li><button type="button" onclick="check_input()">완료</button></li>
				<li><button type="button" onclick="location.href='recruit.php'">목록</button></li>
			</ul>
	    </form>
	</div> <!-- board_box -->
</section> 
<script src="book_form.js">
</script>

</body>
</html>
