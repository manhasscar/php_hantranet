<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>게시판</title>
<link rel="stylesheet" type="text/css" href="css/board.css">
<script>
  function check_input() {
      if (!document.board_form.name.value)
      {
          alert("제목을 입력하세요!");
          document.board_form.subject.focus();
          return;
      }
      if (!document.board_form.content.value)
      {
          alert("내용을 입력하세요!");    
          document.board_form.content.focus();
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
	    <form  name="board_form" method="post" action="book_insert.php" enctype="multipart/form-data">
	    	 <ul id="board_form">		
	    		<li>
	    			<span class="col1">책 이름 : </span>
	    			<span class="col2"><input name="name" type="text"></span>
	    		</li>	   
                <li>
	    			<span class="col1">저자 : </span>
	    			<span class="col2"><input name="author" type="text"></span>
	    		</li>
                <li>
	    			<span class="col1">출판사: </span>
	    			<span class="col2"><input name="publisher" type="text"></span>
	    		</li>
                <li>
	    			<span class="col1">출판일 : </span>
	    			<span class="col2"><input name="publidate" type="date"></span>
	    		</li>
                <li>
	    			<span class="col1">판매가격 : </span>
	    			<span class="col2"><input name="price" type="text"></span>
	    		</li> 
				<li>
					<span class="col1">분류 : </span>
					<select name ="category" >
                        <option value="" selected>선택하세요!</option>
                        <option value="전공" >전공</option>
                        <option value="교양" >교양</option>
                        <option value="기타" >기타</option>
                    </select>
				</li>
				<li>
					<span class="col1">전공: </span>
					<select id="major1" name="college" onchange="changeMajor2();"></select>
        			<select id="major2" name="major"></select>
				</li>
	    		<li id="text_area">	
	    			<span class="col1">상태 : </span>
	    			<span class="col2">
	    				<textarea name="content"></textarea>
	    			</span>
	    		</li>
	    		<li>
			        <span class="col1"> 첨부 파일</span>
			        <span class="col2"><input type="file" name="file"></span>
			    </li>
	    	    </ul>
	    	<ul class="buttons">
				<li><button type="button" onclick="check_input()">완료</button></li>
				<li><button type="button" onclick="location.href='book_list.php'">목록</button></li>
			</ul>
	    </form>
	</div> <!-- board_box -->
</section> 
<script src="book_form.js">
</script>

</body>
</html>